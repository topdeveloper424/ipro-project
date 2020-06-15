<?php

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('ipros_model');
        $this->load->model('user_model');
        $this->load->model('usertype_model');
        $user_id = $this->session->userdata('id');
        if(!$user_id){
            redirect('user/index');
        }
    }

    public function index(){
        $data['socket_url'] = $this->config->item('socket_url');
        $data['current'] = 'home';
        $data['userdata'] = $this->session->userdata();
        $data['users'] = $this->user_model->get_all();

        if($this->session->userdata("role") == "admin" ){
            $data['ipros'] = $this->ipros_model->read();
        }elseif($this->session->userdata("role") == "technician" ){
            $data['ipros'] = $this->ipros_model->get_by_id($this->session->userdata("ipro_id"));
        }else{
            $data['ipros'] = $this->ipros_model->get_by_client_id($this->session->userdata("id"));
        }

        //$this->load->view('templates/header.php', $data);
        $this->load->view('home/index.php', $data);
        $this->load->view('templates/footer.php');
        $this->load->view('templates/script.php');
    }

    public function client(){
        $data['current'] = 'client';
        $data['userdata'] = $this->session->userdata();
        $data['users'] = $this->user_model->get_client_by_tester($data['userdata']["id"]);
        $data['types'] = $this->usertype_model->get_all();

        $this->load->view('templates/header.php', $data);
        $this->load->view('user/client.php', $data);
        $this->load->view('templates/footer.php');
    }


    public function set_follow(){
        if($this->input->post('client_id')){
            $this->user_model->set_follow($this->input->post('client_id'), $this->session->userdata('id'));
            echo json_encode(array('status' => true));
        }else{
            echo json_encode(array('status' => false));
        }
    }

    public function set_unfollow(){
        if($this->input->post('client_id')){
            $this->user_model->set_unfollow($this->input->post('client_id'), $this->session->userdata('id'));
            echo json_encode(array('status' => true));
        }else{
            echo json_encode(array('status' => false));
        }
    }

    public function Create(){
        $data = $this->input->post();

        date_default_timezone_set("America/Mexico_City");
        $customer = array(
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'kickserv_id' => $data['kickserv_id'],
            'created_at' => date('Y-m-d H:i:s')
        );

        $customer_id = $this->customer_model->save($customer);
        $location = array(
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'phone' => $data['phone'],
            'created_at' => date('Y-m-d H:i:s'),
            'customer_id' => $customer_id
        );
        $this->location_model->save($location);
        echo json_encode(array('status' => true, 'result' => $customer_id));
    }

    public function Read(){

    }

    public function reports($id){
        $data['current'] = 'Reports By Customer';
        $data['userdata'] = $this->session->userdata();
        $data['reports'] = $this->customer_model->reports_by_customer($id);
        $this->load->view('templates/header.php', $data);
        $this->load->view('customer/reports.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function Update(){
        $data = $this->input->post();

        $customer = array(
            'id' => $data['id'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'kickserv_id' => $data['kickserv_id'],
            'updated_at' => date('Y-m-d H:i:s')
        );
        $result = $this->customer_model->update($customer);
        $location = array(
            'id' => $data['location_id'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'phone' => $data['phone'],
            'updated_at' => date('Y-m-d H:i:s'),
            'customer_id' => $data['id']
        );

        $result = $this->location_model->update($location);
        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function Delete(){
        $data = $this->input->post();
        $result = $this->customer_model->delete($data['id']);
        echo json_encode(array('status' => true, 'result' => $result));
    }


    public function view($id){
        $data['userdata'] = $this->session->userdata();
        $data['current'] = 'customers';
        $data['customer_id'] = $id;
        $data['customer'] = $this->customer_model->read($id)[0];
        $data['locations'] = $this->location_model->get_by_customer($id);

        $this->load->view('templates/header.php', $data);
        $this->load->view('customer/location.php', $data);
        $this->load->view('templates/footer.php');
    }

}
