<?php
defined("BASEPATH") OR exist("No direct script access allowed");

class ColorDAO extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function colores()
	{
		$query="SELECT cod_color,nom_color FROM gb_color GROUP BY cod_color,nom_color ORDER BY cod_color";
		$resultset=$this->db->query($query);
		return $resultset->result_array();
	}

	public function insertColorProducto($ref,$mod,$tipo,$colores)
	{
		$success=false;
		try
		{
			$query2="SELECT id FROM gb_producto WHERE prod_referencia=? AND prod_modelo=? AND tipo_producto=?";
			$resultset=$this->db->query($query2,array($ref,$mod,$tipo));
			$product=$resultset->result_array();
			if(count($product)>0)
			{
				$query3="INSERT INTO gb_color_prod VALUES";
				for($i=0;$i<count($colores);$i++)
				{
					$query3=$query3."(".$product[0]['id'].",'".$colores[$i]."')";		
					if($i!=count($colores)-1)
					{
						$query3=$query3.",";
					}												
				}
				if($this->db->query($query3))
				{
					$success=true;
				}
			}

		}
		catch(Exception $e)
		{

		}
		
		return $success;
	}

	public function colores_producto($id){
		$query = "SELECT * FROM gb_color_prod";
		$resultSet = $this->db->query($query);
		return $resultSet->result_array();
	}
}
?>