<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewProduct extends CI_Controller {

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
		$this->load->view('content/viewProduct');
		$this->load->view('template/footer');
	}

	
	
}
?>