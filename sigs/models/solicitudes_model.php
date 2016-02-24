<?php
class Solicitudes_model extends CI_Model 
{
    // Definicion de variables iguales a los nombres de los campos de la tabla 
    var $id = '';
    var $folio = '';
    var $concepto = '';
    var $fecha = '';
    var $clasificado = '';
    var $canalizado = '';
    var $geo = '';
    var $user = '';
    var $ciudadano_id = '';
    var $status = '';
    var $dis='';
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
public function record_count() {
        return $this->db->count_all('solicitudes');
    }
 
public function fetch_rows($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->get('solicitudes');

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}
/////////////////////////////////

     function get_all($limit, $start)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $this->db->limit($limit, $start);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $this->db->limit($limit, $start);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $this->db->limit($limit, $start);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('geo',GEO);
                        $this->db->limit($limit, $start);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('geo',GEO);
                        $this->db->limit($limit, $start);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('geo',GEO);
                        $this->db->limit($limit, $start);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                //$this->db->where('geo',GEO);
                $this->db->limit($limit, $start);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
                
            default:
                # code...
                $this->db->limit($limit, $start);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }


    function get_one($folio)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->like('folio', $folio);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->like('folio', $folio);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->like('folio', $folio);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->like('folio', $folio);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->like('folio', $folio);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->like('folio', $folio);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                $this->db->like('folio', $folio);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
                
            default:
                $this->db->like('folio', $folio);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }

    }

    function get_one_id($id)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->where('id', $id);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('id', $id);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('id', $id);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->where('id', $id);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->where('id', $id);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->where('id', $id);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                $this->db->where('id', $id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
                
            default:
                $this->db->where('id', $id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }

    }

    function get_one_solicitud($id)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->where('id', $id);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                        $this->db->where('id', $id);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                        $this->db->where('id', $id);
                        $this->db->where('user',USER);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->where('id', $id);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->where('id', $id);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->where('id', $id);
                        $this->db->where('geo',GEO);
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                //$this->db->where('geo',GEO);
                $this->db->where('id', $id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
                
            default:
                # code...
                $this->db->where('id', $id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }

    function get_mis_solicitudes($id)
    {
        $this->db->select('*');
        $this->db->where('ciudadano_id', $id);
        //$this->db->limit(1);
        $query = $this->db->get('solicitudes');
        return $query->result();
    }


    function insert_entry()
    {
        $data['folio']      = $_POST['folio'];
        $data['concepto']  = $_POST['concepto'];
        $data['fecha']      = date('Y-m-d H:i:s');
        $data['clasificado'] = $_POST['clasificado'];
        $data['canalizado']   = $_POST['canalizado'];
        $data['geo']        = $_POST['geo'];
        $data['user']        = $_POST['user'];
        $data['status']       = $_POST['status'];
        $data['fecha_act']      = date('Y-m-d H:i:s');
        $data['user_act']       = USER;

        $data['ciudadano_id'] = $_POST['ciudadano_id'];        

        $this->db->insert('solicitudes', $data);
        return $this->db->insert_id();

    }

    function update_entry()
    {
        $data['id']      = $_POST['id'];
        $data['folio']      = $_POST['folio'];
        $data['concepto']  = $_POST['concepto'];
        $data['fecha']      = $_POST['fecha'];
        $data['clasificado'] = $_POST['clasificado'];
        $data['canalizado']   = $_POST['canalizado'];
        $data['geo']        = $_POST['geo'];
        $data['user']        = $_POST['user'];
        $data['status']       = $_POST['status'];
        $data['fecha_act']      = date('Y-m-d H:i:s');
        $data['user_act']       = USER;


        $data['ciudadano_id'] = $_POST['ciudadano_id'];

        $this->db->update('solicitudes', $data, array('id' => $_POST['id']));
    }

    // Esta funcion se utiliza en el controler del ciudadano/actualizar
    function update_solicitudes($ciudadano,$distrito)
    {
        $data = array('geo' => $distrito );
        $this->db->where('ciudadano_id',$ciudadano);
        $this->db->update('solicitudes', $data);
    }

    function update_status($status,$solicitud_id)
    {
        $data = array('status' => $status );
        $this->db->where('id',$solicitud_id);
        $this->db->update('solicitudes', $data);

    }

    function total_solicitudes($ciudadano_id){

        $this->db->where('ciudadano_id',$ciudadano_id);
        $query = $this->db->get('gestiones');

        if ($query->num_rows() > 0)
        {
           return $query->num_rows();
        }

        return false;
    }

    function reporte_por(){
        $this->db->select('canalizado,status,count(*) as total');
        $this->db->group_by('canalizado');
        $this->db->group_by('status');
        $this->db->order_by('canalizado','asc');
        $this->db->order_by('status','asc');
        $query = $this->db->get('solicitudes');
        if ($query->num_rows() > 0)
        {
           return $query->result();
        }
        return false;
    }

    function top10Dependencia(){
        $this->db->select('canalizado,status,count(*) as total');
        $this->db->group_by('canalizado');
        $this->db->group_by('status');
        $this->db->order_by('canalizado','asc');
        $this->db->order_by('status','asc');
        $this->db->limit(10);
        $query = $this->db->get('solicitudes');
        if ($query->num_rows() > 0)
        {
           return $query->result();
        }
        return false;
    }

/////////////////////////////////////////////////
///////////// GRAFICAS ////////////////

     function grafica_clasificados()
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                    
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->select('geo,clasificado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','01');
                        $this->db->group_by("geo");
                        $this->db->group_by("clasificado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->select('geo,clasificado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','02');
                        $this->db->group_by("geo");
                        $this->db->group_by("clasificado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->select('geo,clasificado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','03');
                        $this->db->group_by("geo");
                        $this->db->group_by("clasificado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                $this->db->select('geo,clasificado,count(*) as total');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->group_by("geo");
                $this->db->group_by("clasificado");
                $this->db->order_by("geo","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            default:
                $this->db->select('geo,clasificado,count(*) as total');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->group_by("geo");
                $this->db->group_by("clasificado");
                $this->db->order_by("geo","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }

    }

     function grafica_canalizados($sta)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->select('geo,canalizado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','01');
                        $this->db->group_by("geo");
                        $this->db->group_by("canalizado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->select('geo,canalizado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','02');
                        $this->db->group_by("geo");
                        $this->db->group_by("canalizado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->select('geo,canalizado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','03');
                        $this->db->group_by("geo");
                        $this->db->group_by("canalizado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->select('geo,canalizado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','01');
                        $this->db->group_by("geo");
                        $this->db->group_by("canalizado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->select('geo,canalizado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','02');
                        $this->db->group_by("geo");
                        $this->db->group_by("canalizado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->select('geo,canalizado,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','03');
                        $this->db->group_by("geo");
                        $this->db->group_by("canalizado");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Dirigencia':
                $this->db->select('canalizado,status,count(*) as total');
                $this->db->where('status',$sta);
                $this->db->group_by("canalizado");
                $this->db->group_by("status");
                $this->db->order_by("canalizado","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            case 'Candidato':
                $this->db->select('canalizado,status,count(*) as total');
                $this->db->where('status',$sta);
                $this->db->group_by("canalizado");
                $this->db->group_by("status");
                $this->db->order_by("canalizado","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            default:

                break;
        }

    }

     function grafica_seccion()
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->select('geo,seccion,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','01');
                        $this->db->group_by("geo");
                        $this->db->group_by("seccion");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->select('geo,seccion,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','02');
                        $this->db->group_by("geo");
                        $this->db->group_by("seccion");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->select('geo,seccion,count(*) as total');
                        $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                        $this->db->where('geo','03');
                        $this->db->group_by("geo");
                        $this->db->group_by("seccion");
                        $this->db->order_by("geo","asc");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                $this->db->select('geo,seccion,count(*) as total');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->group_by("geo");
                $this->db->group_by("seccion");
                $this->db->order_by("geo","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            default:
                $this->db->select('geo,seccion,count(*) as total');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->group_by("geo");
                $this->db->group_by("seccion");
                $this->db->order_by("geo","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }

    }

     function grafica_status()
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->select('status,count(*) as total');
                        $this->db->where('geo','01');
                        $this->db->group_by("status");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->select('status,count(*) as total');
                        $this->db->where('geo','02');
                        $this->db->group_by("status");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->select('status,count(*) as total');
                        $this->db->where('geo','03');
                        $this->db->group_by("status");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                }
            case 'Candidato':
                # code...
                switch (GEO) {
                    case '01':
                        $this->db->select('status,count(*) as total');
                        $this->db->where('geo','01');
                        $this->db->group_by("status");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        $this->db->select('status,count(*) as total');
                        $this->db->where('geo','02');
                        $this->db->group_by("status");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        $this->db->select('status,count(*) as total');
                        $this->db->where('geo','03');
                        $this->db->group_by("status");
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                }
            case 'Administrador':
                $this->db->select('geo,status,count(*) as total');
                $this->db->group_by("geo");
                $this->db->group_by("status");
                $this->db->order_by("geo","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;                
            default:
                $this->db->select('geo,status,count(*) as total');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->group_by("geo");
                $this->db->group_by("status");
                $this->db->order_by("geo","asc");
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }

////////////////////////////////////////////////////////////////////////////

    function solicitudes_totales($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0){
                    return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0){
                    return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0){
                    return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0){
                    return $query->num_rows();
                }
                return false;
                break;
        }
    }

    function solicitudes_latentes($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $this->db->where('status',1);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $this->db->where('status',1);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $this->db->where('status',1);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $this->db->where('status',1);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
        }
    }

    function solicitudes_canalizado($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $this->db->where('status',2);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $this->db->where('status',2);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $this->db->where('status',2);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $this->db->where('status',2);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
        }

    }

    function solicitudes_atendido_positivo($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $this->db->where('status',3);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $this->db->where('status',3);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $this->db->where('status',3);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $this->db->where('status',3);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
        }
    }

    function solicitudes_abierto($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $this->db->where('status',5);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $this->db->where('status',5);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $this->db->where('status',5);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $this->db->where('status',5);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
        }
    }

    function solicitudes_pendiente($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $this->db->where('status',6);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $this->db->where('status',6);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $this->db->where('status',6);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $this->db->where('status',6);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
        }
    }

    function solicitudes_atendido_negativo($dis){
        switch ($dis) {
            case '01':
                $this->db->where('geo',$dis);
                $this->db->where('status',7);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '02':
                $this->db->where('geo',$dis);
                $this->db->where('status',7);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
            case '03':
                $this->db->where('geo',$dis);
                $this->db->where('status',7);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;                            
            default:
                $this->db->where('status',7);
                $query = $this->db->get('solicitudes');
                if ($query->num_rows() > 0)
                {
                   return $query->num_rows();
                }
                return false;
                break;
        }
    }

    function solicitudes_distrito($distrito){
        $this->db->where('geo',$distrito);
        $query = $this->db->get('solicitudes');
        if ($query->num_rows() > 0)
        {
           return $query->num_rows();
        }
        return false;
    }

    function solicitudes_por_dependencia(){
        $this->db->select('canalizado,count(*) as total');
        $this->db->group_by("canalizado");
        $query = $this->db->get('solicitudes');
        return $query->result();
    }

    function top10_dependencia(){
        $this->db->select('canalizado,count(*) as total');
        $this->db->group_by("canalizado");
        $this->db->order_by('total','DESC');
        $this->db->limit(10);
        $query = $this->db->get('solicitudes');
        return $query->result();
    }


///////////// CORTES ////////////////

     function cortes($from,$to,$casa)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                
            case 'Supervision':
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->where('geo',$casa);
                //$this->db->where('status',$status);
                $this->db->where('fecha >=',$from);
                $this->db->where('fecha <=',$to.'23:59:59');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;                    
            case 'Administrador':
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->where('geo',$casa);
                //$this->db->where('status',$status);
                $this->db->where('fecha >=',$from);
                $this->db->where('fecha <=',$to.'23:59:59');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            default:
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->where('geo',$casa);
                //$this->db->where('status',$status);
                $this->db->where('fecha >=',$from);
                $this->db->where('fecha <=',$to.'23:59:59');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }
 
    function cortes_todo($from,$to,$casa)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                
            case 'Supervision':
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                //$this->db->where('status',$status);
                $this->db->where('fecha >=',$from);
                $this->db->where('fecha <=',$to.'23:59:59');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;                    
            case 'Administrador':
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                //$this->db->where('status',$status);
                $this->db->where('fecha >=',$from);
                $this->db->where('fecha <=',$to.'23:59:59');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            default:
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                //$this->db->where('status',$status);
                $this->db->where('fecha >=',$from);
                $this->db->where('fecha <=',$to.'23:59:59');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }

    function cortes_todo_filtro($status_id)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        return false;
                        break;
                    case '02':
                        return false;
                        break;
                    case '03':
                        return false;
                        break;                    
                }                
            case 'Supervision':
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->where('solicitudes.status',$status_id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;                    
            case 'Administrador':
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->where('solicitudes.status',$status_id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
            default:
                $this->db->select('solicitudes.id as id, 
                    solicitudes.fecha as fecha,
                    solicitudes.concepto as concepto,
                    ciudadanos.nombreCompleto as ciudadano,
                    ciudadanos.calle as calle,
                    ciudadanos.seccion as seccion,
                    ciudadanos.telefono as telefono,
                    solicitudes.canalizado as canalizado,
                    solicitudes.status as status,
                    solicitudes.user,
                    solicitudes.geo');
                $this->db->join('ciudadanos','ciudadanos.id = solicitudes.ciudadano_id','left');
                $this->db->where('solicitudes.status',$status_id);
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }


/////////////////////////////////

     function get_all_status($limit, $start,$status_id)
    {
        switch (ROL) {
            case 'Capturista':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                        $this->db->limit($limit, $start);
                        $this->db->where('status',$status_id);
                        $this->db->where('geo',GEO);
                        $this->db->order_by('geo','asc');
                        $this->db->order_by('canalizado','asc');
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                    $this->db->limit($limit, $start);
                        $this->db->where('status',$status_id);
                        $this->db->where('geo',GEO);
                        $this->db->order_by('geo','asc');
                        $this->db->order_by('canalizado','asc');
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                    $this->db->limit($limit, $start);
                        $this->db->where('status',$status_id);
                        $this->db->where('geo',GEO);
                        $this->db->order_by('geo','asc');
                        $this->db->order_by('canalizado','asc');
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }                
            case 'Supervision':
                # code...
                switch (GEO) {
                    case '01':
                        # code...
                    $this->db->limit($limit, $start);
                        $this->db->where('status',$status_id);
                        $this->db->where('geo',GEO);
                        $this->db->order_by('geo','asc');
                        $this->db->order_by('canalizado','asc');
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '02':
                        # code...
                    $this->db->limit($limit, $start);
                        $this->db->where('status',$status_id);
                        $this->db->where('geo',GEO);
                        $this->db->order_by('geo','asc');
                        $this->db->order_by('canalizado','asc');
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;
                    case '03':
                        # code...
                    $this->db->limit($limit, $start);
                        $this->db->where('status',$status_id);
                        $this->db->where('geo',GEO);
                        $this->db->order_by('geo','asc');
                        $this->db->order_by('canalizado','asc');
                        $query = $this->db->get('solicitudes');
                        return $query->result();
                        break;                    
                }
            case 'Administrador':
                # code...
            $this->db->limit($limit, $start);
                $this->db->where('status',$status_id);
                $this->db->order_by('geo','asc');
                $this->db->order_by('canalizado','asc');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
                
            default:
                # code...
            $this->db->limit($limit, $start);
                $this->db->where('status',$status_id);
                $this->db->order_by('geo','asc');
                $this->db->order_by('canalizado','asc');
                $query = $this->db->get('solicitudes');
                return $query->result();
                break;
        }
    }


}
?>  