<?php
class Secciones_model extends CI_Model 
{
    // Definicion de variables iguales a los seccions de los campos de la tabla 
    var $id = '';
    var $municipio = '';
    var $df = '';
    var $distritoUni = '';
    var $seccion = '';
    var $colonia = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function get_all_secciones(){
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->order_by('colonia','asc');
                        //$this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->order_by('colonia','asc');
                        //$this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->order_by('colonia','asc');
                        //$this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->order_by('colonia','asc');
                        //$this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->order_by('colonia','asc');
                        //$this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->order_by('colonia','asc');
                        //$this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                $this->db->order_by('colonia','asc');
                //$this->db->where('df',GEO);
                $query = $this->db->get('secciones');
                return $query->result();
                break;
                
            default:
                # code...
                $query = $this->db->get('secciones');
                return $query->result();
                break;
        }
    }

    function get_for_select(){
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->order_by('colonia','asc');
                        $this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->order_by('colonia','asc');
                        $this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->order_by('colonia','asc');
                        $this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->order_by('colonia','asc');
                        $this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->order_by('colonia','asc');
                        $this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->order_by('colonia','asc');
                        $this->db->where('df',GEO);
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                $this->db->order_by('colonia','asc');
                //$this->db->where('df',GEO);
                $query = $this->db->get('secciones');
                return $query->result();
                break;
                
            default:
                # code...
                $query = $this->db->get('secciones');
                return $query->result();
                break;
        }
    }

    function haySeguimiento($dis_id)
    {
        $query = $this->db->select('count(dis_id) as total');
        $this->db->where('dis_id',$dis_id);
        $this->db->group_by($dis_id);

        $this->db->get('solicitudes');

        if ( $query < 1 ) {
            return false;
        } else {
            return true;
        }
    }

    function get_one($colonia)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->like('colonia', $colonia);
                        $this->db->order_by('colonia', 'ASC');
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->like('colonia', $colonia);
                        $this->db->order_by('colonia', 'ASC');
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->like('colonia', $colonia);
                        $this->db->order_by('colonia', 'ASC');
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->like('colonia', $colonia);
                        $this->db->order_by('colonia', 'ASC');
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->like('colonia', $colonia);
                        $this->db->order_by('colonia', 'ASC');
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->like('colonia', $colonia);
                        $this->db->order_by('colonia', 'ASC');
                        $query = $this->db->get('secciones');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                $this->db->like('colonia', $colonia);
                $this->db->order_by('colonia', 'ASC');
                $query = $this->db->get('secciones');
                return $query->result();
                break;
            default:
                $this->db->like('colonia', $colonia);
                $this->db->order_by('colonia', 'ASC');
                $query = $this->db->get('secciones');
                return $query->result();
                break;
        }

    }

    function insert_entry()
    {
        $data['seccion']   = $_POST['seccion'];
        $data['dis_id'] = $_POST['dis_id'];

        $this->db->insert('secciones', $data);
    }

    function update_entry()
    {
        $data['id']           = $_POST['id'];
        $data['municipio']    = $_POST['municipio'];
        $data['df']           = $_POST['df'];
        $data['distritoUni']  = $_POST['distritoUni'];
        $data['seccion']      = $_POST['seccion'];
        $data['colonia']      = $_POST['colonia'];

        $this->db->update('secciones', $data, array('id' => $_POST['id']));
    }

function get_df($seccion_id){
    $this->db->select('df');
    $this->db->where('id',$seccion_id);
    $this->db->limit(1);
    $query = $this->db->get('secciones');
    foreach ($query as $key => $value) {
        $distrito = $value;
        return $distrito;
    }
    //return $query->result();
}

}
?>