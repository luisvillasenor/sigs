<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dependencias extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function __construct(){ /* Esta funcion debe de ir en cada controlador para verificar si la sesion y el usuario siguen conectados */

		session_start();

		parent::__construct();

		if ( isset($_SESSION['username']) == NULL ){
			redirect(base_url('admin/logout'), 'refresh');
		}

		define('ROL',$_SESSION['rol']);
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',strstr($_SESSION['username'],'@',true));
	    define('STATUS',$_SESSION['status']);
	    define('GEO',$_SESSION['geo']);

  		$this->load->model('permisos_model');

	}

	public function welcome(){

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$this->load->library('pagination');
		$this->load->library('table');

		$config['base_url'] = base_url() . 'gs.php/dependencias/welcome';
		$config['total_rows'] = $this->db->get('dependencias')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);

		$data['records_por_nombre'] = $this->db->order_by('dependencia','asc')->get('dependencias',$config['per_page'],$this->uri->segment(3)); 
		
        $this->load->model('ciudadanos_model');
        $this->load->model('dependencias_model');
		$this->load->model('referencias_model');
		$this->load->model('secciones_model');
		$this->load->model('clasificados_model');

		$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all_ciudadanos();
		$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
		$data['get_all_referencias'] = $this->referencias_model->get_all();
		$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
		$data['get_all_clasificados'] = $this->clasificados_model->get_all_clasificados();
		
		$this->load->view('header');
		$this->load->view('welcome_deps',$data);
		$this->load->view('footer');
	}

	public function one_dep($dep_id){

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
        
		$this->load->library('pagination');
		$this->load->library('table');

		$config['base_url'] = base_url() . 'gs.php/dependencias/welcome';
		$config['total_rows'] = $this->db->get('dependencias')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);


        $this->load->model('ciudadanos_model');
        $this->load->model('dependencias_model');
		$this->load->model('referencias_model');
		$this->load->model('secciones_model');
		$this->load->model('clasificados_model');

		$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all_ciudadanos();
		$data['get_one_dep'] = $this->dependencias_model->get_one_dep($dep_id);
		$data['get_all_referencias'] = $this->referencias_model->get_all();
		$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
		$data['get_all_clasificados'] = $this->clasificados_model->get_all_clasificados();
		
		$this->load->view('header');
		$this->load->view('one_view_dep',$data);
		$this->load->view('footer');
	}

	public function edit(){

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
        
        $this->load->model('ciudadanos_model');
        $this->load->model('dependencias_model');
		$this->load->model('referencias_model');
		$this->load->model('secciones_model');
		$this->load->model('clasificados_model');

		$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all_ciudadanos();
		$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
		$data['get_all_referencias'] = $this->referencias_model->get_all();
		$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
		$data['get_all_clasificados'] = $this->clasificados_model->get_all_clasificados();
		
		$this->load->view('header');
		$this->load->view('edit_view_deps',$data);
		$this->load->view('footer');
	}

	public function ordenar_por_id(){

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$this->load->library('pagination');
		$this->load->library('table');

		$config['base_url'] = base_url() . 'gs.php/dependencias/ordenar_por_id';
		$config['total_rows'] = $this->db->get('dependencias')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);

		$data['records_por_id'] = $this->db->order_by('dep_id','asc')->get('dependencias',$config['per_page'],$this->uri->segment(3)); 
		
        $this->load->model('ciudadanos_model');
        $this->load->model('dependencias_model');
		$this->load->model('referencias_model');
		$this->load->model('secciones_model');
		$this->load->model('clasificados_model');

		$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all_ciudadanos();
		$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
		$data['get_all_referencias'] = $this->referencias_model->get_all();
		$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
		$data['get_all_clasificados'] = $this->clasificados_model->get_all_clasificados();
		
		$this->load->view('header');
		$this->load->view('deps_view_por_id',$data);
		$this->load->view('footer');
	}

	public function nueva_dep(){

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
        
        $this->load->model('ciudadanos_model');
        $this->load->model('dependencias_model');
		$this->load->model('referencias_model');
		$this->load->model('secciones_model');
		$this->load->model('clasificados_model');

		$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all_ciudadanos();
		$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
		$data['get_all_referencias'] = $this->referencias_model->get_all();
		$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
		$data['get_all_clasificados'] = $this->clasificados_model->get_all_clasificados();
		
		$this->load->view('header');
		$this->load->view('nueva_dep_view',$data);
		$this->load->view('footer');
	}

	public function agregar(){
		$this->load->model('dependencias_model');
		$this->dependencias_model->insert_entry();
		redirect('dependencias/welcome');
	}
	// 
	public function actualizar(){
		$this->load->model('dependencias_model');
		$this->dependencias_model->update_entry();
		redirect('dependencias/welcome');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */