<?php
class Users_model extends CI_Model 
{
    // Definicion de variables iguales a los nombres de los campos de la tabla 
    var $id = '';
    var $nombreCompleto = '';
    var $email_address = '';
    var $rol = '';
    var $fecha_creacion = '';
    var $password = '';
    var $fecha_ult_acceso = '';
    var $status = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function get_all()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    function get_one_user($USER)
    {
      $this->db->like('email_address',USER);
      $this->db->limit(1);
        $query = $this->db->get('users');
        return $query->result();
    }

    function insert_entry()
    {
        $this->nombreCompleto   = $_POST['nombreCompleto'];
        $this->email_address    = $_POST['email_address'];
        $this->rol              = $_POST['rol'];
        $this->geo              = $_POST['geo'];
        $this->fecha_creacion   = date('Y-m-d H:i:s');
        $this->password         = sha1($_POST['password']);
        $this->fecha_ult_acceso = date('Y-m-d H:i:s');

        $this->db->insert('users', $this);
    }

  function delete($id)
  {
      $this->db->delete('users', array('id' => $id)); 
      
  }



  function activar($id)
  {
      $data['id']     = $id;
      $data['status'] = TRUE;
      $this->db->update('users', $data, array('id' => $id));
  }

  function desactivar($id)
  {
      $data['id']     = $id;
      $data['status'] = FALSE;
      $this->db->update('users', $data, array('id' => $id));
  }


    function update_entry()
    {
        $this->id               = $_POST['id'];
        $this->nombreCompleto           = $_POST['nombreCompleto'];
        $this->email_address    = $_POST['email_address'];
        $this->rol            = $_POST['rol'];
        $this->geo            = $_POST['geo'];

        $this->fecha_creacion   = $_POST['fecha_creacion'];
        $this->password         = sha1($_POST['password']);
        $this->fecha_ult_acceso = date('Y-m-d H:i:s');

        $this->db->update('users', $this, array('id' => $_POST['id']));
    }



}
?>