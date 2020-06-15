<?php
class Invitation_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function create_invitation($invitation){
        $this->db->insert('invitations', $invitation);
    }

    public function read_all_by_id($id){
        $date = new DateTime();
        $date->sub(new DateInterval('P1D'));
        $limit_date = date_format($date,'Y-m-d H:i:s');
        $this->db->select('users.*, invitations.ipro, invitations.min, invitations.max, invitations.id as invite_id');
        $this->db->from('users');
        $this->db->join('invitations','users.id = invitations.invited_user');
        $this->db->where('invitations.main_user', $id);
        $this->db->where('invitations.invited_time >=' ,$limit_date);

        return $this->db->get()->result_array();
    }

    public function read_invitation($id, $token){
        $date = new DateTime();
        $date->sub(new DateInterval('P1D'));
        $limit_date = date_format($date,'Y-m-d H:i:s');
        $this->db->select('invitations.*');
        $this->db->from('invitations');
        $this->db->where('invitations.invited_user',$id);
        $this->db->where('invitations.token',$token);
        $this->db->where('invitations.invited_time >=' ,$limit_date);
        return $this->db->get()->result_array();
    }

    public function read_invitation_by_id($id){
        $this->db->select('invitations.*');
        $this->db->from('invitations');
        $this->db->where('invitations.id',$id);
        return $this->db->get()->result_array();
    }

    public function resend_invitation($id,$token){
        $data = array(
            'token' => $token,
            'invited_time' => date("Y-m-d H:i:s")
        );
        $this->db->where('id',$id);
        $this->db->update('invitations',$data);
        return true;
    }

    public function remove_invitation($id){
        $this->db->where('id',$id);
        $this->db->delete('invitations');
        return true;
    }

}
?>
