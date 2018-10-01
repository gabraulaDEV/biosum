<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
		if($this->isSession()){
			$params["active"]="users";
			//SE ESTABLECE LA CANTIDAD DE USUARIOS A CARGAR EN LA TABLA
			$pA = $this->input->get('page');
			$params["pagina_actual_listado_usuarios"] = $pA ?? 1;
			$rowsPerPage = 10;
			$params["paginacion_listado_usuarios"]= (int)round($this->paginacionCargarUsuarios()/$rowsPerPage);
			$params["listado_usuarios"] = $this->cargarUsuarios((int)$params["pagina_actual_listado_usuarios"],(int)$rowsPerPage);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/users');
			$this->load->view('admin/content/users_clients');
		}
		
	} 

	public function cargarUsuarios($pageCount, $rowsPerPage){
		return $resultado = $this->UsuarioDAO->cargarUsuarios($pageCount, $rowsPerPage);
	}

	public function paginacionCargarUsuarios(){
		return $this->UsuarioDAO->paginacionCargarUsuarios();
	}

	public function admins()
	{
		if($this->isSession())
		{
			$usuarios=$this->UsuarioDAO->getByRango(3);
			$params['users']=$usuarios;
			$params["active"]="users";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/users');
			$this->load->view('admin/content/users_admins');
		}
	}
	
	public function agregarAdmin()
	{
		if($this->isSession())
		{
			$alert="";
			if($this->input->post('user_nom')==null || $this->input->post('user_ape')==null || $this->input->post('user_mail')==null || $this->input->post('user_phone')==null || $this->input->post('user_pass1')==null || $this->input->post('user_pass2')==null)
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
			else if($this->input->post('user_pass1')!=$this->input->post('user_pass2'))
			{
				$alert=$this->alertError("Contraseñas no coinciden");
			}
			else if(count($this->UsuarioDAO->getAdminByEmail($this->input->post('user_mail')))>0)
			{
				$alert=$this->alertError("El administrador ".$this->input->post('user_mail')." ya existe");
			}
			else if($this->UsuarioDAO->insertUser($this->input->post('user_nom'), $this->input->post('user_ape'),$this->input->post('user_pass1'),$this->input->post('user_mail'),"Activo",3,$this->input->post('user_phone'),$this->input->post('user_dir')))
			{
				$alert=$this->alertSuccess("Administrador agregado correctamnete");
			}
			else
			{
				$alert=$this->alertError("Un error ha ocurrido");
			}
			$this->admins();
			echo $alert;			
			//redirect(base_url().index_page()."/admin/admins",'refresh');
			//header('Location:'.base_url().index_page().'/admin/admins');
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