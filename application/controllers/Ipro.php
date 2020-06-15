<?php

class Ipro extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('ipros_model');
        $this->load->model('ipros_history_model');

        $user_id = $this->session->userdata('id');
        if(!$user_id){
            redirect('user/index');
        }
    }

    public function index(){

    }

    public function remove_history(){
        $sensor_ip = $this->input->post("sensor_ip");
        $sensor_name = $this->input->post("sensor_name");
        $technician_id = $this->session->userdata("id");
        $this->ipros_history_model->remove_history($sensor_ip, $sensor_name, $technician_id);

        echo json_encode(array('status' => true));
    }

    public function excute_python(){
        // Test data
        // $ipro_value = $this->input->post("ipro");
        // $name = 'RFID';
        // $ip = '166.254.243.215';
        // $port = 12345;
        // $unit = 232;
        // $sensors_arr = [2, 101, 102, 105];
        // $sensors = implode(",", $sensors_arr);

        $name = $this->input->post("ipro_name");
        $ip = $this->input->post("ipro_ip");
        $port =  $this->input->post("ipro_port");
        $unit =  $this->input->post("ipro_unit");
        $sensors = $this->input->post("ipro_sensors");
        $real_time = $this->input->post("real_time");
        $limit = $this->input->post("limit");
        $technician_id  = $this->input->post("technician_id");

        $sensors = str_replace(' ', '', $sensors);
        $filepath = FCPATH."ipro/iPro.py $name $ip $port $unit $sensors";

        $sensors_arr = explode(",", $sensors);
        $status ="";

        if($real_time=="true"){
            $command = escapeshellcmd('python '.$filepath);
            exec($command,  $status, $return );
        }

        $result = array();

        if(!$technician_id){
            $technician_id = $this->session->userdata("id");
        }

        if(is_array($status)){
          foreach ($status as $key => $value) {
            $sensor = explode(" ", trim($value));
            if( array_search( trim($sensor[0]), $sensors_arr) !== FALSE ){
              //array_push($result, array($sensor[0],$sensor[1]));
              $this->ipros_history_model->record( array($technician_id, $name, $sensor[0], $sensor[1]) );
            }
          }
        }

        date_default_timezone_set("America/Mexico_City");

        foreach ($sensors_arr as $key => $sensor) {
          $ipro_data = $this->ipros_history_model->get_ipro($technician_id, $name, $sensor, date('Y-m-d H:i:s'), $limit);
          array_push($result, $ipro_data);
        }

        echo json_encode(array('status' => true, 'result' => $result));
        //echo json_encode(array('status' => false, 'result' => 'Sensor does not work.'));

    }

}
