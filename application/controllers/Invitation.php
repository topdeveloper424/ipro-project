<?php

class Invitation extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('usertype_model');
        $this->load->model('invitation_model');
        $this->load->model('ipros_model');
        $user_id = $this->session->userdata('id');
        if(!$user_id){
            redirect('user/index');
        }

    }

    public function index(){

        $user_id = $this->session->userdata('id');
        $role = $this->session->userdata('role');
        if($user_id && $role == 'admin'){
            $data['current'] = 'invitation';
            $data['userdata'] = $this->session->userdata();
            $data['users'] = $this->invitation_model->read_all_by_id($user_id);
            $data['types'] = $this->usertype_model->get_all();
            $data["type"] = $this->user_model->get_type();

            $this->load->view('templates/header.php', $data);
            $this->load->view('invitation/index.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $data["type"] = $this->user_model->get_type();
            $this->load->view('user/login.php', $data);
        }
    }

    public function inviteUser(){
        if ($this->input->post('invited_user_id')){
            $invited_user_id = $this->input->post('invited_user_id');
            $max_value = $this->input->post('maxValue');
            $min_value = $this->input->post('minValue');
            $ipro = $this->input->post('ipro');
            $token = sha1(mt_rand(1, 90000) . 'SALT');
            $main_user_id = $this->session->userdata('id');
            $invitation = array(
                'main_user' => $main_user_id,
                'invited_user' => $invited_user_id,
                'invited_time' => date("Y-m-d H:i:s"),
                'token' => $token,
                'min' => $min_value,
                'max' => $max_value,
                'ipro' => $ipro
            );
            $this->invitation_model->create_invitation($invitation);
            $invited_user = $this->user_model->get_by_id($invited_user_id);
//            echo json_encode($invited_user[0]['email']);
//            echo $this->session->userdata('email');
            $message = "<h1>You were invited! Please visit this link</h1><br><a href='".base_url()."invitation/openShareLink?token=".$token."'>view this chart</a>";

            $this->sendEmail1($this->session->userdata('email'), $invited_user[0]['email'], 'You were invited!', $message);
            echo json_encode(array('status' => true));
        }else{
            echo json_encode(array('status' => false));
        }
    }

    public function resendInvite(){
        if ($this->input->post('id')){
            $id = $this->input->post('id');
            $token = sha1(mt_rand(1, 90000) . 'SALT');
            $this->invitation_model->resend_invitation($id, $token);
            $invitation = $this->invitation_model->read_invitation_by_id($id);
            $invited_user = $this->user_model->get_by_id($invitation[0]['invited_user']);
            $message = "<h1>You were invited! Please visit this link</h1><br><a href='".base_url()."invitation/openShareLink?token=".$token."'>view this chart</a>";
            $this->sendEmail1($this->session->userdata('email'), $invited_user[0]['email'], 'You were invited!', $message);
            echo json_encode(array('status' => true));
        }else{
            echo json_encode(array('status' => false));
        }
    }

    public function detailInvitation(){
        if ($this->input->post('ipro')){
            $pro_id = $this->input->post('ipro');
            $ipros = $this->ipros_model->read_by_id($pro_id);
            echo json_encode($ipros[0]);
        }

    }
    public function removeInvite(){
        if ($this->input->post('id')){
            $id = $this->input->post('id');
            $this->invitation_model->remove_invitation($id);
            echo json_encode(array('status' => true));
        }else{
            echo json_encode(array('status' => false));
        }
    }

    /**
     * @return object
     */

    public function openShareLink(){
        if ($this->input->get('token')){
            $user_id = $this->session->userdata('id');
            $token = $this->input->get('token');
            $invitations = $this->invitation_model->read_invitation($user_id, $token);
            if (count($invitations) > 0){
                $data['min'] = $invitations[0]['min'];
                $data['max'] = $invitations[0]['max'];
                $data['userdata'] = $this->session->userdata();
                $ipro_id = $invitations[0]['ipro'];
                $ipros = $this->ipros_model->read_by_id($ipro_id);
                if (count($ipros) > 0){
                    $data['ipro'] = $ipros[0];
                    $this->load->view('invitation/shared.php', $data);

                }else{
                    echo "invalid link11!";
                }
            }else{
                echo "invalid link22!";
            }

        }

    }
    public function sendEmail($from, $to, $subject, $message){
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()){
            echo "sent";
        }else{
            echo "failed";
        }
    }
    public function sendEmail1($from, $to, $subject, $message){
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('trilobite@z3-tech.com', "Admin User");
        $email->setSubject($subject);
        $email->addTo($to, "invited User");
        $email->addContent("text/html", $message);
        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

}
?>
