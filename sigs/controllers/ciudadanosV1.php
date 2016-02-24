<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ciudadanos extends CI_Controller {

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

		if ($acceso == true  ) {
			if (!empty($resource)) {
			
	 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
	 		  	// Carga componentes permitidos
	 		  	$this->load->model('ciudadanos_model');
	 		  	$this->load->model('secciones_model');

	 		  	$config["base_url"] = base_url() . "ciudadanos/index";
		        $config["total_rows"] = $this->ciudadanos_model->record_count();
		        $config["per_page"] = 10;
		        $config["uri_segment"] = 3;
		 
		        $this->pagination->initialize($config);
		 
		        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		        $data['results'] = $this->ciudadanos_model->fetch_rows($config["per_page"], $page);
		        $data['links'] = $this->pagination->create_links();

				$data['get_all_secciones'] = $this->secciones_model->get_for_select();
				//$data['get_all'] = $this->ciudadanos_model->get_all();
				$this->load->view('header');
				$this->load->view('navbar-default',$data);
				$this->load->view('welcome_message_ciudadanos',$data);
				$this->load->view('footer');

			}else { die("USTED NO TIRNE PERMISOS PARA ACCESAR, CONTACTE AL ADMINISTRADOR DEL SISTEMA."); }		
		} else { die("USTED NO TIENE PERMISOS PARA VER ESTE MODULO, CONTACTE A LA ADMINISTRADOR DEL SISTEMA"); }
	}

	public function create()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true) {
			if (!empty($resource)) {

			$this->load->model('ciudadanos_model');
			$ciudadano_id = $this->ciudadanos_model->insert_entry();
			//Guarda el registro en la base de datos y devuelve el ID de Ciudadano
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('welcome_message_ciudadanos');
			$this->load->view('footer');		

			}else { die("You do not have permissions to read this resource"); }			
		} else { die("You do not have permissions to read this resource"); }
	    
	    echo "<strong>CREANDO CIUDADANO...</strong>!";
	    redirect(base_url('ciudadanos/index'), 'refresh');
	}

	public function actualizar()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true) {
			if (!empty($resource)) {

			$this->load->model('ciudadanos_model');
			$actualizar = $this->ciudadanos_model->update_entry();
			//Guarda el registro en la base de datos
 		  	$ciudadano = $this->input->post('id');
 		  	$distrito = $this->input->post('distrito');

 		  	$this->load->model('solicitudes_model');
			$actualizar = $this->solicitudes_model->update_solicitudes($ciudadano,$distrito);

		    $this->editar($ciudadano);		

			}else { die("You do not have permissions to read this resource"); }					    
		} else { die("You do not have permissions to read this resource"); }
	    
	    //redirect(base_url('ciudadanos/index'), 'refresh');
	}

	public function editar($id)
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true) {
			if (!empty($resource)) {

			$this->load->model('ciudadanos_model');
			//$agregar = $this->ciudadanos_model->insert_entry();
			//Guarda el registro en la base de datos
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
			$this->load->model('secciones_model');
			$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
 		  	$data['get_one_ciudadano'] = $this->ciudadanos_model->get_one_ciudadano($id);
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('edit_ciudadanos',$data);
			$this->load->view('footer');		

			}else { die("You do not have permissions to read this resource"); }					    
		} else { die("You do not have permissions to read this resource"); }
	}

	public function buscar()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true) {
			if (!empty($resource)) {
				
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos		
			$this->load->model('ciudadanos_model');
			$this->load->model('secciones_model');
			
			$data['get_for_select'] = $this->secciones_model->get_for_select();
			$data['get_all_secciones'] = $this->secciones_model->get_all_secciones();
			$nombreCompleto = $this->input->post('nombreCompleto');
			$data['get_one'] = $this->ciudadanos_model->get_one($nombreCompleto);
			//Obtiene el registro en la base de datos
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('ciudadano_view');
			$this->load->view('footer');		

			}else { die("You do not have permissions to read this resource"); }
		} else { die("You do not have permissions to read this resource"); }
	}


}
 
/* End of file solicitud.php */
/* Location: ./application/controllers/solicitud.php */