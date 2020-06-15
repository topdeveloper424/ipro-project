<?php
class User_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function register_user($user){
        $this->db->insert('users', $user);
    }

    public function get_all(){
        $this->db->select('users.*, user_type.type');
        $this->db->from('users');
        $this->db->join('user_type', 'users.role=user_type.id');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_client_by_tester($id){
        $this->db->select('users.*, cc.technician_id');
        $this->db->from('users');
        $this->db->join('(select * from client_technician where client_technician.technician_id = '.$id.') as cc', 'cc.client_id=users.id', 'left');
        $this->db->join('user_type', 'user_type.id=users.role');
        $this->db->where('user_type.type', 'client');
        //$this->db->where('client_technician.technician_id', $id);

        return $this->db->get()->result_array();
    }
    public function set_follow($client_id, $technician_id){
        $data = array('client_id' => $client_id, 'technician_id' => $technician_id );
        $this->db->insert('client_technician', $data);

    }
     public function set_unfollow($client_id, $technician_id){
        $data = array('client_id' => $client_id, 'technician_id' => $technician_id );
        $this->db->delete('client_technician', $data);
    }
    public function get_type(){
        $query = $this->db->get('ipros');

        return $query->result_array();
    }

    public function login_user($user){
        $username = $user['username'];
        $password = $user['password'];
        $this->db->select('users.*, user_type.type');
        $this->db->from('users');
        $this->db->join('user_type', 'users.role=user_type.id');
        $this->db->where('users.username', $username);
        $this->db->where('users.password', $password);

        if($query = $this->db->get()){
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function username_check($username){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if($query->num_rows()>0){
            return false;
        } else {
            return true;
        }
    }

    public function check_password($id, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->where('password', md5($password));
        $query = $this->db->get();

        if($query->num_rows()>0){
            return true;
        } else {
            return false;
        }
    }

    public function read($id){
        $this->db->select('users.*, user_type.type');
        $this->db->from('users');
        $this->db->join('user_type', 'users.role=user_type.id');
        $this->db->where('users.id', $id);
        return $this->db->get()->result_array();
    }
    public function reset_password($id, $password){

        $user['password'] = md5($password);

        $this->db->where('id', $id);
        $this->db->update('users', $user);
    }
    public function forget_password($username){
        $this->db->select('users.*, user_type.type');
        $this->db->from('users');
        $this->db->where('username', $username);
        $data = $this->db->get()->result_array();
        if(count($data) > 0){
            $user = $data[0];
            $user['status'] = 'reset';
            $id = $user['id'];
            $this->db->where('id', $id);
            $this->db->update('users', $user);
            return true;
        } else {
            return false;
        }

    }

    public function update_role($data){
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
    }

    public function update_tech_ipro($data){
      $this->db->where('id', $data['id']);
      $this->db->update('users', $data);
    }

    public function add_avatar($id, $avatar){
        $data['avatar'] = $avatar;
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function update($user){

        $this->db->where('id', $user['id']);
        $this->db->update('users', $user);
        return true;
    }
}
?>
