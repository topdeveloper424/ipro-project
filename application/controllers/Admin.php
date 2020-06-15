<?php

class Admin extends CI_Controller {
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
        $data['current'] = 'home';
        $data['userdata'] = $this->session->userdata();
        $data['users'] = $this->user_model->get_all();
        $data['types'] = $this->usertype_model->get_all();
        $data["type"] = $this->user_model->get_type();

        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/admin.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function ipros(){
        $data['current'] = 'home';
        $data['userdata'] = $this->session->userdata();
        $data['ipros'] = $this->ipros_model->read();

        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/setting.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function add_ipro(){

        $data = $this->input->post();
        // "Shawn"   : ('166.253.148.213', 12345, 232, [105])

        $ipro = array(
            'ipro_name' => $data['ipro_name'],
            'ipro_ip' => $data['ipro_ip'],
            'ipro_port' => $data['ipro_port'],
            'ipro_unit' => $data['ipro_unit'],
            'ipro_sensors' => $data['ipro_sensors']
        );

        $pro_id = $this->ipros_model->save($ipro);

        echo json_encode(array('status' => true, 'result' => $pro_id));
    }

    public function get_ipro(){
        $data = $this->input->post();
        $result = $this->ipros_model->get_by_id($data['id']);
        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function get_role(){
        $data = $this->input->post();
        $result = $this->user_model->get_by_id($data['id']);
        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function update_role(){
        $data = $this->input->post();
        $result = $this->user_model->update_role($data);
        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function update_tech_ipro(){
        $data = $this->input->post();        
        $result = $this->user_model->update_tech_ipro($data);
        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function update_password(){
        $data = $this->input->post();
        $result = $this->user_model->check_password($data["id"], $data["current_password"]);
        if ($result) {
            $result = $this->user_model->reset_password($data["id"], $data["password"]);
            echo json_encode(array('status' => true, 'result' => "Password was updated."));
        }else{
            echo json_encode(array('status' => false, 'result' => "The current password was wrong."));
        }
    }

    public function upload_avatar(){

        if ( 0 < $_FILES['file']['error'] ) {
            echo json_encode(array('status' => false, 'result' => 'Error: ' . $_FILES['file']['error'] ));
        }
        else {
            $avatar = "uploads/".$this->session->userdata("username").'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);;
            move_uploaded_file($_FILES['file']['tmp_name'], $avatar);
            $this->user_model->add_avatar($this->session->userdata("id"), $avatar);
            echo json_encode(array('status' => true, 'result' => 'Avatar was updated successfully.'));
        }

    }

    public function edit_ipro(){
        $data = $this->input->post();

        $ipro = array(
            'id' => $data['id'],
            'ipro_name' => $data['ipro_name'],
            'ipro_ip' => $data['ipro_ip'],
            'ipro_port' => $data['ipro_port'],
            'ipro_unit' => $data['ipro_unit'],
            'ipro_sensors' => $data['ipro_sensors']
        );
        $result = $this->ipros_model->update($ipro);

        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function remove_ipro(){
        $data = $this->input->post();
        $result = $this->ipros_model->delete($data['id']);
        echo json_encode(array('status' => true, 'result' => $result));
    }

    public function remove_user(){
        $data = $this->input->post();
        $result = $this->user_model->delete($data['id']);
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
