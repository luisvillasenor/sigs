<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	}
	
	public function index(){
		
		//echo sha1('BTR%08nt'); die();// Esta funcion te regresa el texto encriptado. Se usa tener un password encriptado*/
		
		if ( isset($_SESSION['username']) == NULL){
			$this->load->view('header');
			$this->load->view('welcome_view');
			$this->load->view('footer');
		}

		//$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Dirección de Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');

		if ( $this->form_validation->run() !== false ) {
			// Esta validacion paso OK. Obtenido de la BD

			$this->load->model('admin_model');
			// Security Layer
			// Filtering POST DATA
			$email_address = $this->input->post('email_address');
			$clean_email_address = $this->security->xss_clean($email_address);
			
			$password = $this->input->post('password');
			$clean_password = $this->security->xss_clean($password);	

			$res = $this->admin_model->verify_user($clean_email_address,$clean_password);
			// Verifica Usuario - Regresa TRUE o FALSE
			$isActive = $this->admin_model->verify_active($clean_email_address);
			// Verifica si el Usuario esta Activo - Regresa TRUE o FALSE
			if (($res == TRUE) AND ($isActive == TRUE)){
			// Si hay una cuenta registrada en el sistema y Activa
				
				$rol2['verify_rol2'] = $this->admin_model->verify_rol($clean_email_address,$clean_password);
				foreach ($rol2['verify_rol2'] as $key2 => $value2) {
					# code...
					if ($key2 == 'geo') {
						# code...
						$geo = $value2;
					}
				} 

				// Actualiza fecha de ultimo acceso
				$this->admin_model->up_date($clean_email_address);

				$rol3['verify_rol3'] = $this->admin_model->verify_rol($clean_email_address,$clean_password);
				

				foreach ($rol3['verify_rol3'] as $key3 => $value3) {

					if ($key3 == 'rol') {
						# code...
						$clean_rol = $value3;
					}
				}	
				
				switch ($clean_rol) {
					case 'Candidato':
						$_SESSION['username'] = $clean_email_address;
						$_SESSION['rol'] = 'Candidato';
						$_SESSION['geo'] = $geo;
						$_SESSION['status'] = $isActive;
						redirect(base_url('dashboard/'));
						break;
					case 'Dirigencia':
						$_SESSION['username'] = $clean_email_address;
						$_SESSION['rol'] = 'Dirigencia';
						$_SESSION['geo'] = $geo;
						$_SESSION['status'] = $isActive;
						redirect(base_url('dashboard/'));
						break;
					case 'Superadmin':
						$_SESSION['username'] = $clean_email_address;
						$_SESSION['rol'] = 'Superadmin';
						$_SESSION['geo'] = $geo;
						$_SESSION['status'] = $isActive;
						redirect(base_url('home/'));
						break;
					case 'Administrador':
						$_SESSION['username'] = $clean_email_address;
						$_SESSION['rol'] = 'Administrador';
						$_SESSION['geo'] = $geo;
						$_SESSION['status'] = $isActive;
						redirect(base_url('home/'));
						break;
					case 'Capturista':
						$_SESSION['username'] = $clean_email_address;
						$_SESSION['rol'] = 'Capturista';
						$_SESSION['geo'] = $geo;
						$_SESSION['status'] = $isActive;
						redirect(base_url('home/'));
						break;
					case 'Supervision':
						$_SESSION['username'] = $clean_email_address;
						$_SESSION['rol'] = 'Supervision';
						$_SESSION['geo'] = $geo;
						$_SESSION['status'] = $isActive;
						redirect(base_url('home/'));
						break;
					default:
						echo '<div class="alert alert-block alert-error span10">';
						echo '<button type="button" class="close" data-dismiss="alert">x</button>';
						echo '<h4 class="alert-heading">Ups ! Parece ser que Usted no es Miembro de este Sitio !</h4>';
						echo '<p>';
						echo 'Por favor solicite ayuda al administrador del sitio';
						echo '</p>';
						echo '<p>';
						echo '<a class="btn btn-danger" href="'.base_url('admin/logout');'">Cerrar</a>';
						echo '</p>';
						echo '</div>';
						//$this->logout();
						break;
				}
				
			} else {
				echo '<div class="alert alert-block alert-error span10">';
				echo '<h4 class="alert-heading">Ups ! Parece ser que Usted no es Miembro de este Sitio ó alguno de sus Datos de Inicio de Sesion al Sistema no es Incorrecto. !</h4>';
				echo '<p>';
				echo 'Por favor solicite ayuda al administrador del sitio';
				echo '</p>';
				echo '</div>';
				redirect(base_url('admin/logout'),'refresh');
				}
		}
		redirect(base_url('admin/logout'));
	}

	public function logout(){
		if ( isset($_SESSION['username'])){
			$_SESSION['username'] = NULL;
			session_destroy();
		}
		$this->load->view('header');
		$this->load->view('welcome_view');
		$this->load->view('footer');		
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */