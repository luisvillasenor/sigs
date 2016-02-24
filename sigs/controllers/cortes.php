<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cortes extends CI_Controller {

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
	function __construct(){/* esta funcion sobre escribe el CI_Controller y toma PHP nativo*/

		parent::__construct();// Se hacer fererencia al "parent" que en este caso el CI_Controller
		session_start();

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

	public function index()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('secciones_model');

 		  	$config["base_url"] = base_url() . "cortes/index";
	        $config["total_rows"] = $this->solicitudes_model->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['results'] = $this->solicitudes_model->fetch_rows($config["per_page"], $page);
	        $data['links'] = $this->pagination->create_links();


 		  	$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			
 
 		  	$from = $this->input->post('from');
 		  	$to = $this->input->post('to');
 		  	$casa = $this->input->post('casa');
 		  	$status = $this->input->post('status');
 		  	// Variables para el link de exportar_corte
 		  	$data['from'] = date('Y-m-d',strtotime($from));
 		  	$data['to'] = date('Y-m-d',strtotime($to));
 		  	$data['casa'] = $this->input->post('casa');
 		  	//$data['status'] = $this->input->post('status');

 		  	if ($casa == 'AGS') {
	 			$data['cortes'] = $this->solicitudes_model->cortes_todo($from,$to,$casa);
	 			$i = '0';
	 			foreach ($data['cortes'] as $value) {
	 				$i += 1 ;
	 			}
	 			$data['total_cortes'] =  $i;
	 			$data['total_rows'] = $this->solicitudes_model->record_count();
 		  	}else{
	 			$data['cortes'] = $this->solicitudes_model->cortes($from,$to,$casa);
	 			$j = '0';
	 			foreach ($data['cortes'] as $value) {
	 				$j += 1 ;
	 			}
	 			$data['total_cortes'] = $j;
	 			$data['total_rows'] = $this->solicitudes_model->record_count();
 		  	}

			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('cortes_view',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}

	public function exportar_corte($from,$to,$casa)
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('secciones_model');
 		  	$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			

 		  	if ($casa == 'AGS') {
	 			$data['cortes'] = $this->solicitudes_model->cortes_todo($from,$to,$casa);
 		  	}else{
	 			$data['cortes'] = $this->solicitudes_model->cortes($from,$to,$casa);
 		  	}

			$this->load->view('exportar_cortes',$data);

		} else { die("You do not have permissions to read this resource"); }
	}


	public function filtropor($status_id)
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('secciones_model');

 		  	$config["base_url"] = base_url() . "cortes/index";
	        $config["total_rows"] = $this->solicitudes_model->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['results'] = $this->solicitudes_model->fetch_rows($config["per_page"], $page);
	        $data['links'] = $this->pagination->create_links();

 		  	$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			

 		  	// Variables para el link de exportar_corte
 		  	$data['status_id'] = $status_id;
 		  	//$data['status'] = $this->input->post('status');
 		  	
	 			$data['cortes'] = $this->solicitudes_model->cortes_todo_filtro($status_id);
	 			$i = '0';
	 			foreach ($data['cortes'] as $value) {
	 				$i += 1 ;
	 				$data['total_cortes'] =  $i;
	 				$data['total_rows'] = $this->solicitudes_model->record_count();
	 			}

			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('cortes_filtro_view',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}

	public function exportar_corte_porfiltro($status_id)
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('secciones_model');
 		  	$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			

	 			$data['cortes'] = $this->solicitudes_model->cortes_todo_filtro($status_id);
	 			$i = '0';
	 			foreach ($data['cortes'] as $value) {
	 				$i += 1 ;
	 				$data['total_cortes'] =  $i;
	 				$data['total_rows'] = $this->solicitudes_model->record_count();
	 			}

			$this->load->view('exportar_corte_porfiltro',$data);

		} else { die("You do not have permissions to read this resource"); }
	}



}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */