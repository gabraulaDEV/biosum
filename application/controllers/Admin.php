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
			$params['error'] = "Los campos se encuentran vacíos";
			$this->load->view('admin/content/login',$params);			
		}
		else
		{
			$this->load->model('UsuarioDAO');
			$query = $this->UsuarioDAO->selectAdmin($this->input->post('itUser'),$this->input->post('itPass'));
			if($query != null)
			{
				$this->session->set_userdata(array('sessionid'=> (int)$query));
				$this->welcome();
			}else{
				/*Mensaje de error*/
				$params['error'] = "Datos inválidos";
				$this->load->view('admin/content/login',$params);
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

	public function welcome()
	{
			if($this->isSession()){
			$params["active"]="welcome";
			$params["gb_session"]=$this->cargarMisDatos();
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/welcome');
		}
		
	}

	/***
	*
	* PRODUCTOS
	*
	*
	*
	*****/

	public function products()
	{
		if($this->isSession()){
			//OBTENEMOS CATEGORIAS PARA SELECT DE AGREGAR PRODUCTO
			$this->load->model('CategoriaDAO');
			$categorias=$this->CategoriaDAO->nombresCategorias();
			//COLOCAMOS LAS CATEGORIAS EN PARAMS
			$params["categorias"]=$categorias;
			//OBTENEMOS COLORES PARA CHECKBOXES DE AGREGAR PRODUCTO
			$this->load->model('ColorDAO');
			$colores=$this->ColorDAO->colores();
			//COLOCAMOS LOS COLORES EN PARAMS
			$params['colores']=$colores;
			//MENU ACTIVO PRODUCTOS
			$params["active"]="prod";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/products');
		}
	}

	public function agregarProducto()
	{
		if($this->isSession())
		{
			if($this->input->post('prod_ref')==null || $this->input->post('prod_model')==null || $this->input->post('prod_desc')==null || $this->input->post('prod_price')==null || $this->input->post('prod_cat')=="NONE" || count($this->input->post('prod_colors'))==0)
			{
				//MANEJO DE ERROR CMAPOS VACIOS
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>El producto ya existe</b></div>";
	            $alert=$alert."<script>";
	            $alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
	            $alert=$alert."</script>";
			}
			else if($this->input->post('prod_colors')[0]=="NONE")
			{
				//MANEJO DE ERROR CMAPOS VACIOS
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>El producto ya existe</b></div>";
	            $alert=$alert."<script>";
	            $alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
	            $alert=$alert."</script>";
			}
			else if($_FILES['file_image']['type']!="image/png" && $_FILES['file_image']['type']!="image/jpeg" && $_FILES['file_image']['type']!="image/jpg")
			{
				//ERROR DE SUBIDA DE IMAGEN
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>El producto ya existe</b></div>";
	            $alert=$alert."<script>";
	            $alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
	            $alert=$alert."</script>";
			}
			else
			{
				$alert="";
				//INSERT DE PRODUCTOOOO
				$this->load->model('ProductoDAO');
				//VERIFICAR QUE NO EXISTA
				if(count($this->ProductoDAO->productoProRefTipo($this->input->post('prod_ref'),$this->input->post('prod_tipo')))>0)
				{
					$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>El producto ya existe</b></div>";
	            	$alert=$alert."<script>";
	            	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
	            	$alert=$alert."</script>";
				}
				else
				{
					if($this->ProductoDAO->insertProduct(
						$this->input->post('prod_ref'),
						$this->input->post('prod_model'),
						$this->input->post('prod_desc'),
						$this->input->post('prod_tipo'),
						$this->input->post('prod_price'),
						$this->input->post('prod_cat')))
					{
						//INSERT COLORES
						$this->load->model('ColorDAO');
						if($this->ColorDAO->insertColorProducto($this->input->post('prod_ref'),$this->input->post('prod_model')
							,$this->input->post('prod_tipo'),$this->input->post('prod_colors')))
						{
							$alert=$alert."<div id='alert1' onClick='exit()' class='alert_success'><b>El producto se agregó correctamente</b></div>";
			            	$alert=$alert."<script>";
			            	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
			            	$alert=$alert."</script>";
						}
						else
						{
							$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>El prodcuto se agregó, pero el color no</b></div>";
			            	$alert=$alert."<script>";
			            	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
			            	$alert=$alert."</script>";
						}

					}
					else
					{
						$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>Eror al agregar producto</b></div>";
		            	$alert=$alert."<script>";
		            	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
		            	$alert=$alert."</script>";
					}
				}			
				
			}
			$this->products();
			echo $alert;
		}
		
	}

	public function offers()
	{
		if($this->isSession()){
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers');
		}
		
	} 

	public function sales()
	{
		if($this->isSession()){
			$params["active"]="sales";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/sales');
		}
		
	} 

	public function users()
	{
			if($this->isSession()){
			$params["active"]="users";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/users');
		}
		
	} 


	/***
	*
	* CONFIGURACION CUENTA Y CONTACTO
	*
	*
	*
	*****/
	public function config()
	{
			if($this->isSession()){
			$params["active"]="config";
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
			$this->load->model('UsuarioDAO');
			if($this->input->post('user_nom')==null || $this->input->post('user_ape')==null || $this->input->post('user_mail')==null || $this->input->post('user_phone')==null)
			{
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>Campos vacíos</b></div>";
			   	$alert=$alert."<script>";
			   	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
			  	$alert=$alert."</script>";
			}
			else if(strlen($this->input->post('user_nom'))>29 || strlen($this->input->post('user_ape'))>29)
			{
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>El nombre y el apellido no pueden sobre pasar los 30 carateres</b></div>";
			   	$alert=$alert."<script>";
			   	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
			  	$alert=$alert."</script>";

			}
			else if($this->UsuarioDAO->update1($this->input->post('user_nom'),$this->input->post('user_ape'),$this->input->post('user_mail'),$this->input->post('user_phone'),$this->session->userdata('sessionid')))
			{
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_success'><b>Cambios exitosos</b></div>";
			   	$alert=$alert."<script>";
			   	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
			  	$alert=$alert."</script>";
				
			}
			else
			{
				$alert=$alert."<div id='alert1' onClick='exit()' class='alert_error'><b>Error en cambio de datos</b></div>";
			   	$alert=$alert."<script>";
			   	$alert=$alert."function exit(){document.getElementById('alert1').style.display='none';document.getElementById('alert1').style.visibility='hidden';}";
			  	$alert=$alert."</script>";
				
			}
			$this->config();
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
/*
<<<<<<< HEAD
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
		$this->load->model('UsuarioDAO');
		$gb_data = $this->UsuarioDAO->getById($this->session->userdata('sessionid'));
		return $gb_data;
	}
/*
=======
	
		
>>>>>>> 7c33ad0bda2d568822e0c51bf7223d0f58d46364
*/
	
}