import time, datetime
import payload
import socket

class moduleModbusTCP():
    def __init__(self, ip, port = 502):
        self.modbusCommands = { "read holdings" :   3,
                                "read inputs" :     4,
                                "write holding" :   6,
                                "write holdings" : 16 }
        self.crc16_table    = self.Generate_CRC16_Table()


        self.socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        self.socket.settimeout(1.0)
        try:
            self.socket.connect((ip, port))
        except Exception as e:
            print e
        else:
            print "error"
        finally:
            print "final"

    def __del__(self):
        if self.socket != None:
            self.socket.shutdown(1)
            self.socket.close()

    def Hex(self, string):
        out = ""
        for x in xrange(len(string)):
            out += "%02X " % ord(string[x])
        return out

    def Elapsed(self, started):
        return (time.clock() - started)

    def RunCommand(self, command, expectedBytes):
        totalSent = 0
        while totalSent < len(command):
            sent = self.socket.send(command[totalSent:])
            if sent == 0: # Error
                print "RunCommand send returned 0!"
                return False, ""
            totalSent += sent

        # print "Command:", self.Hex(command), "sent", totalSent

        start    = time.clock()
        timedOut = False
        timeout  = 3.0
        out      = ""
        received = 0
        while received < expectedBytes:
            chunk = ''
            try:
                chunk = self.socket.recv(min(expectedBytes - received, 2 * expectedBytes))
            except socket.error, e:
                print "Socket revc exception:", e
                return False, ''
            except Exception, e:
                print "Receive exception:", e

            out      += chunk
            received += len(chunk)

            # print self.Elapsed(start), received, expectedBytes

            if self.Elapsed(start) > timeout:
                timedOut = True
                break

        if (timedOut == True) or (len(out) != expectedBytes):
            print "*** RunCommand command > ", self.Hex(command)
            print "    %f elapsed seconds %d bytes returned" % (self.Elapsed(start), len(out))
            return False, out

        return True, out

    def ReadRegistersTCP(self, range, unit, address, count, endian):
        if count <= 0 or count > 1000:
            return False, ""

        p = payload.BinaryPayloadBuilder(endian = endian)
        p.add_16bit_uint(0x0000)                    # Transaction #
        p.add_16bit_uint(0x0000)                    # 0's
        p.add_16bit_uint(1 + 1 + 2 + 2)             # Following bytes: unit, function code, 2b address, 2b count
        p.add_8bit_uint(unit)                       # Unit
        p.add_8bit_uint(self.modbusCommands[range]) # Function
        p.add_16bit_uint(address)                   # Address
        p.add_16bit_uint(count)                     # Count

        str = p.build()

        success, result = self.RunCommand(str, 5 + count * 2)
        if success != True or len(result) == 0:
            print "ReadHoldingRegisters RunCommand returned false or no data", success
            print self.Hex(result)
            return False, ""

        print self.Hex(result)

        d           = payload.BinaryPayloadDecoder(result, endian)
        unit        = d.decode_8bit_uint()
        function    = d.decode_8bit_uint()
        totalBytes  = d.decode_8bit_uint()
        binary      = result[3 : 3 + 2 * count]

        return True, binary

    def ReadHoldingRegistersRTU(self, unit, address, count, endian):
        if count <= 0 or count > 1000:
            return False, ""

        p = payload.BinaryPayloadBuilder(endian = endian)
        p.add_8bit_uint(unit)
        p.add_8bit_uint(self.modbusCommands["read holdings"])
        p.add_16bit_uint(address)
        p.add_16bit_uint(count)

        str = p.build()
        crc = self.ComputeCRC(str)
        p.add_16bit_uint(crc)
        success, result = self.RunCommand(p.build(), 5 + count * 2)
        if (success != True) or (len(result) == 0):
            print "ReadHoldingRegisters RunCommand returned false or no data", success, self.Hex(result)
            return False, ""

        if self.CheckCRC(result[:-2], result[-2:]) != True:
            print "CRC fail"
            return False, ""

        d          = payload.BinaryPayloadDecoder(result, endian)
        unit       = d.decode_8bit_uint()
        function   = d.decode_8bit_uint()
        totalBytes = d.decode_8bit_uint()
        binary     = result[3 : 3 + 2 * count]

        # print runit, rcode, rbytes, repr(binary)
        return True, binary

    def Generate_CRC16_Table(self):
        result = []
        for byte in range(256):
            crc = 0x0000
            for _ in range(8):
                if (byte ^ crc) & 0x0001:
                    crc = (crc >> 1) ^ 0xa001
                else:
                    crc >>= 1
                byte >>= 1
            result.append(crc)
        return result

    def ComputeCRC(self, data):
        crc = 0xffff
        for a in data:
            idx = self.crc16_table[(crc ^ ord(a)) & 0xff];
            crc = ((crc >> 8) & 0xff) ^ idx
        swapped = ((crc << 8) & 0xff00) | ((crc >> 8) & 0x00ff)
        return swapped

    def CheckCRC(self, data, check):
        checkInt = 256 * ord(check[0]) + ord(check[1])
        # print "Check CRC", self.Hex(data), "Check", self.Hex(check), "Result", "0x%04X" % self.ComputeCRC(data)
        return self.ComputeCRC(data) == checkInt
