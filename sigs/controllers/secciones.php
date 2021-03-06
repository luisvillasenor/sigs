<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secciones extends CI_Controller {

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
 		  	// Carga componentes permitidos
 		  	$this->load->model('secciones_model');
			$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('welcome_message_secciones',$data);
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	public function buscar()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos		
			$this->load->model('secciones_model');
			$colonia = $this->input->post('colonia');
			$data['get_one'] = $this->secciones_model->get_one($colonia);
			//Obtiene el registro en la base de datos
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('seccion_view',$data);
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	public function actualizar()
	{
 		  	// Carga componentes permitidos		
			$this->load->model('secciones_model');
			$colonia = $this->input->post('colonia');
			$data['get_one'] = $this->secciones_model->get_one($colonia);
			//Obtiene el registro en la base de datos
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('seccion_view',$data);
			$this->load->view('footer');		

	}

	public function show($seccion_id = null)
	{
			$this->load->model('secciones_model');
			$get_distritolocal = $this->secciones_model->get_distritolocal($seccion_id);
			foreach ($get_distritolocal as $disLocal) {
				$distritolocal = $disLocal->distritoNuevo;
				$df = $disLocal->df;
			}
			print $distritolocal;
	}

	public function showlocal($seccion_id = null)
	{
			$this->load->model('secciones_model');
			$get_distritolocal = $this->secciones_model->get_distritolocal($seccion_id);
			foreach ($get_distritolocal as $disLocal) {
				$distritolocal = $disLocal->distritoNuevo;
				$df = $disLocal->df;
			}
			print $df;
	}


}

/* End of file solicitud.php */
/* Location: ./application/controllers/solicitud.php */