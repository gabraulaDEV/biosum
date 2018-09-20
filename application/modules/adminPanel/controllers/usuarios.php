<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ProductoDAO');
		$this->load->model('UsuarioDAO');
		$this->load->model('CategoriaDAO');
		$this->load->model('ColorDAO');
	}

	public function index()
	{
		if($this->isSession()){
			$params["active"]="users";
			//SE ESTABLECE LA CANTIDAD DE USUARIOS A CARGAR EN LA TABLA
			$pA = $this->input->get('page');
			$params["pagina_actual_listado_usuarios"] = $pA ?? 1;
			$rowsPerPage = 10;
			$params["paginacion_listado_usuarios"]= (int)round($this->paginacionCargarUsuarios()/$rowsPerPage);
			$params["listado_usuarios"] = $this->cargarUsuarios((int)$params["pagina_actual_listado_usuarios"],(int)$rowsPerPage);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/users');
			$this->load->view('admin/content/users_clients');
		}
		
	} 

	public function cargarUsuarios($pageCount, $rowsPerPage){
		return $resultado = $this->UsuarioDAO->cargarUsuarios($pageCount, $rowsPerPage);
	}

	public function paginacionCargarUsuarios(){
		return $this->UsuarioDAO->paginacionCargarUsuarios();
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