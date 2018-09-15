<?php
defined("BASEPATH") OR exist("No direct script access allowed");

class ProductoDAO extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertProduct($ref,$mod,$desc,$tipo,$price,$cod_cat)
	{
		$success=false;

		$tmp_name=$_FILES['file_image']['tmp_name'];
		$extension="";
		if($_FILES['file_image']['type']=="image/png")
		{
			$extension="png";
		}
		else if($_FILES['file_image']['type']=="image/jpeg")
		{
			$extension="jpeg";
		}
		else if($_FILES['file_image']['type']=="image/jpg")
		{
			$extension="jpg";
		}
		if($extension!="")
		{
			try
			{
				$url_image=base_url()."assets/images/products/".$ref.".".$extension;
				$query="INSERT INTO gb_producto(prod_referencia,prod_modelo,prod_descripcion,prod_estado,tipo_producto,image_url,precio,cod_cat) VALUES(?,?,?,?,?,?,?,?)";
				if($this->db->query($query,array($ref,$mod,$desc,'Activo',$tipo,$url_image,$price,$cod_cat)))
				{
					//subir imagen a carpeta dentro de aplicacion
					$path=$_SERVER["DOCUMENT_ROOT"]."/biosum/assets/images/products/".$ref.".".$extension;			
					if(move_uploaded_file($tmp_name, $path))
					{
						$success=true;
					}
				}
			}
			catch(Exception $e)
			{

			}
			
		}
		return $success;
	}

	public function productoProRefTipo($ref,$tipo)
	{
		$query="SELECT id FROM gb_producto WHERE prod_referencia=? AND tipo_producto=?";
		$resultset=$this->db->query($query,array($ref,$tipo));
		return $resultset->result_array();
	}

	public function cargarProductos($pagina,$rowsPerPage){
		$query = "SELECT * FROM gb_producto ORDER BY id asc LIMIT ? OFFSET ? ";
		$resultSet = $this->db->query($query,array($rowsPerPage, ($pagina - 1) * $rowsPerPage));
		return $resultSet->result_array();
	}

	public function paginacionCargarProductos(){
		$query = "SELECT COUNT(*) as resultadoConteo FROM gb_producto WHERE prod_estado = 'ACTIVO'";
		$resultSet = $this->db->query($query);
		return $resultSet->row()->resultadoConteo;
	}
}
?>