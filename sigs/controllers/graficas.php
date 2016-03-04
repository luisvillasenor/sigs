<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Graficas extends CI_Controller {

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
 		  	$this->load->model('status_model');
 		  	$this->load->model('dependencias_model');
 		  	//$data['grafica_seccion'] = $this->solicitudes_model->grafica_seccion();
 		  	//$data['grafica_clasificados'] = $this->solicitudes_model->grafica_clasificados();
 		  	//$data['grafica_canalizados'] = $this->solicitudes_model->grafica_canalizados();
 		  	$data['grafica_status'] = $this->solicitudes_model->grafica_status();
 		  	$data['get_all_status'] = $this->status_model->get_all_status();
 		  	$data['get_all_deps'] = $this->dependencias_model->get_all_deps();			
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			#var_dump($data['grafica_status']); die();
			$this->load->view('graficas_view',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}			
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */