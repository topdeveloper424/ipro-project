<?php
class Base_Controller extends CI_Controller {	

    public function __construct()
    {		
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        
    //		date_default_timezone_set('Asia/ChungKing');
    }
}
?>