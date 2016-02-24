<?php
class Permisos_model extends CI_Model {

 var $rol = '';
 var $componente = '';
 var $recurso = '';
 var $permiso ='';

  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
        
  }

  public function get_all(){

    $this->db->order_by('rol','asc');
    $this->db->order_by('permiso','desc');
    $this->db->order_by('componente','asc');
    $this->db->order_by('recurso','asc');

    $q = $this->db->get('permisos');

    if ( $q->num_rows > 0 ){

      return $q->result();
    }

    return false;

  }

  function insert_entry()
  {
      $this->rol           = $_POST['rol'];
      $this->componente    = $_POST['componente'];
      $this->recurso       = $_POST['recurso'];
      
      $this->db->insert('permisos', $this);
  }

  function delete($id)
  {
      $this->db->delete('permisos', array('id' => $id)); 
      
  }

  public function verify_componente($rol,$componente){
    $this->db->select('*');
    $this->db->where('rol',$rol);
    $this->db->where('componente',$componente);
    $this->db->where('recurso','/index');
    $this->db->where('permiso','1');
    $this->db->limit(1);
    $q = $this->db->get('permisos');
    if ( $q->num_rows > 0 ){
      return true; //$q->row();
    }
    return false;
  }

  public function verify_recursos($rol,$componente,$recurso){
    $this->db->select('*');
    $this->db->where('rol',$rol);
    $this->db->where('componente',$componente);
    $this->db->where('recurso',$recurso);
    $this->db->where('permiso',1);
    $this->db->limit(1);
    $q = $this->db->get('permisos');
    if ( $q->num_rows >= 0 ){
      return true; //$q->row();
    }
    return false;
  }

  public function componentes($rol){

    $this->db->select('*');
    $this->db->where('rol',$rol);
    $this->db->where('recurso','/index');
    $this->db->where('permiso','1');
    $q = $this->db->get('permisos');

    if ( $q->num_rows > 0 ){

      return $q->result();
    }

    return false;

  }

  public function recursos($rol){

    $this->db->select('*');
    $this->db->where('rol',$rol);
    //$this->db->where('componente',$componente);
    $this->db->where('permiso','1');
    $q = $this->db->get('permisos');

    if ( $q->num_rows > 0 ){

      return $q->result();
    }

    return false;

  }

  function permitir($id)
  {
      $data['id']     = $id;
      $data['permiso'] = TRUE;
      $this->db->update('permisos', $data, array('id' => $id));
  }

  function quitar($id)
  {
      $data['id']     = $id;
      $data['permiso'] = FALSE;
      $this->db->update('permisos', $data, array('id' => $id));
  }
	


}

?>