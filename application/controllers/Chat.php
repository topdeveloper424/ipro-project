<?php

class Chat extends CI_Controller {
    public function __construct(){
        parent::__construct();        
        $this->load->library('session');
        $this->load->helper('url');
        
        $this->load->model('user_model');         
        
        $user_id = $this->session->userdata('id');
        if(!$user_id){
            redirect('user/index');
        }
    }


    public function chatRoom()
    {
        $data['current'] = 'home';
        $data['userdata'] = $this->session->userdata();      
        $data['socket_url'] = $this->config->item('socket_url');
          /*$result=$this->user_model->get_by_id($user_id);
        $data['user']=$result;*/

        $this->load->view('templates/header.php', $data);
        $this->load->view('chat/chatpage',$data);      
        $this->load->view('templates/footer.php');
    }
}