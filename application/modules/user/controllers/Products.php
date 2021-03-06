<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
	    $params['destacados'] = $this->darDestacados();
		$this->load->view('content/products',$params);
		$this->load->view('template/footer');
	}

	/**
	* MÉTODO SOLO POR DEMOSRTACIÓN
	*/
	public function darDestacados(){
		return $this->ProductoDAO->darDestacados();
	}
	
}
?>