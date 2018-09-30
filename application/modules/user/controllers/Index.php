<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

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
		$this->load->view('template/header');
		$this->load->view('content/home');
		$this->load->view('template/footer');
	}

	/**
	* Registro de usuarios sólo con fin de prueba
	*/
	public function registrarPrueba()
	{
		$this->load->model('UsuarioDAO');
		$this->UsuarioDAO->insertUser("Administrador", "Contenidos", "gb_shop", "admin@hotmail.com", "Activo", 1, "+57 301545485","NA");
	}
	
}