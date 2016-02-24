<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestiones extends CI_Controller {

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
 		  	$this->load->model('gestiones_model');
			$data['get_all'] = $this->gestiones_model->get_all();		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('welcome_message_gestiones');
			$this->load->view('footer');
		} else { die("You do not have permissions to read this resource"); }
	}

	function nuevo($id)
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
 		  	$this->load->model('gestiones_model');
			$data['get_one_solicitud'] = $this->solicitudes_model->get_one_solicitud($id);
			$data['get_all_gestiones'] = $this->gestiones_model->get_all_gestiones($id);
			//Guarda el registro en la base de datos		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('nuevo_gestion',$data);
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	function editar($id)
	{
		$data['onlyusername']=strstr($_SESSION['username'],'@',true);
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('gestiones_model');
			$data['get_one_gestion'] = $this->gestiones_model->get_one_gestion($id);
			//Guarda el registro en la base de datos		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('editar_gestion');
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }
	}

	function create()
	{
		$data['onlyusername']=strstr($_SESSION['username'],'@',true);
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('gestiones_model');
 		  	$solicitud_id = $this->input->post('solicitud_id');
 		  	$canalizado = $this->input->post('canalizado');
 		  	$gestionCierre = $this->input->post('Cierre');
 		  	
			$agregar = $this->gestiones_model->insert_entry();
			//Guarda el registro en la base de datos
			$this->load->model('solicitudes_model');
			$total_gestiones = $this->gestiones_model->total_gestiones($solicitud_id);

			if ($canalizado == "45" AND $total_gestiones == false AND $gestionCierre == "normal") {
				$status = 5; // es Abierto
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == false AND $gestionCierre == "normal") {
				$status = 1; // es Latente
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == true AND $gestionCierre == "normal") {
				$status = 2; // es Canalizado con Gestiones
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == true AND $gestionCierre == "positivo") {
				$status = 3; // es Atendido Positivo
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == true AND $gestionCierre == "negativo") {
				$status = 7; // es Atendido Negativo
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}elseif ($canalizado != "45" AND $total_gestiones == true AND $gestionCierre == "frc") {
				$status = 8; // es Falta de Respuesta por parte del Ciudadano
				$this->solicitudes_model->update_status($status,$solicitud_id);
			}else{echo "<H3>ESTA OPERACION NO SE PUEDE LLEVAR A CABO, SOLICITE AYUDA AL ADMINISTRADOR.</H3>";}
		
		    $this->nuevo($solicitud_id);		
					
		} else { die("You do not have permissions to read this resource"); }
	    
	}

	function actualizar()
	{
		$data['onlyusername']=strstr($_SESSION['username'],'@',true);
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos
 		  	$this->load->model('gestiones_model');
 		  	$solicitud_id = $this->input->post('solicitud_id');
			$actualizar = $this->gestiones_model->update_entry();
			//Guarda el registro en la base de datos
		
		    $this->nuevo($solicitud_id);		
					
		} else { die("You do not have permissions to read this resource"); }
	    
	    
	}
	
	function buscar()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos		
			$this->load->model('gestiones_model');
			$folio = $this->input->post('folio',true);
			$data['get_one'] = $this->gestiones_model->get_one($folio);
			//Obtiene el registro en la base de datos
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('solicitud_view');
			$this->load->view('footer');		
		} else { die("You do not have permissions to read this resource"); }

	}

	function delete($id,$solicitud_id){
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	// Carga componentes permitidos		
			$this->load->model('gestiones_model');
			$borrar = $this->gestiones_model->delete($id);
			//Borra el registro de la base de datos
			echo "<div align='center' class='alert alert-success alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <strong>ELIMINADO!</strong> El registro ".$id." se eliminó con éxito..
</div>";
		    $this->nuevo($solicitud_id);
		} else { die("You do not have permissions to read this resource"); }
	}


}

/* End of file solicitud.php */
/* Location: ./application/controllers/solicitud.php */