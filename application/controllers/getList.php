<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class getList extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('restaurante');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function restaurantes($name)
	{
		$data = $this->restaurante->darListadoRestaurantes();
		header('Content-Type: application/json');
		echo "this a simple value: ".$name;
		echo json_encode($data);
	}
}
