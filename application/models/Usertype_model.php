<?php
class Usertype_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get_all(){
        $this->db->select('*');
        $this->db->from('user_type');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('user_type');
        return $query->result_array();
    }   
}
?>