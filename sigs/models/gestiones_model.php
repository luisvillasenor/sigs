<?php
class Gestiones_model extends CI_Model 
{
    // Definicion de variables iguales a los nombres de los campos de la tabla 
    var $id = '';
    var $concepto = '';
    var $fecha = '';
    var $distrito = '';
    var $solicitud_id = '';
    var $user = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

     function get_all()
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                //$this->db->where('distrito',GEO);
                $query = $this->db->get('gestiones');
                return $query->result();
                break;
                
            default:
                # code...
                $query = $this->db->get('gestiones');
                return $query->result();
                break;
        }

    }

    function get_all_gestiones($id){
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->where('solicitud_id', $id);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->where('solicitud_id', $id);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->where('solicitud_id', $id);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('gestiones');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                //$this->db->where('distrito',GEO);
                $this->db->where('solicitud_id', $id);
                $query = $this->db->get('gestiones');
                return $query->result();
                break;
                
            default:
                # code...
                $this->db->where('solicitud_id', $id);
                $query = $this->db->get('gestiones');
                return $query->result();
                break;
        }
        
    }

    function get_one_gestion($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        //$this->db->limit(1);
        $query = $this->db->get('gestiones');
        return $query->result();
    }

    function insert_entry(){
        $data['concepto']     = $_POST['concepto'];
        $data['fecha']        = date('Y-m-d H:i:s');
        $data['solicitud_id'] = $_POST['solicitud_id'];
        $data['distrito']     = $_POST['distrito'];
        $data['user']         = USER;

        $this->db->insert('gestiones', $data);
        //return $this->db->insert_id();
    }

    function update_entry()
    {
        $data['id']           = $_POST['id'];
        $data['concepto']     = $_POST['concepto'];
        $data['fecha']        = date('Y-m-d H:i:s');        
        $data['distrito']     = $_POST['distrito'];
        $data['solicitud_id'] = $_POST['solicitud_id'];
        $data['user']         = USER;

        $this->db->update('gestiones', $data, array('id' => $_POST['id']));
    }

    function total_gestiones($solicitud_id){

        $this->db->where('solicitud_id',$solicitud_id);
        $query = $this->db->get('gestiones');

        if ($query->num_rows() > 0)
        {
           return true;
        }

        return false;
    }

    // Borra el registro de la BD
    function delete($id){
        $this->db->delete('gestiones', array('id' => $id));
    }



}
?>