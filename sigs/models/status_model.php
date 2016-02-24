<?php
class Status_model extends CI_Model 
{
    var $status_id = '';
    var $status = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_all_status() {
        $query = $this->db->get('status');
        return $query->result();
    }

    
}
?>