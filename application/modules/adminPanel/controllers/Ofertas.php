<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ofertas extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		

		$this->load->model('OfertaDAO');
	}

	public function index()
	{
		if($this->isSession()){
			$ofers=$this->OfertaDAO->getAll();
			$params['offers']=$ofers;
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers');
		}
	}

	public function agregar()
	{
		if($this->isSession()){
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers_agregar');
		}

	}

	public function agregaroferta()
	{
		if($this->isSession()){
			$alert="";
			if($this->input->post('id')==null || $this->input->post('porc')==null)
			{
				$alert=$this->alertError("Campos vacíos");
			}
			else if(count($this->OfertaDAO->getById($this->input->post('id')))>0)
			{
				$alert=$this->alertError("Ya existe una oferta código ".$this->input->post('id'));
			}
			else if($this->OfertaDAO->agregarOferta($this->input->post('id'),$this->input->post('porc')))
			{
				$alert=$this->alertSuccess("Agregada corréctamente");
			}
			else
			{
				$alert=$this->alertError("Error de conexión");
			}
			
			$this->agregar();
			echo $alert;
		
		}
	}

	public function editar()
	{
		if($this->isSession()){
			$offers=$this->OfertaDAO->getById($this->input->get('id_off'));
			$params['offers']=$offers;
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers_edit');
		
		}
	}

	public function editaroferta()
	{
		if($this->isSession()){
			$alert="";
			if($this->input->post('id')==null || $this->input->post('porc')==null)
			{
				$alert=$this->alertError("Campos vacíos");
			}
			else if(count($this->OfertaDAO->getById($this->input->post('id')))==0)
			{
				$alert=$this->alertError("No existe una oferta con código ".$this->input->post('id'));
			}
			else if($this->OfertaDAO->editarOferta($this->input->post('id'),$this->input->post('porc')))
			{
				$alert=$this->alertSuccess("Modificado corréctamente");
			}
			else
			{
				$alert=$this->alertError("Error de conexión");
			}
			
			$this->index();
			echo $alert;
		
		}

	}

	public function eliminar()
	{
		if($this->isSession()){
			$alert="";
			if($this->input->get('id_off')==null)
			{
				$alert=$this->alertError("Campos vacíos");
			}
			else if($this->OfertaDAO->eliminar($this->input->get('id_off')))
			{
				$alert=$this->alertSuccess("Eliminado corréctamente");
			}
			else
			{
				$alert=$this->alertError("Error de conexión");
			}
			
			$this->index();
			echo $alert;		
		}
	}

	private function isSession(){
		$session = false;
		if($this->session->userdata('sessionid')==null){
			$this->load->view('admin/content/login');
		}else{
			$session = true;
		}

		return $session;
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