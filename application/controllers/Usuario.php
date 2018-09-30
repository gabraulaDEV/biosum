<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
