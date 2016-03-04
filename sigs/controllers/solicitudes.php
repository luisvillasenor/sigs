<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

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
 		  	$this->load->model('ciudadanos_model'); 		  	

 		  	$config["base_url"] = base_url() . "solicitudes/index";
	        $config["total_rows"] = $this->solicitudes_model->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data['results'] = $this->solicitudes_model->get_all($config["per_page"], $page);
	        $data['links'] = $this->pagination->create_links();
	        $data['total_rows'] = $this->solicitudes_model->record_count();

			$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			
			//$data['get_all'] = $this->solicitudes_model->get_all();		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('welcome_message_solicitudes');
			$this->load->view('footer');
		} else { die("You do not have permissions to read this resource"); }
	}

	function nuevo($id_cuidadano)
	{
		$data['onlyusername']=strstr($_SESSION['username'],'@',true);
		$data['ciudadano_id']=$id_cuidadano;		
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('ciudadanos_model');
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			
			$data['get_one_ciudadano'] = $this->ciudadanos_model->get_one_ciudadano($id_cuidadano);
			$data['get_mis_solicitudes'] = $this->solicitudes_model->get_mis_solicitudes($id_cuidadano);
			//Guarda el registro en la base de datos		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('nuevo_solicitud',$data);
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	function editar($id){

		$data['onlyusername']=strstr($_SESSION['username'],'@',true);
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('ciudadanos_model');

			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			 		  	
			$data['get_one_solicitud'] = $this->solicitudes_model->get_one_solicitud($id);
			$data['get_one_ciudadano'] = $this->ciudadanos_model->get_one_ciudadano($id);
			//Guarda el registro en la base de datos		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('editar_solicitud',$data);
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	public function create()
	{

		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('solicitudes_model');
 		  	$canalizado = $this->input->post('canalizado');
			$solicitud_id = $this->solicitudes_model->insert_entry();
			//Guarda el registro en la base de datos
			$this->load->model('gestiones_model');
			$total_gestiones = $this->gestiones_model->total_gestiones($solicitud_id);
			if ($canalizado == "45" AND $total_gestiones == false) {
			// Si canalizado Pendiente y No hay gestiones, entonces Abierto
				$status = 5; // es Abierto
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == false) {
			// Si se Canaliza y no hay gestiones, entonces Latente
				// $status = 1; // Latente:  es Canalizado sin Gestiones
				// Fecha de modificacion a estas lineas: jueves 28 de marzo 2015
				// Se cambia status = 1 a status = 5 para que las gestiones nuevas
				// a partir de esta fecha las solicitudes latentes ya no existan
				// y todo se maneje como Abierto.
				$status = 5; // Status Abierto
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == true) {
				$status = 2; // Status es Canalizado por tener Gestiones
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}else{
				echo "<H3>ESTA OPERACION NO SE PUEDE LLEVAR A CABO, SOLICITE AYUDA AL ADMINISTRADOR.</H3>";
			}
			$ciudadano = $this->input->post('ciudadano_id');
		    $this->nuevo($ciudadano);					
		} else { die("You do not have permissions to read this resource"); }
	}

	public function actualizar()
	{
		$data['onlyusername']=strstr($_SESSION['username'],'@',true);
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('solicitudes_model');
			$actualizar = $this->solicitudes_model->update_entry();
			//Guarda el registro en la base de datos
			$ciudadano = $this->input->post('ciudadano_id');
			$canalizado = $this->input->post('canalizado');
			$solicitud_id = $this->input->post('id');
			$this->load->model('gestiones_model');
			$total_gestiones = $this->gestiones_model->total_gestiones($solicitud_id);
			if ($canalizado == "45" AND $total_gestiones == false) {
			// Si canalizado Pendiente y No hay gestiones, entonces Abierto
				$status = 5; // es Abierto
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == false) {
			// Si se Canaliza y no hay gestiones, entonces Latente
				$status = 5; // es Canalizado sin Gestiones
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == true) {
				$status = 2; // es Canalizado con Gestiones
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}else{echo "<H3>ESTA OPERACION NO SE PUEDE LLEVAR A CABO, SOLICITE AYUDA AL ADMINISTRADOR.</H3>";}
		    $this->nuevo($ciudadano);		
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
			$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('ciudadanos_model');
			$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			
			$folio = $this->input->post('folio',true);
			$data['get_one'] = $this->solicitudes_model->get_one($folio);
			//Obtiene el registro en la base de datos
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('solicitud_view');
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	public function buscar_id()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos		
			$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('ciudadanos_model');
			$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();			
			$id = $this->input->post('id',true);
			$data['get_one'] = $this->solicitudes_model->get_one_id($id);
			//Obtiene el registro en la base de datos
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('solicitud_view');
			$this->load->view('footer');		
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
 		  	// Carga componentes permitidos		
			$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('ciudadanos_model');

 		  	$config["base_url"] = base_url() . "solicitudes/filtropor/".$status_id;
	        $config["total_rows"] = $this->solicitudes_model->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 4;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        //$data['results'] = $this->solicitudes_model->fetch_rows($config["per_page"], $page);
	        $data['links'] = $this->pagination->create_links();

			$data['get_all_ciudadanos'] = $this->ciudadanos_model->get_all();
			$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
			$data['get_all_status'] = $this->status_model->get_all_status();
	        
			//$id = $this->input->post('id',true);
			//$data['get_one'] = $this->solicitudes_model->get_one_id($id);
			//Obtiene el registro en la base de datos
			$data['results'] = $this->solicitudes_model->get_all_status($config["per_page"], $page,$status_id);

			$data['total_rows'] = count($data['results'],1);
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('solicitudes_por_status',$data);
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}


}

/* End of file solicitud.php */
/* Location: ./application/controllers/solicitud.php */