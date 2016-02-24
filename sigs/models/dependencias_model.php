<?php
class Dependencias_model extends CI_Model 
{
    var $id = '';
    var $entidad = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_dependencias() {
        $this->db->order_by("id","asc");
        $query = $this->db->get('dependencias');
        if ($query->num_rows() > 0)
        {
           return $query->result();
        }
        return false;
    }
    function get_all_deps() {
        $this->db->order_by("entidad","asc");
        $query = $this->db->get('dependencias');
        return $query->result();
    }
    function get_all_deps_by_id() {
        $this->db->order_by("id","asc");
        $query = $this->db->get('dependencias');
        return $query->result();
    }
    function get_one_dep($id) {

        $this->db->where("id",$dep_id);
        $query = $this->db->get('dependencias');
        return $query->result();
    }
    function insert_entry()
    {
        $this->entidad = $_POST['entidad'];

        $this->db->insert('dependencias', $this);
    }
    function update_entry()
    {
        $this->id  = $_POST['id'];
        $this->entidad = $_POST['entidad'];
        
        $this->db->update('dependencias', $this, array('id' => $_POST['id']));
    }
    
}
?>