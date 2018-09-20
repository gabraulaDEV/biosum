<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		

		$this->load->model('UsuarioDAO');
	}

	public function index()
	{
		if($this->isSession()){
			$params["active"]="welcome";
			$params["gb_session"]=$this->cargarMisDatos();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/welcome');
		}
		
	}

	private function cargarMisDatos(){
	$gb_data = $this->UsuarioDAO->getById($this->session->userdata('sessionid'));
	return $gb_data;
	}

	private function isSession(){
		$session = false;
		if($this->session->userdata('sessionid')==null){
			$this->load->view('admin/content/login');
		}else{
			$session = true;
		}

		return $session;
	}

}
?>