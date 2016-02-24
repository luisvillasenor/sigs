<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
		//$rol = $_SESSION['rol']; $componente = $this->uri->segment(1); $data['componente'] = COMPONENTE;
		$recurso = $this->uri->segment(2); // Metodo de la URL

		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
			$data['componentes'] = $this->permisos_model->componentes(ROL);

 		  	$this->load->model('users_model');
			$data['get_all'] = $this->users_model->get_all();
		
			$this->load->view('header');
			$this->load->view('navbar-default',$data);
			$this->load->view('welcome_message_users',$data);
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
			$this->load->model('users_model');
			$agregar = $this->users_model->insert_entry();
			//Guarda el registro en la base de datos
		    echo "<strong>CREANDO USUARIO...</strong>!";
		    redirect(base_url('users/index'), 'refresh');
		} else { die("You do not have permissions to read this resource"); }
	}

	public function delete($id)
	{

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$data['componente'] = $this->uri->segment(1);
		//Esta variable se pasa para la Vista
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		 if ($acceso != true AND $resource != true) {
		   die("You do not have permissions to read this resource, regrese con el boton BACK");	
		 }

		
		$this->load->model('users_model');
		$borrar = $this->users_model->delete($id);
		//Borra el registro de la base de datos

	    echo "<strong>BORRANDO...</strong>!";
	    redirect(base_url('users/index'), 'refresh');
	}

	public function activar($id){

		if ( isset($_SESSION['username']) == NULL){
			redirect(base_url('admin/logout'), 'refresh');
		}

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$data['componente'] = $this->uri->segment(1);
		//Esta variable se pasa para la Vista
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		 if ($acceso != true AND $resource != true) {
		   die("You do not have permissions to read this resource, regrese con el boton BACK");	
		 }
		
		$this->load->model('users_model');
		$permitir = $this->users_model->activar($id);

		//Actualiza el registro como TRUE
		
		  echo "<strong>ACTUALIZANDO...</strong>!";
		  redirect(base_url('users/index'), 'refresh');
		  		
	}			

	public function desactivar($id){

		if ( isset($_SESSION['username']) == NULL){
			redirect(base_url('admin/logout'), 'refresh');
		}

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$data['componente'] = $this->uri->segment(1);
		//Esta variable se pasa para la Vista
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		 if ($acceso != true AND $resource != true) {
		   die("You do not have permissions to read this resource, regrese con el boton BACK");	
		 }

		
		$this->load->model('users_model');
		$quitar = $this->users_model->desactivar($id);
		//Actualiza el registro como FALSE
		
		  echo "<strong>ACTUALIZANDO...</strong>!";
		  redirect(base_url('users/index'), 'refresh');
		  
	}







}

/* End of file users.php */
/* Location: ./application/controllers/users.php */