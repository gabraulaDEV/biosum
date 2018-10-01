<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuarioDAO');

	}

	/***
	*
	* CONFIGURACION CUENTA Y CONTACTO
	*
	*
	*
	*****/
	public function index()
	{
			if($this->isSession()){
			$params["active"]="config";
			$params['asesores']=$this->UsuarioDAO->getByRango(2);
			$params["gb_data"]=$this->cargarMisDatos();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/configs');
		}
		
	} 

	public function updateActual()
	{
		if($this->isSession())
		{
			$alert="";
			if($this->input->post('user_nom')==null || $this->input->post('user_ape')==null || $this->input->post('user_mail')==null || $this->input->post('user_phone')==null)
			{
				$alert=$this->alertError("Campos vacíos");
			}
			else if(strlen($this->input->post('user_nom'))>29 || strlen($this->input->post('user_ape'))>29)
			{
			  	$alert=$this->alertError("El nombre y el apellido no pueden sobre pasar los 30 carateres");

			}
			else if(strlen($this->input->post('user_phone'))>12)
			{
				$alert=$this->alertError("El teléfono es inválido");
			}
			else if(!$this->validateEmail($this->input->post('user_mail')))
			{
				$alert=$this->alertError("El correo '".$this->input->post('user_mail')."' es inválido");
			}
			else if($this->UsuarioDAO->update1($this->input->post('user_nom'),$this->input->post('user_ape'),$this->input->post('user_mail'),$this->input->post('user_phone'),$this->session->userdata('sessionid')))
			{
			  	$alert=$this->alertSuccess("Cambios exitosos");				
			}
			else
			{
			  	$alert=$this->alertError("Error en cambio de datos");
				
			}
			$this->index();
			echo $alert;			
		}
	}

	public function modificarAsesor()
	{
		if($this->isSession())
		{
			$alert="";
			if($this->input->post('user_nom')==null || $this->input->post('user_ape')==null || $this->input->post('user_mail')==null || $this->input->post('user_phone')==null)
			{
				$alert=$this->alertError("Campos vacíos");
			}
			else if(strlen($this->input->post('user_nom'))>29 || strlen($this->input->post('user_ape'))>29)
			{
			  	$alert=$this->alertError("El nombre y el apellido no pueden sobre pasar los 30 carateres");

			}
			else if(strlen($this->input->post('user_phone'))>12)
			{
				$alert=$this->alertError("El teléfono es inválido");
			}
			else if(!$this->validateEmail($this->input->post('user_mail')))
			{
				$alert=$this->alertError("El correo '".$this->input->post('user_mail')."' es inválido");
			}
			else if($this->UsuarioDAO->update1($this->input->post('user_nom'),$this->input->post('user_ape'),$this->input->post('user_mail'),$this->input->post('user_phone'),$this->input->post('user_id')))
			{
			  	$alert=$this->alertSuccess("Cambios exitosos");				
			}
			else
			{
			  	$alert=$this->alertError("Error en cambio de datos");
				
			}
			$this->index();
			echo $alert;			
		}
	}

	public function agregarAsesor()
	{
		if($this->isSession())
		{
			$alert="";
			if($this->input->post('user_nom')==null || $this->input->post('user_ape')==null || $this->input->post('user_mail')==null || $this->input->post('user_phone')==null)
			{
				$alert=$this->alertError("Campos vacíos");
			}
			else if(strlen($this->input->post('user_nom'))>30 || strlen($this->input->post('user_ape'))>30)
			{
				$alert=$this->alertError("El nombre y el apellido no pueden sobre pasar los 29 caracteres");
			}
			else if(strlen($this->input->post('user_phone'))>12)
			{
				$alert=$this->alertError("El teléfono es inválido");
			}
			else if(!$this->validateEmail($this->input->post('user_mail')))
			{
				$alert=$this->alertError("El correo '".$this->input->post('user_mail')."' es inválido");
			}
			else if(count($this->UsuarioDAO->getUserByEmail($this->input->post('user_mail')))!=0)
			{
				$alert=$this->alertError("Ya existe el asesor con el correo '".$this->input->post('user_mail'));
			}
			else if($this->UsuarioDAO->insertUser($this->input->post('user_nom'), $this->input->post('user_ape'),"12345678",$this->input->post('user_mail'),"Activo",2,$this->input->post('user_phone'),"NA"))
			{
				$alert=$this->alertSuccess("Asesor agregado correctamnete");
			}
			else
			{
				$alert=$this->alertError("Un error ha ocurrido");
			}
			$this->index();
			echo $alert;
		}

	}

	/*
	*
	*
	*
	*
	*
	*
	*UTILITYS
	*/

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
		$gb_data = $this->UsuarioDAO->getById($this->session->userdata('sessionid'));
		return $gb_data;
	}

	private function validateEmail($str)
	{
		$matches = null;
  		return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
	} 

	private function alertError($msg)
	{
		$alert="";
		$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>".$msg."</b></div>";
		$alert=$alert."<script>";
		$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";		
		$alert=$alert."</script>";
		return $alert;
	}

	private function alertSuccess($msg)
	{
		$alert="";
		$alert=$alert."<div id='alert1' onClick='exit()' class='alert_success'><b>".$msg."</b></div>";
		$alert=$alert."<script>";
		$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
		$alert=$alert."</script>";
		return $alert;
	}

}

?>