<?php

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('user_model');
    }

    public function index(){

        $user_id = $this->session->userdata('id');
        if($user_id){
            redirect('/home');
        } else {
            $data["type"] = $this->user_model->get_type();
            $this->load->view('user/login.php', $data);
        }
    }

    public function register(){

        $data = $this->input->post();

        $user = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'role' => $data['role'],
            'created_at' => date('Y-m-d H:i:s')
        );

        if($data['role']==2){
            $user =  array_merge($user, array("ipro_id" => implode(",",$data['ipro_id'])));
        }
        $username_check = $this->user_model->username_check($user['username']);

        if($username_check){
            $this->user_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully. Please login.');
            echo json_encode(array('status' => true, 'user' => $user));
        } else {
            $this->session->set_flashdata('error_msg', 'Error occured, Try again');
            echo json_encode(array('status' => false, 'msg' => 'Username already exist'));
        }
    }

    public function login(){
        $user_login = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $data['users'] = $this->user_model->login_user($user_login);

        if(count($data['users'])){

            $newdata = array(
                'id'  => $data['users'][0]['id'],
                'fullname'     => $data['users'][0]['first_name'].' '.$data['users'][0]['last_name'],
                'email'     => $data['users'][0]['email'],
                'username'  => $data['users'][0]['username'],
                'avatar'  => $data['users'][0]['avatar'],
                'ipro_id'  => $data['users'][0]['ipro_id'],
                'role'  => $data['users'][0]['type'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            if($data['users'][0]['role'] === 'admin'){
                redirect('admin');
            } else {
                redirect('/home');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Username or Password is incorrect, Try again please.');
            $this->load->view('user/login.php');
        }
    }

    function update(){
        $data = $this->input->post();
        $result = $this->user_model->update($data);
        if($result){
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'old password is not correct'));
        }
    }

    function user_profile(){
        $user_id = $this->session->userdata('id');

        if($user_id){
            $data['current'] = 'profile';
            $data['userdata'] = $this->session->userdata();
            $data['user'] = $this->user_model->read($user_id)[0];

            $this->load->view('templates/header.php', $data);
            $this->load->view('user/user_profile.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            redirect('user/index');
        }
    }

    public function reset_password(){
        $data = $this->input->post();
        $this->user_model->reset_password($data['id']);
        echo json_encode(array('status' => true));
    }

    public function remove_user(){
        $data = $this->input->post();
        $this->user_model->delete($data['id']);
        echo json_encode(array('status' => true));
    }

    public function forget_password(){
        $data = $this->input->post();
        $result = $this->user_model->forget_password($data['username']);
        echo json_encode(array('status' => $result));
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('user', 'refresh');
    }
}
?>
