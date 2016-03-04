<?php
class Ciudadanos_model extends CI_Model 
{
    // Definicion de variables iguales a los nombres de los campos de la tabla 
    var $id_ciudadano = '';    
    var $nombreCompleto = '';
    var $calle = '';
    var $id_seccion = '';
    var $telefono = '';
    var $distrito = '';
    var $fecha_creacion = '';
    var $user_creacion = '';
    var $fecha_act = '';
    var $user_act = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }
/////////////////////////////////
public function record_count($distrito = GEO) {
    if ( isset($distrito) ) {
        $this->db->where('distrito',$distrito);
        return $this->db->count_all_results('ciudadanos');
    } else {
        return $this->db->count_all_results('ciudadanos');
    }
}
 
public function fetch_rows($limit, $start,$distrito = GEO) {
    $this->db->where('distrito',$distrito);
    $this->db->limit($limit, $start);
    $this->db->order_by('nombreCompleto','ASC');
    $this->db->from('ciudadanos');
    $this->db->join('secciones', 'secciones.id = ciudadanos.id_seccion','left');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}
/////////////////////////////////
     function get_all()
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->where('user_creacion',USER);
                        $this->db->where('distrito',GEO);
                        $this->db->order_by('nombreCompleto','ASC');
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('user_creacion',USER);
                        $this->db->where('distrito',GEO);
                        $this->db->order_by('nombreCompleto','ASC');
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('user_creacion',USER);
                        $this->db->where('distrito',GEO);
                        $this->db->order_by('nombreCompleto','ASC');
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('distrito',GEO);
                        $this->db->order_by('nombreCompleto','ASC');
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('distrito',GEO);
                        $this->db->order_by('nombreCompleto','ASC');
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('distrito',GEO);
                        $this->db->order_by('nombreCompleto','ASC');
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                //$this->db->where('distrito',GEO);
                $this->db->order_by('nombreCompleto','ASC');
                $query = $this->db->get('ciudadanos');
                return $query->result();
                break;
                
            default:
                # code...
                $this->db->order_by('nombreCompleto','ASC');
                $query = $this->db->get('ciudadanos');
                return $query->result();
                break;
        }

    }


    function get_last_ten_ciudadanos()
    {
        $query = $this->db->get('ciudadanos', 10);
        return $query->result();
    }

    function get_10_ciudadanos()
    {
        $this->db->order_by('ciud_id','desc');
        $this->db->limit(10);
        $query = $this->db->get('ciudadanos');
        return $query->result();
    }

    function get_all_ciudadanos()
    {
        $this->db->order_by('nombre','asc');
        $query = $this->db->get('ciudadanos');
        return $query->result();
    }

    function get_one($nombreCompleto)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->like('nombreCompleto', $nombreCompleto);
                        $this->db->where('user_creacion',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->like('nombreCompleto', $nombreCompleto);
                        $this->db->where('user_creacion',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->like('nombreCompleto', $nombreCompleto);
                        $this->db->where('user_creacion',USER);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->like('nombreCompleto', $nombreCompleto);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->like('nombreCompleto', $nombreCompleto);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->like('nombreCompleto', $nombreCompleto);
                        $this->db->where('distrito',GEO);
                        $query = $this->db->get('ciudadanos');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                //$this->db->where('distrito',GEO);
                $this->db->like('nombreCompleto', $nombreCompleto);
                $query = $this->db->get('ciudadanos');
                return $query->result();
                break;
                
            default:
                # code...
                $this->db->like('nombreCompleto', $nombreCompleto);
                $query = $this->db->get('ciudadanos');
                return $query->result();
                break;
        }

    }

    function get_one_ciudadano($id_ciudadano)
    {
        $this->db->where('id_ciudadano', $id_ciudadano);
        $this->db->limit(1);
        $query = $this->db->get('ciudadanos');
        return $query->result();
    }

        function get_one_ciudadano_by_id($res)
    {
        $this->db->select('*');
        $this->db->where('ciud_id', $res);     
        $query = $this->db->get('ciudadanos');
           
        return $query->result();
    }

    function get_ciudadano_vs_solicitud($res)
    {
        $this->db->select('ciudadanos.ciud_id as ciud_id,
            ciudadanos.nombre as nombre,
            ciudadanos.apellido_p as apellido_p,
            ciudadanos.apellido_m as apellido_m,
            ciudadanos.sexo as sexo,
            ciudadanos.edad as edad,
            ciudadanos.tel_of as tel_of,
            ciudadanos.tel_casa as tel_casa,
            ciudadanos.tel_cel as tel_cel,
            ciudadanos.email as email,
            ciudadanos.hora as hora,
            ciudadanos.fecha_alta as fecha_alta,
            ciudadanos.num_hijos as num_hijos,
            ciudadanos.domicilio as domicilio,
            ciudadanos.cp as cp,
            ciudadanos.sec_id as sec_id,
            ciudadanos.capturista as capturista,
            ciudadanos.edocivil as edocivil,
            referencias.ref_id as ref_id');
        $this->db->from('ciudadanos');
        $this->db->join('solicitudes', 'solicitudes.ciud_id = ciudadanos.ciud_id');
        $this->db->join('referencias', 'referencias.ref_id = ciudadanos.ref_id');
        
            $this->db->where('solicitudes.solicitud_id', $res);
            $query = $this->db->get();
        
           
        return $query->result();
    }


        function get_ciudadano_vs_solicitudID($solicitud_id)
    {
        $this->db->select('ciudadanos.ciud_id as ciud_id,
            ciudadanos.nombre as nombre,
            ciudadanos.apellido_p as apellido_p,
            ciudadanos.apellido_m as apellido_m,
            ciudadanos.sexo as sexo,
            ciudadanos.edad as edad,
            ciudadanos.tel_of as tel_of,
            ciudadanos.tel_casa as tel_casa,
            ciudadanos.tel_cel as tel_cel,
            ciudadanos.email as email,
            ciudadanos.hora as hora,
            ciudadanos.fecha_alta as fecha_alta,
            ciudadanos.num_hijos as num_hijos,
            ciudadanos.domicilio as domicilio,
            ciudadanos.cp as cp,
            ciudadanos.sec_id as sec_id,
            ciudadanos.capturista as capturista,
            ciudadanos.edocivil as edocivil,
            referencias.ref_id as ref_id');
        $this->db->from('ciudadanos');
        $this->db->join('solicitudes', 'solicitudes.ciud_id = ciudadanos.ciud_id');
        $this->db->join('referencias', 'referencias.ref_id = ciudadanos.ref_id');
        
            $this->db->where('solicitudes.solicitud_id', $solicitud_id);
            $query = $this->db->get();
        
           
        return $query->result();
    }



    function get_all_ciudadanos_orderby($campo, $by)
    {
        $query = $this->db->get('ciudadanos');
        $this->db->order_by($campo, $by);
        return $query->result();
    }

    function insert_entry()
    {
        $data['nombreCompleto'] = (isset($_POST['nombreCompleto'])) ? $this->input->post('nombreCompleto') : null ; 
        $data['calle']          = (isset($_POST['calle'])) ? $this->input->post('calle') : null ; 
        $data['id_seccion']     = (isset($_POST['id_seccion'])) ? $this->input->post('id_seccion') : null ; 
        $data['telefono']       = (isset($_POST['telefono'])) ? $this->input->post('telefono') : null ; 
        $data['distrito']       = (isset($_POST['distrito'])) ? $this->input->post('distrito') : null ; 
        $data['distritolocal']  = (isset($_POST['distritolocal'])) ? $this->input->post('distritolocal') : null ; 
        $data['fecha_creacion'] = date('Y-m-d H:i:s');
        $data['user_creacion']  = USER;
        $data['fecha_act']      = date('Y-m-d H:i:s');
        $data['user_act']       = USER;

        $this->db->insert('ciudadanos', $data);
        return $this->db->insert_id();

    }

    function update_entry()
    {
        $data['id_ciudadano']   = (isset($_POST['id_ciudadano'])) ? $this->input->post('id_ciudadano') : null ; 
        $data['nombreCompleto'] = (isset($_POST['nombreCompleto'])) ? $this->input->post('nombreCompleto') : null ; 
        $data['calle']          = (isset($_POST['calle'])) ? $this->input->post('calle') : null ; 
        $data['id_seccion']     = (isset($_POST['id_seccion'])) ? $this->input->post('id_seccion') : null ; 
        $data['telefono']       = (isset($_POST['telefono'])) ? $this->input->post('telefono') : null ; 
        $data['distrito']       = (isset($_POST['distrito'])) ? $this->input->post('distrito') : null ; 
        $data['distritolocal']  = (isset($_POST['distritolocal'])) ? $this->input->post('distritolocal') : null ; 
        $data['fecha_creacion'] = (isset($_POST['fecha_creacion'])) ? $this->input->post('fecha_creacion') : null ; 
        $data['user_creacion']  = (isset($_POST['user_creacion'])) ? $this->input->post('user_creacion') : null ; 
        $data['fecha_act']      = date('Y-m-d H:i:s');
        $data['user_act']       = USER;

        $this->db->update('ciudadanos', $data, array('id_ciudadano' => $data['id_ciudadano']));

    }

    function get_df_ciudadano($id)
    {
        $this->db->select('distrito');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get('ciudadanos');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    
    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("ciudadanos");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }



}
?>