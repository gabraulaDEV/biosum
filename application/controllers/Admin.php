<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/content/login');
	}

	public function login()
	{
		if($this->input->post('itUser')==null || $this->input->post('itPass')==null)
		{
			/*Mensaje de error*/
			$params['error'] = "Los campos se encuentran vacíos";
			$this->load->view('admin/content/login',$params);			
		}
		else
		{
			/*TODO VALIDAR SESION CON CONSULTA EN DB*/
			/*$success=true;
			if(!$success)
			{
				$this->load->view('admin/content/login');
			}
			else
			{
				$this->session->set_userdata(array('sessionid'=>1));
				$this->products();
				*/

		$this->load->model('UsuarioDAO');
		$query = $this->UsuarioDAO->selectAdmin($this->input->post('itUser'),$this->input->post('itPass'));
		if($query != null)
		{
			$this->session->set_userdata(array('sessionid'=> (int)$query));
			$this->products();
		}else{
			/*Mensaje de error*/
			$params['error'] = "Datos inválidos";
			$this->load->view('admin/content/login',$params);
		}
	    }
	}

	public function logout()
	{
		/*Vaciar sessionid*/
		$this->session->unset_userdata('sessionid');
		/*Redireccionar a login*/
		$this->load->view('admin/content/login');
	}

	public function welcome()
	{
			if($this->isSession()){
			$params["active"]="welcome";
			$params["gb_session"]=$this->cargarMisDatos();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/welcome');
		}
		
	}

	public function products()
	{
		if($this->isSession()){
			$params["active"]="prod";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/products');
		}
		
	}

	public function offers()
	{
		if($this->isSession()){
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers');
		}
		
	} 

	public function sales()
	{
		if($this->isSession()){
			$params["active"]="sales";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/sales');
		}
		
	} 

	public function users()
	{
			if($this->isSession()){
			$params["active"]="users";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/users');
		}
		
	} 

	public function config()
	{
			if($this->isSession()){
			$params["active"]="config";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/configs');
		}
		
	} 

<<<<<<< HEAD
	private function isSession(){
		$session = false;
		if($this->session->userdata('sessionid')==null){
			$this->load->view('admin/content/login');
		}else{
			$session = true;
		}

		return $session;
	}
	
	private function cargarMisDatos(){
		$this->load->model('UsuarioDAO');
		$gb_data = $this->UsuarioDAO->getById($this->session->userdata('sessionid'));
		return $gb_data;
=======
	/*
	*
	*
	*
	*
	*
	*
	*PRUEBA DE IMPORT PRODUCTS
	*/
	public function loadImport()
	{
		$this->load->view('pruebas/import');
	}

	public function import()
	{
		$this->load->library("excelreader/excel");
		if($_FILES['file']['type']=="application/vnd.ms-excel")
		{
			$this->excel->importProductsXLS($_FILES['file']['tmp_name']);
		}
		else if($_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			$this->excel->importProductsXLSX($_FILES['file']['tmp_name']);
		}
		else
		{
			echo "No es un excel";
		}
		
>>>>>>> 7c33ad0bda2d568822e0c51bf7223d0f58d46364
	}
}