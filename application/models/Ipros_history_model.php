<?php
class Ipros_history_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function read($data){
        $this->db->select('*');
        $this->db->from('ipros_history');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ipro($technician_id, $ipro_name, $sensor,$date, $limit=15){
        $this->db->select('*');
        $this->db->from('ipros_history');
        //$this->db->where('technician_id', $technician_id);
        $this->db->where('ipro_name', $ipro_name);
        $this->db->where('sensor', $sensor);
        $this->db->where('created_at <', $date);
        $this->db->order_by('created_at', 'desc');
        if($limit != "all"){
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function remove_history($sensor_ip, $sensor_name, $technician_id){
      if($sensor_ip){
        $this->db->where( array(
            'ipro_name' => $sensor_name,
            //'technician_id' => $technician_id
        ));
        $this->db->where_In('sensor', explode(',', $sensor_ip));
        $this->db->delete('ipros_history');
        return;
      }
    }

    public function record($data){
        date_default_timezone_set("America/Mexico_City");

        $record = array(
          'technician_id' => $data[0],
          'ipro_name' => $data[1],
          'sensor' => $data[2],
          'data' => $data[3],
          'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert('ipros_history', $record);
    }

    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('ipros_history');
    }
}
