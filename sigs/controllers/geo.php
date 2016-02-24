<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geo extends CI_Controller {

	/**
	 * Controlador de Permisos de Acceso.
	 *
	 * Mapea a la URL:
	 * 		http://example.com/index.php/permisos
	 *	- or -  
	 * 		http://example.com/index.php/permisos/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * Lo métodos de la Clases se entenderan para efecto de permisos como "recursos"
	 * y podran identificarse con el guin¿on bajo para poder mapear la URL
	 *  /index.php/permisos/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	//define('ROLE', '1'); // Como ejemplo, el ROLE = "2" se refiere en la BD al rol de "admin" con todos los privilegios
    //define('RESOURCE', '1');


	/**
	 * Funcion que verifica que componentes tiene acceso el Usuario.
	 * dependiendo del Rol que se le haya asignado al momento de darlo
	 * de alta en el Sistema.
	 * Mapea a la URL:
	 * 		http://example.com/index.php/permisos
	 *	- or -  
	 * 		http://example.com/index.php/permisos/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * Lo métodos de la Clases se entenderan para efecto de permisos como "recursos"
	 * y podran identificarse con el guin¿on bajo para poder mapear la URL
	 *  /index.php/permisos/<method_name>
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
		if ( isset($_SESSION['username']) == NULL){
			redirect(base_url('admin/logout'), 'refresh');
		}

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$data['componente'] = $this->uri->segment(1);
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		if (isset($acceso) AND isset($resource)) {
 		  $data['componentes'] = $this->permisos_model->componentes($rol);
		  $data['get_all'] = $this->permisos_model->get_all();
		echo "Como <strong>$rol</strong>!";
		echo "<br>";
		echo $this->uri->segment(1);
		$this->load->view('welcome_message_permisos',$data);
				
		} else { die("You do not have permissions to read this resource"); }

		 
	}

	public function nuevo()
	{
		if ( isset($_SESSION['username']) == NULL){
		redirect(base_url('admin/logout'), 'refresh');
		}

		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$recurso = $this->uri->segment(2);
		// obtiene el controler del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		if (isset($acceso) AND isset($resource)) {
		  $data['recursos'] = $this->permisos_model->recursos($rol,$componente);
			$this->load->view('');
					
		} else { die("You do not have permissions to read this resource"); }
		
			 
	}

	public function create()
	{
		// El $rol, $componente llegaran mediante la SESSION del Usuario.
		// Para fines de desarrollo se definen a continuacion:
		if ( isset($_SESSION['username']) == NULL){
		//redirect('admin/login');
		redirect(base_url('admin/logout'), 'refresh');
		//$this->load->view('login_view');
		}
		// El $rol, $componente llegaran mediante la SESSION del Usuario.
		// Para fines de desarrollo se definen a continuacion:
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$recurso = $this->uri->segment(2);
		// obtiene el controler del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		 if (isset($acceso) AND isset($resource)) {
			$agregar = $this->permisos_model->insert_entry();
			//Guarda el registro en la base de datos
		
	    echo "<strong>CREANDO PERMISO...</strong>!";
	    redirect(base_url('permisos/index'), 'refresh');

		 } else { die("You do not have permissions to read this resource"); }
	    
	}

	public function delete($id)
	{
		// El $rol, $componente llegaran mediante la SESSION del Usuario.
		// Para fines de desarrollo se definen a continuacion:
		if ( isset($_SESSION['username']) == NULL){
		//redirect('admin/login');
		redirect(base_url('admin/logout'), 'refresh');
		//$this->load->view('login_view');
		}
		// El $rol, $componente llegaran mediante la SESSION del Usuario.
		// Para fines de desarrollo se definen a continuacion:
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$recurso = $this->uri->segment(2);
		// obtiene el controler del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		
		 if (isset($acceso) AND isset($resource)) {
			$borrar = $this->permisos_model->delete($id);
			//Borra el registro de la base de datos
		
	    echo "<strong>BORRANDO...</strong>!";
	    redirect(base_url('permisos/index'), 'refresh');

		 } else { die("You do not have permissions to read this resource"); }
		
	}

	public function si_permiso($id){

		if ( isset($_SESSION['username']) == NULL){
		//redirect('admin/login');
		redirect(base_url('admin/logout'), 'refresh');
		//$this->load->view('login_view');
		}
		// El $rol, $componente llegaran mediante la SESSION del Usuario.
		// Para fines de desarrollo se definen a continuacion:
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$recurso = $this->uri->segment(2);
		// obtiene el controler del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
		
		 if (isset($acceso) AND isset($resource)) {

		 	$permitir = $this->permisos_model->permitir($id);

		 //Actualiza el registro como TRUE
		 echo "<strong>ACTUALIZANDO...</strong>!";
		 redirect(base_url('permisos/index'), 'refresh');

		 } else { die("You do not have permissions to read this resource"); }
	}			

	public function no_permiso($id){

		if ( isset($_SESSION['username']) == NULL){
		//redirect('admin/login');
		redirect(base_url('admin/logout'), 'refresh');
		//$this->load->view('login_view');
		}
		// El $rol, $componente llegaran mediante la SESSION del Usuario.
		// Para fines de desarrollo se definen a continuacion:
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);

		$rol = $_SESSION['rol'];
		$componente = $this->uri->segment(1);
		$recurso = $this->uri->segment(2);
		// obtiene el controler del segmento URL

		$this->load->model('permisos_model');
		$acceso = $this->permisos_model->verify_componente($rol,$componente);
		$resource = $this->permisos_model->verify_recursos($rol,$componente,$recurso);
	
		 if (isset($acceso) AND isset($resource)) {
			
			$quitar = $this->permisos_model->quitar($id);
			echo "<strong>ACTUALIZANDO...</strong>!";
			redirect(base_url('permisos/index'), 'refresh');

		 } else { die("You do not have permissions to read this resource"); }
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */