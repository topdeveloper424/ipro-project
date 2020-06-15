<?php
class Ipros_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function read(){
        $this->db->select('*');
        $this->db->from('ipros');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_id($id){
        $this->db->where_in('id', explode(",", $id));
        $query = $this->db->get('ipros');
        return $query->result_array();
    }
    public function read_by_id($id){
        $this->db->select('*');
        $this->db->from('ipros');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_client_id($client_id){
        $this->db->select('users.*');
        $this->db->from("users");
        $this->db->join('client_technician', 'client_technician.technician_id=users.id');
        $this->db->where('client_technician.client_id', $client_id);
        $ipro_ids = $this->db->get()->result_array();
        $ipros = [];

        $result = [];
        foreach ($ipro_ids as $key => $value) {
            $ipros= array_merge($ipros, explode(",", $value["ipro_id"]) );
            $this->db->distinct();
            $this->db->select('ipros.*');
            $this->db->from('ipros');
            $this->db->where_in('ipros.id', $ipros);
            $result = $this->db->get()->result_array();

            //array_push( $result, array('technician_id' => $value["id"], 'technician_name' => $value["first_name"].' '.$value["last_name"], 'technician_ipro' => $tech_result ));
        }

        return $result;
    }

    public function save($data){
        return $this->db->insert('ipros', $data);
    }

    public function update($data){
        $this->db->where('id', $data['id']);
        return $this->db->update('ipros', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('ipros');
    }
}
