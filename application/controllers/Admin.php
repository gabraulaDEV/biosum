<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('content/admin/login');
	}

	public function login()
	{
		/*TODO VALIDAR SESION CON CONSULTA EN DB*/
		$success=true;
		if(!$success)
		{
			$this->load->view('content/admin/login');
		}
		else
		{
			$this->session->set_userdata(array('sessionid'=>1));
			$this->dashboard();
		}
	}

	public function dashboard()
	{
		if($this->session->userdata('sessionid')==null)
		{
			$this->load->view('content/admin/login');
		}
		else
		{
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidenav');
			$this->load->view('content/admin/products');
		}
		
	}
}