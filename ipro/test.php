<?php

  echo "Start Ipro";
  $name = 'RFID';
  $ip = '166.254.243.215';
  $port = 12345;
  $unit = 232;
  $sensors = implode( ",", [2, 101, 102, 105] );

  $command = "python iPro.py $name $ip $port $unit $sensors";
  exec($command, $status, $return );

  echo "<pre>";
  var_dump($status);
  echo "<br>";
  var_dump($return);
  echo "</pre>";
?>
