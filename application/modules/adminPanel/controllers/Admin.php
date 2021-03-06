<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		/*
		*
		*
		*CARGA DE MODELOS NECESARIOS
		*/
		$this->load->model('ProductoDAO');
		$this->load->model('UsuarioDAO');
		$this->load->model('CategoriaDAO');
		$this->load->model('ColorDAO');
	}

	public function prueba(){
	}

	public function index()
	{
		$this->load->view('admin/content/login');
	}

	/***
	*
	* INICIO DE SESION
	*
	*
	*
	*****/

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

	/***
	*
	* CERRAR SESION
	*
	*
	*
	*****/

	public function logout()
	{
		/*Vaciar sessionid*/
		$this->session->unset_userdata('sessionid');
		/*Redireccionar a login*/
		$this->load->view('admin/content/login');
	}


	/***
	*
	* PANTALLA BIENVENIDA
	*
	*
	*
	*****/

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

	/*
	* PRODUCTOS
	*/

	public function products()
	{
		if($this->isSession()){
			//OBTENEMOS CATEGORIAS PARA SELECT DE AGREGAR PRODUCTO
			$categorias=$this->CategoriaDAO->nombresCategorias();
			//COLOCAMOS LAS CATEGORIAS EN PARAMS
			$params["categorias"]=$categorias;
			//OBTENEMOS COLORES PARA CHECKBOXES DE AGREGAR PRODUCTO
			$colores=$this->ColorDAO->colores();
			//COLOCAMOS LOS COLORES EN PARAMS
			$params['colores']=$colores;
			//MENU ACTIVO PRODUCTOS
			$params["active"]="prod";
			//CARGAR LISTADO DE PRODUCTOS
			$pA = $this->input->get('page');
			$params["pagina_actual_listado_productos"] = $pA ?? 1;
			$rowsPerPage = 10;
			//CANTIDAD DE PAGINAS PARA LOS PRODUCTOS CARGADOS
			$params["paginacion_listado_productos"]= (int)round($this->paginacionCargarProductos()/$rowsPerPage);
			$params["listado_productos"]=$this->cargarProductos((int)$params["pagina_actual_listado_productos"],(int)$rowsPerPage);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/products');
		}
	}

	public function editProduct()
	{
		if($this->isSession()){
			$params["active"]="prod";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/editProduct');
		}
	}
	public function agregarProducto()
	{
		if($this->isSession())
		{
			$alert="";
			if($this->input->post('prod_ref')==null || $this->input->post('prod_model')==null || $this->input->post('prod_desc')==null || $this->input->post('prod_price')==null || $this->input->post('prod_cat')=="NONE" || count($this->input->post('prod_colors'))==0)
			{
				//MANEJO DE ERROR CMAPOS VACIOS
	            $alert=$this->alertError("Campos vacíos");
			}
			else if($this->input->post('prod_colors')[0]=="NONE")
			{
				//MANEJO DE ERROR CMAPOS VACIOS
	            $alert=$this->alertError("Campos vacíos, no hay colores");
			}
			else if($_FILES['file_image']['type']!="image/png" && $_FILES['file_image']['type']!="image/jpeg" && $_FILES['file_image']['type']!="image/jpg")
			{
				//ERROR DE SUBIDA DE IMAGEN
	            $alert=$this->alertError("Tipo de imagen no soportada");
			}
			else
			{
				//INSERT DE PRODUCTOOOO
				$this->load->model('ProductoDAO');
				//VERIFICAR QUE NO EXISTA
				if(count($this->ProductoDAO->productoProRefTipo($this->input->post('prod_ref'),$this->input->post('prod_tipo')))>0)
				{
	            	$alert=$this->alertError("El producto ya existe");
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
						if($this->ColorDAO->insertColorProducto($this->input->post('prod_ref'),$this->input->post('prod_model')
							,$this->input->post('prod_tipo'),$this->input->post('prod_colors')))
						{
			            	$alert=$this->alertSuccess("El producto se agregó correctamente");
						}
						else
						{
			            	$alert=$this->alertError("El prodcuto se agregó, pero el color no");
						}

					}
					else
					{
		            	$alert=$this->alertError("Eror al agregar producto");
					}
				}			
				
			}
			$this->products();
			echo $alert;
		}
		
	}


	public function cargarProductos($pageCount, $rowsPerPage){
		return $resultado = $this->ProductoDAO->cargarProductos($pageCount, $rowsPerPage);
	}

	public function paginacionCargarProductos(){

		return $this->ProductoDAO->paginacionCargarProductos();
	}
<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php

	public function editProduct()
	{
		if($this->isSession()){
			//OBTENER EL ID DEL PRODUCTO A EDITAR
			$prod_id = $this->input->get('prod_id');
			$prod_result = $this->ProductoDAO->cargarProductoPorId($prod_id);

			//SE VALIDA SI EL PRODUCTO EXISTE
			if(($params["producto"] = $prod_result) != NULL){


			if(($modelo_producto = $this->input->post('modelo_producto'))!=null && 
				($referencia_producto = $this->input->post('referencia_producto'))!=null &&
				($descripcion_producto = $this->input->post('descripcion_producto'))!=null &&
				($descripcion_producto = $this->input->post('descripcion_producto'))!=null && 
				($estado_producto = $this->input->post('estado_producto'))!=null &&
				($tipo_producto = $this->input->post('tipo_producto'))!=null &&
				($categoria_producto = $this->input->post('categoria_producto'))!=null &&
				($precio_producto = $this->input->post('precio_producto'))!=null)
				{
				$this->editProductUPDATE($prod_id,$referencia_producto,$modelo_producto,$descripcion_producto,$estado_producto,$tipo_producto,$categoria_producto,$precio_producto);
				echo $this->alertSuccess("ḂSe han guardado correctamente los cambios!");
				}

			//SE ASIGNA CATEGORÍA DE SIDENAV
			$params["active"]="prod";

			//OBTENEMOS COLORES PARA CHECKBOXES DE LISTADO (Sí se trata de tinta,cartucho)
			$params["producto_colores"] = $this->ColorDAO->colores();

			//OBTENEMOS CATEGORIAS PARA SELECT
			$params["producto_categorias"]=$this->CategoriaDAO->nombresCategorias();

			//OBTENEMOS LOS COLORES QUE YA POSEE EL PRODUCTO (Sí se trata de tinta,cartucho)
			$params["producto_colores_prod"]  = $this->ColorDAO->colores_producto($prod_id);

			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/editProduct');
			}else{
			echo "* este producto no existe";
			}
		}
	}

=======
>>>>>>> Stashed changes:application/controllers/Admin.php
	/***
	*
	* MANEJO DE OFERTAS
	*
	*
	*
	*****/
<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php
=======

>>>>>>> Stashed changes:application/controllers/Admin.php

	public function offers()
	{
		if($this->isSession()){
			$params["active"]="off";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/offers');
		}
		
	} 

	/***
	*
	* MANEJO DE VENTAS
	*
	*
	*
	*****/

	public function sales()
	{
		if($this->isSession()){
			$params["active"]="sales";
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidenav',$params);
			$this->load->view('admin/content/sales');
		}
		
	} 
<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php
=======

	/**
	* USUARIO
	*/

>>>>>>> Stashed changes:application/controllers/Admin.php
	/***
	*
	* MANEJO DE USUARIOS
	*
	*
	*
	*****/
<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php
=======


>>>>>>> Stashed changes:application/controllers/Admin.php
	public function users()
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
		}
		
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


<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php
	}

=======
>>>>>>> Stashed changes:application/controllers/Admin.php
	public function cargarUsuarios($pageCount, $rowsPerPage){
		return $resultado = $this->UsuarioDAO->cargarUsuarios($pageCount, $rowsPerPage);
	}

	public function paginacionCargarUsuarios(){
		return $this->UsuarioDAO->paginacionCargarUsuarios();
	}


<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php
=======



>>>>>>> Stashed changes:application/controllers/Admin.php
	/***
	*
	* CONFIGURACION CUENTA Y CONTACTO
	*
	*
	*
	*****/
<<<<<<< Updated upstream:application/modules/adminPanel/controllers/Admin.php
=======

>>>>>>> Stashed changes:application/controllers/Admin.php
	public function config()
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
			$this->config();
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
			$this->config();
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
		if($this->isSession())
		{
			$alert="";
			$this->load->library("excelreader/excel");
			if($_FILES['file']['type']=="application/vnd.ms-excel")
			{
				$rta=$this->excel->importProductsXLS($_FILES['file']['tmp_name']);
				if($rta[0])
				{
					$alert=$this->alertSuccess($rta[1]);
				}
				else
				{
					$alert=$this->alertError($rta[1]);
				}
			}
			else if($_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
			{
				$rta=$this->excel->importProductsXLSX($_FILES['file']['tmp_name']);
				if($rta[0])
				{
					$alert=$this->alertSuccess($rta[1]);
				}
				else
				{
					$alert=$this->alertError($rta[1]);
				}
			}
			else
			{
				$alert=$this->alertError("Archivo no válido, parece que no es un Excel");
			}
			$this->products();
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