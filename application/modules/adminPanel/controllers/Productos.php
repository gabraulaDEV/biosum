<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('ProductoDAO');
		$this->load->model('UsuarioDAO');
		$this->load->model('CategoriaDAO');
		$this->load->model('ColorDAO');
	}



	/*
	* PRODUCTOS
	*/

	public function index()
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

		public function editProductUPDATE($prod_id,$referencia_producto,$modelo_producto,$descripcion_producto,$estado_producto,$tipo_producto,$categoria_producto,$precio_producto)
	{
		$this->ProductoDAO->editProductUPDATE($prod_id,$referencia_producto,$modelo_producto,$descripcion_producto,$estado_producto,$tipo_producto,$categoria_producto,$precio_producto);
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