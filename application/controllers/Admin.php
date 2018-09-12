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
			$params['error']="Campos vacíos";
			$this->load->view('admin/content/login',$params);			
		}
		else
		{
			/*TODO VALIDAR SESION CON CONSULTA EN DB*/
			$success=true;
			if(!$success)
			{
				$this->load->view('admin/content/login');
			}
			else
			{
				$this->session->set_userdata(array('sessionid'=>1));
				$this->products();
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

	public function products()
	{
		if($this->session->userdata('sessionid')==null)
		{
			$this->load->view('admin/content/login');
		}
		else
		{
			$params["active"]="prod";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/products');
		}
		
	}

	public function offers()
	{
		if($this->session->userdata('sessionid')==null)
		{
			$this->load->view('admin/content/login');
		}
		else
		{
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers');
		}
		
	} 

	public function sales()
	{
		if($this->session->userdata('sessionid')==null)
		{
			$this->load->view('admin/content/login');
		}
		else
		{
			$params["active"]="sales";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/sales');
		}
		
	} 

	public function users()
	{
		if($this->session->userdata('sessionid')==null)
		{
			$this->load->view('admin/content/login');
		}
		else
		{
			$params["active"]="users";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/users');
		}
		
	} 

	public function config()
	{
		if($this->session->userdata('sessionid')==null)
		{
			$this->load->view('admin/content/login');
		}
		else
		{
			$params["active"]="config";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/configs');
		}
		
	} 

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
		
	}
}