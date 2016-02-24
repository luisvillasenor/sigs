<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	// Graficas a nivel Estatal
	public function index()
	{
		$d01 = '01';
		$d02 = '02';
		$d03 = '03';		
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('dependencias_model');

 		  	$TotalSolicitudesPorDependencia =  $this->solicitudes_model->reporte_por();
 		  	if ($TotalSolicitudesPorDependencia !== false) {
 		  		# code...
				$data['get_all_status'] = $this->status_model->get_all_status();
 		  		$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
 		  		$data['TotalSolicitudesPorDependencia']  =  $this->solicitudes_model->reporte_por();
 		  	}

			$this->load->view('header');
			$this->load->view('dashboard_welcome',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}


	public function total_solicitudes()
	{
		$d01 = '01';
		$d02 = '02';
		$d03 = '03';
		$sta2 = 2;// Canalizado
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	
 		  	
 		  	$TotalSolicitudesD01 = $this->solicitudes_model->solicitudes_distrito($d01);
 		  	if ($TotalSolicitudesD01 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD01'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD01'] = $TotalSolicitudesD01;
 		  	}
 		  	$TotalSolicitudesD02 = $this->solicitudes_model->solicitudes_distrito($d02);
 		  	if ($TotalSolicitudesD02 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD02'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD02'] = $TotalSolicitudesD02;
 		  	}
 		  	$TotalSolicitudesD03 = $this->solicitudes_model->solicitudes_distrito($d03);
 		  	if ($TotalSolicitudesD03 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD03'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD03'] = $TotalSolicitudesD03;
 		  	} 		  	
 		  	$TotalSolicitudes = $this->solicitudes_model->solicitudes_totales(GEO);
 		  	if ($TotalSolicitudes == false) {
 		  		# code...
 		  		$data['TotalSolicitudes'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudes'] = $TotalSolicitudes;
 		  	}
 		  	$TotalLatentesd01 = $this->solicitudes_model->solicitudes_latentes($d01);
 		  	if ($TotalLatentesd01 == false) {
 		  		# code...
 		  		$data['TotalLatentesd01'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd01'] = $TotalLatentesd01;
 		  	}
 		  	$TotalCanalizadod01 = $this->solicitudes_model->solicitudes_canalizado($d01);
 		  	if ($TotalCanalizadod01 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod01'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod01'] = $TotalCanalizadod01;
 		  	}
 		  	$TotalAbiertod01 = $this->solicitudes_model->solicitudes_abierto($d01);
 		  	if ($TotalAbiertod01 == false) {
 		  		# code...
 		  		$data['TotalAbiertod01'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod01'] = $TotalAbiertod01;
 		  	}
 		  	$TotalAtendidoPositivod01 = $this->solicitudes_model->solicitudes_atendido_positivo($d01);
 		  	if ($TotalAtendidoPositivod01 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod01'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod01'] = $TotalAtendidoPositivod01;
 		  	}
 		  	$TotalPendiented01 = $this->solicitudes_model->solicitudes_pendiente($d01);
 		  	if ($TotalPendiented01 == false) {
 		  		# code...
 		  		$data['TotalPendiented01'] = 0;
 		  	}else{
 		  		$data['TotalPendiented01'] = $TotalPendiented01;
 		  	}
 		  	$TotalAtendidoNegativod01 = $this->solicitudes_model->solicitudes_atendido_negativo($d01);
 		  	if ($TotalAtendidoNegativod01 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod01'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod01'] = $TotalAtendidoNegativod01;
 		  	}
 		  	//////////////////
 		  	$TotalLatentesd02 = $this->solicitudes_model->solicitudes_latentes($d02);
 		  	if ($TotalLatentesd02 == false) {
 		  		# code...
 		  		$data['TotalLatentesd02'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd02'] = $TotalLatentesd02;
 		  	}
 		  	$TotalCanalizadod02 = $this->solicitudes_model->solicitudes_canalizado($d02);
 		  	if ($TotalCanalizadod02 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod02'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod02'] = $TotalCanalizadod02;
 		  	}
 		  	$TotalAbiertod02 = $this->solicitudes_model->solicitudes_abierto($d02);
 		  	if ($TotalAbiertod02 == false) {
 		  		# code...
 		  		$data['TotalAbiertod02'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod02'] = $TotalAbiertod02;
 		  	}
 		  	$TotalAtendidoPositivod02 = $this->solicitudes_model->solicitudes_atendido_positivo($d02);
 		  	if ($TotalAtendidoPositivod02 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod02'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod02'] = $TotalAtendidoPositivod02;
 		  	}
 		  	$TotalPendiented02 = $this->solicitudes_model->solicitudes_pendiente($d02);
 		  	if ($TotalPendiented02 == false) {
 		  		# code...
 		  		$data['TotalPendiented02'] = 0;
 		  	}else{
 		  		$data['TotalPendiented02'] = $TotalPendiented02;
 		  	}
 		  	$TotalAtendidoNegativod02 = $this->solicitudes_model->solicitudes_atendido_negativo($d02);
 		  	if ($TotalAtendidoNegativod02 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod02'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod02'] = $TotalAtendidoNegativod02;
 		  	}
 		  	/////////
 		  	$TotalLatentesd03 = $this->solicitudes_model->solicitudes_latentes($d03);
 		  	if ($TotalLatentesd03 == false) {
 		  		# code...
 		  		$data['TotalLatentesd03'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd03'] = $TotalLatentesd03;
 		  	}
 		  	$TotalCanalizadod03 = $this->solicitudes_model->solicitudes_canalizado($d03);
 		  	if ($TotalCanalizadod03 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod03'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod03'] = $TotalCanalizadod03;
 		  	}
 		  	$TotalAbiertod03 = $this->solicitudes_model->solicitudes_abierto($d03);
 		  	if ($TotalAbiertod03 == false) {
 		  		# code...
 		  		$data['TotalAbiertod03'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod03'] = $TotalAbiertod03;
 		  	}
 		  	$TotalAtendidoPositivod03 = $this->solicitudes_model->solicitudes_atendido_positivo($d03);
 		  	if ($TotalAtendidoPositivod03 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod03'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod03'] = $TotalAtendidoPositivod03;
 		  	}
 		  	$TotalPendiented03 = $this->solicitudes_model->solicitudes_pendiente($d03);
 		  	if ($TotalPendiented03 == false) {
 		  		# code...
 		  		$data['TotalPendiented03'] = 0;
 		  	}else{
 		  		$data['TotalPendiented03'] = $TotalPendiented03;
 		  	}
 		  	$TotalAtendidoNegativod03 = $this->solicitudes_model->solicitudes_atendido_negativo($d03);
 		  	if ($TotalAtendidoNegativod03 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod03'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod03'] = $TotalAtendidoNegativod03;
 		  	}
 		  	$this->load->view('header');
			$this->load->view('dashboard_view',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}

	public function por_distrito()
	{
		$d01 = '01';
		$d02 = '02';
		$d03 = '03';
		$sta2 = 2;// Canalizado
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('dependencias_model');
 		  	$data['grafica_seccion'] = $this->solicitudes_model->grafica_seccion();
 		  	$data['get_dependencias'] = $this->dependencias_model->get_dependencias();
 		  	$data['grafica_canalizados_canalizado'] = $this->solicitudes_model->grafica_canalizados($sta2);
 		  	
 		  	$data['grafica_status'] = $this->solicitudes_model->grafica_status();
 		  	$TotalSolicitudesD01 = $this->solicitudes_model->solicitudes_distrito($d01);
 		  	if ($TotalSolicitudesD01 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD01'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD01'] = $TotalSolicitudesD01;
 		  	}
 		  	$TotalSolicitudesD02 = $this->solicitudes_model->solicitudes_distrito($d02);
 		  	if ($TotalSolicitudesD02 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD02'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD02'] = $TotalSolicitudesD02;
 		  	}
 		  	$TotalSolicitudesD03 = $this->solicitudes_model->solicitudes_distrito($d03);
 		  	if ($TotalSolicitudesD03 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD03'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD03'] = $TotalSolicitudesD03;
 		  	} 		  	
 		  	$TotalSolicitudes = $this->solicitudes_model->solicitudes_totales(GEO);
 		  	if ($TotalSolicitudes == false) {
 		  		# code...
 		  		$data['TotalSolicitudes'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudes'] = $TotalSolicitudes;
 		  	}
 		  	$TotalLatentesd01 = $this->solicitudes_model->solicitudes_latentes($d01);
 		  	if ($TotalLatentesd01 == false) {
 		  		# code...
 		  		$data['TotalLatentesd01'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd01'] = $TotalLatentesd01;
 		  	}
 		  	$TotalCanalizadod01 = $this->solicitudes_model->solicitudes_canalizado($d01);
 		  	if ($TotalCanalizadod01 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod01'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod01'] = $TotalCanalizadod01;
 		  	}
 		  	$TotalAbiertod01 = $this->solicitudes_model->solicitudes_abierto($d01);
 		  	if ($TotalAbiertod01 == false) {
 		  		# code...
 		  		$data['TotalAbiertod01'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod01'] = $TotalAbiertod01;
 		  	}
 		  	$TotalAtendidoPositivod01 = $this->solicitudes_model->solicitudes_atendido_positivo($d01);
 		  	if ($TotalAtendidoPositivod01 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod01'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod01'] = $TotalAtendidoPositivod01;
 		  	}
 		  	$TotalPendiented01 = $this->solicitudes_model->solicitudes_pendiente($d01);
 		  	if ($TotalPendiented01 == false) {
 		  		# code...
 		  		$data['TotalPendiented01'] = 0;
 		  	}else{
 		  		$data['TotalPendiented01'] = $TotalPendiented01;
 		  	}
 		  	$TotalAtendidoNegativod01 = $this->solicitudes_model->solicitudes_atendido_negativo($d01);
 		  	if ($TotalAtendidoNegativod01 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod01'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod01'] = $TotalAtendidoNegativod01;
 		  	}
 		  	//////////////////
 		  	$TotalLatentesd02 = $this->solicitudes_model->solicitudes_latentes($d02);
 		  	if ($TotalLatentesd02 == false) {
 		  		# code...
 		  		$data['TotalLatentesd02'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd02'] = $TotalLatentesd02;
 		  	}
 		  	$TotalCanalizadod02 = $this->solicitudes_model->solicitudes_canalizado($d02);
 		  	if ($TotalCanalizadod02 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod02'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod02'] = $TotalCanalizadod02;
 		  	}
 		  	$TotalAbiertod02 = $this->solicitudes_model->solicitudes_abierto($d02);
 		  	if ($TotalAbiertod02 == false) {
 		  		# code...
 		  		$data['TotalAbiertod02'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod02'] = $TotalAbiertod02;
 		  	}
 		  	$TotalAtendidoPositivod02 = $this->solicitudes_model->solicitudes_atendido_positivo($d02);
 		  	if ($TotalAtendidoPositivod02 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod02'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod02'] = $TotalAtendidoPositivod02;
 		  	}
 		  	$TotalPendiented02 = $this->solicitudes_model->solicitudes_pendiente($d02);
 		  	if ($TotalPendiented02 == false) {
 		  		# code...
 		  		$data['TotalPendiented02'] = 0;
 		  	}else{
 		  		$data['TotalPendiented02'] = $TotalPendiented02;
 		  	}
 		  	$TotalAtendidoNegativod02 = $this->solicitudes_model->solicitudes_atendido_negativo($d02);
 		  	if ($TotalAtendidoNegativod02 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod02'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod02'] = $TotalAtendidoNegativod02;
 		  	}
 		  	/////////
 		  	$TotalLatentesd03 = $this->solicitudes_model->solicitudes_latentes($d03);
 		  	if ($TotalLatentesd03 == false) {
 		  		# code...
 		  		$data['TotalLatentesd03'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd03'] = $TotalLatentesd03;
 		  	}
 		  	$TotalCanalizadod03 = $this->solicitudes_model->solicitudes_canalizado($d03);
 		  	if ($TotalCanalizadod03 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod03'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod03'] = $TotalCanalizadod03;
 		  	}
 		  	$TotalAbiertod03 = $this->solicitudes_model->solicitudes_abierto($d03);
 		  	if ($TotalAbiertod03 == false) {
 		  		# code...
 		  		$data['TotalAbiertod03'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod03'] = $TotalAbiertod03;
 		  	}
 		  	$TotalAtendidoPositivod03 = $this->solicitudes_model->solicitudes_atendido_positivo($d03);
 		  	if ($TotalAtendidoPositivod03 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod03'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod03'] = $TotalAtendidoPositivod03;
 		  	}
 		  	$TotalPendiented03 = $this->solicitudes_model->solicitudes_pendiente($d03);
 		  	if ($TotalPendiented03 == false) {
 		  		# code...
 		  		$data['TotalPendiented03'] = 0;
 		  	}else{
 		  		$data['TotalPendiented03'] = $TotalPendiented03;
 		  	}
 		  	$TotalAtendidoNegativod03 = $this->solicitudes_model->solicitudes_atendido_negativo($d03);
 		  	if ($TotalAtendidoNegativod03 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod03'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod03'] = $TotalAtendidoNegativod03;
 		  	}
 		  	/////////////// 		  	 		  	
 		  	$data['get_all_status'] = $this->status_model->get_all_status();
 		  	$data['get_dependencias'] = $this->dependencias_model->get_dependencias();					
			$this->load->view('header');
			$this->load->view('dashboard_por_distrito',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}

	public function por_status()
	{
		$d01 = '01';
		$d02 = '02';
		$d03 = '03';
		
		$sta1 = 1;// Latente
		$sta2 = 2;// Canalizado
		$sta3 = 3;// Atendido Positivo
		$sta5 = 5;// Abierto
		$sta6 = 6;// Pendiente
		$sta7 = 7;// Atendido Negativo
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('dependencias_model');
 		  	$this->load->model('status_model');
 		  	$data['get_all_status'] = $this->status_model->get_all_status();
 		  	$data['get_dependencias'] = $this->dependencias_model->get_dependencias();
 		  	$data['grafica_canalizados_latente'] = $this->solicitudes_model->grafica_canalizados($sta1);
 		  	$data['grafica_canalizados_canalizado'] = $this->solicitudes_model->grafica_canalizados($sta2);
 		  	$data['grafica_canalizados_atendido_pos'] = $this->solicitudes_model->grafica_canalizados($sta3);
 		  	$data['grafica_canalizados_abiertas'] = $this->solicitudes_model->grafica_canalizados($sta5);
 		  	$data['grafica_canalizados_pendiente'] = $this->solicitudes_model->grafica_canalizados($sta6);
 		  	$data['grafica_canalizados_atendido_neg'] = $this->solicitudes_model->grafica_canalizados($sta7);
 		  	
 		  	$TotalSolicitudesD01 = $this->solicitudes_model->solicitudes_distrito($d01);
 		  	if ($TotalSolicitudesD01 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD01'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD01'] = $TotalSolicitudesD01;
 		  	}
 		  	$TotalSolicitudesD02 = $this->solicitudes_model->solicitudes_distrito($d02);
 		  	if ($TotalSolicitudesD02 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD02'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD02'] = $TotalSolicitudesD02;
 		  	}
 		  	$TotalSolicitudesD03 = $this->solicitudes_model->solicitudes_distrito($d03);
 		  	if ($TotalSolicitudesD03 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD03'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD03'] = $TotalSolicitudesD03;
 		  	} 		  	
 		  	$TotalSolicitudes = $this->solicitudes_model->solicitudes_totales(GEO);
 		  	if ($TotalSolicitudes == false) {
 		  		# code...
 		  		$data['TotalSolicitudes'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudes'] = $TotalSolicitudes;
 		  	}
 		  	$TotalLatentesd01 = $this->solicitudes_model->solicitudes_latentes($d01);
 		  	if ($TotalLatentesd01 == false) {
 		  		# code...
 		  		$data['TotalLatentesd01'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd01'] = $TotalLatentesd01;
 		  	}
 		  	$TotalCanalizadod01 = $this->solicitudes_model->solicitudes_canalizado($d01);
 		  	if ($TotalCanalizadod01 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod01'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod01'] = $TotalCanalizadod01;
 		  	}
 		  	$TotalAbiertod01 = $this->solicitudes_model->solicitudes_abierto($d01);
 		  	if ($TotalAbiertod01 == false) {
 		  		# code...
 		  		$data['TotalAbiertod01'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod01'] = $TotalAbiertod01;
 		  	}
 		  	$TotalAtendidoPositivod01 = $this->solicitudes_model->solicitudes_atendido_positivo($d01);
 		  	if ($TotalAtendidoPositivod01 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod01'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod01'] = $TotalAtendidoPositivod01;
 		  	}
 		  	$TotalPendiented01 = $this->solicitudes_model->solicitudes_pendiente($d01);
 		  	if ($TotalPendiented01 == false) {
 		  		# code...
 		  		$data['TotalPendiented01'] = 0;
 		  	}else{
 		  		$data['TotalPendiented01'] = $TotalPendiented01;
 		  	}
 		  	$TotalAtendidoNegativod01 = $this->solicitudes_model->solicitudes_atendido_negativo($d01);
 		  	if ($TotalAtendidoNegativod01 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod01'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod01'] = $TotalAtendidoNegativod01;
 		  	}
 		  	//////////////////
 		  	$TotalLatentesd02 = $this->solicitudes_model->solicitudes_latentes($d02);
 		  	if ($TotalLatentesd02 == false) {
 		  		# code...
 		  		$data['TotalLatentesd02'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd02'] = $TotalLatentesd02;
 		  	}
 		  	$TotalCanalizadod02 = $this->solicitudes_model->solicitudes_canalizado($d02);
 		  	if ($TotalCanalizadod02 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod02'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod02'] = $TotalCanalizadod02;
 		  	}
 		  	$TotalAbiertod02 = $this->solicitudes_model->solicitudes_abierto($d02);
 		  	if ($TotalAbiertod02 == false) {
 		  		# code...
 		  		$data['TotalAbiertod02'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod02'] = $TotalAbiertod02;
 		  	}
 		  	$TotalAtendidoPositivod02 = $this->solicitudes_model->solicitudes_atendido_positivo($d02);
 		  	if ($TotalAtendidoPositivod02 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod02'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod02'] = $TotalAtendidoPositivod02;
 		  	}
 		  	$TotalPendiented02 = $this->solicitudes_model->solicitudes_pendiente($d02);
 		  	if ($TotalPendiented02 == false) {
 		  		# code...
 		  		$data['TotalPendiented02'] = 0;
 		  	}else{
 		  		$data['TotalPendiented02'] = $TotalPendiented02;
 		  	}
 		  	$TotalAtendidoNegativod02 = $this->solicitudes_model->solicitudes_atendido_negativo($d02);
 		  	if ($TotalAtendidoNegativod02 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod02'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod02'] = $TotalAtendidoNegativod02;
 		  	}
 		  	/////////
 		  	$TotalLatentesd03 = $this->solicitudes_model->solicitudes_latentes($d03);
 		  	if ($TotalLatentesd03 == false) {
 		  		# code...
 		  		$data['TotalLatentesd03'] = 0;
 		  	}else{
 		  		$data['TotalLatentesd03'] = $TotalLatentesd03;
 		  	}
 		  	$TotalCanalizadod03 = $this->solicitudes_model->solicitudes_canalizado($d03);
 		  	if ($TotalCanalizadod03 == false) {
 		  		# code...
 		  		$data['TotalCanalizadod03'] = 0;
 		  	}else{
 		  		$data['TotalCanalizadod03'] = $TotalCanalizadod03;
 		  	}
 		  	$TotalAbiertod03 = $this->solicitudes_model->solicitudes_abierto($d03);
 		  	if ($TotalAbiertod03 == false) {
 		  		# code...
 		  		$data['TotalAbiertod03'] = 0;
 		  	}else{
 		  		$data['TotalAbiertod03'] = $TotalAbiertod03;
 		  	}
 		  	$TotalAtendidoPositivod03 = $this->solicitudes_model->solicitudes_atendido_positivo($d03);
 		  	if ($TotalAtendidoPositivod03 == false) {
 		  		# code...
 		  		$data['TotalAtendidoPositivod03'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoPositivod03'] = $TotalAtendidoPositivod03;
 		  	}
 		  	$TotalPendiented03 = $this->solicitudes_model->solicitudes_pendiente($d03);
 		  	if ($TotalPendiented03 == false) {
 		  		# code...
 		  		$data['TotalPendiented03'] = 0;
 		  	}else{
 		  		$data['TotalPendiented03'] = $TotalPendiented03;
 		  	}
 		  	$TotalAtendidoNegativod03 = $this->solicitudes_model->solicitudes_atendido_negativo($d03);
 		  	if ($TotalAtendidoNegativod03 == false) {
 		  		# code...
 		  		$data['TotalAtendidoNegativod03'] = 0;
 		  	}else{
 		  		$data['TotalAtendidoNegativod03'] = $TotalAtendidoNegativod03;
 		  	}

 		  	$this->load->view('header');
			$this->load->view('dashboard_por_status',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}

	public function por_dependencia()
	{
		$d01 = '01';
		$d02 = '02';
		$d03 = '03';		
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
 		  	$this->load->model('status_model');
 		  	$this->load->model('dependencias_model');

 		  	$TotalSolicitudesPorDependencia =  $this->solicitudes_model->reporte_por();
 		  	if ($TotalSolicitudesPorDependencia !== false) {
 		  		# code...
				$data['get_all_status'] = $this->status_model->get_all_status();
 		  		$data['get_all_deps'] = $this->dependencias_model->get_all_deps();
 		  		$data['TotalSolicitudesPorDependencia']  =  $this->solicitudes_model->reporte_por();
 		  	}
 		  	$this->load->view('header');
			$this->load->view('dashboard_por_dependencia',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}

	public function top10_dependencia()
	{
		$recurso = $this->uri->segment(2);
		// obtiene el controler y metodo del segmento URL
		$acceso = $this->permisos_model->verify_componente(ROL,COMPONENTE);
		$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
		if ($acceso == true AND $resource == true) {
 		  	$data['componentes'] = $this->permisos_model->componentes(ROL);
 		  	$this->load->model('solicitudes_model');
			$this->load->model('dependencias_model');
 		  	$data['get_dependencias'] = $this->dependencias_model->get_dependencias();
 		  	$data['top10_dependencia'] = $this->solicitudes_model->top10_dependencia();
 		  	$this->load->view('header');
			$this->load->view('dashboard_top10_dependencia',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}
	
	public function status()
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
 		  	$data['grafica_seccion'] = $this->solicitudes_model->grafica_seccion();
 		  	//$data['grafica_clasificados'] = $this->solicitudes_model->grafica_clasificados();
 		  	$data['grafica_canalizados'] = $this->solicitudes_model->grafica_canalizados();
 		  	$data['grafica_status'] = $this->solicitudes_model->grafica_status();
 		  	$TotalSolicitudesD01 = $this->solicitudes_model->solicitudes_distrito($distrito = '01');
 		  	if ($TotalSolicitudesD01 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD01'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD01'] = $TotalSolicitudesD01;
 		  	}
 		  	$TotalSolicitudesD02 = $this->solicitudes_model->solicitudes_distrito($distrito = '02');
 		  	if ($TotalSolicitudesD02 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD02'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD02'] = $TotalSolicitudesD02;
 		  	}
 		  	$TotalSolicitudesD03 = $this->solicitudes_model->solicitudes_distrito($distrito = '03');
 		  	if ($TotalSolicitudesD03 == false) {
 		  		# code...
 		  		$data['TotalSolicitudesD03'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudesD03'] = $TotalSolicitudesD03;
 		  	} 		  	
 		  	$TotalSolicitudes = $this->solicitudes_model->solicitudes_totales(GEO);
 		  	if ($TotalSolicitudes == false) {
 		  		# code...
 		  		$data['TotalSolicitudes'] = 0;
 		  	}else{
 		  		$data['TotalSolicitudes'] = $TotalSolicitudes;
 		  	}

 		  	$data['get_all_status'] = $this->status_model->get_all_status();
 		  	$data['get_all_deps'] = $this->dependencias_model->get_all_deps();					
			$this->load->view('header');
			//$this->load->view('navbar-default');
			$this->load->view('dashboard_status_view',$data);
			$this->load->view('footer');				
		} else { die("You do not have permissions to read this resource"); }
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */