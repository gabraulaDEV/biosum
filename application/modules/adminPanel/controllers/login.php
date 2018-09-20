<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

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
		if($this->input->post('itUser')==null || $this->input->post('itPass')==null)
		{
			/*Mensaje de error*/
			$params['error'] = "Los campos se encuentran vacíos";
			$this->load->view('admin/content/login',$params);			
		}
		else
		{
			
			$query = $this->UsuarioDAO->selectAdmin($this->input->post('itUser'),$this->input->post('itPass'));
			if($query != null)
			{
				$this->session->set_userdata(array('sessionid'=> (int)$query));
			redirect(base_url().index_page()."/adminPanel/home",'refresh');
			//header('Location:'.base_url().index_page().'/admin/admins');
			}else{
				/*Mensaje de error*/
				$params['error'] = "Datos inválidos";
				$this->load->view('admin/content/login',$params);
			}
	    }
	}
}
?>