<?php
defined("BASEPATH") OR exist("No direct script access allowed");

class OfertaDAO extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function agregarOferta($id,$porc)
	{
		$success=false;
		try
		{
			$query="INSERT INTO gb_descuento(id,porcentaje) VALUES(?,?)";
			if($this->db->query($query,array($id,$porc)))
			{
				$success=true;
			}
		}
		catch(Exception $e)
		{

		}

		return $success;
		
	}

	public function getById($id)
	{
		$offers=[];
		try
		{
			$query="SELECT id,porcentaje FROM gb_descuento WHERE id = ?";
			$resultset=$this->db->query($query,array($id));
			$offers=$resultset->result_array();
		}
		catch(Exception $e)
		{

		}

		return $offers;
	}

	public function getAll()
	{
		$offers=[];
		try
		{
			$query="SELECT id,porcentaje FROM gb_descuento ORDER BY porcentaje DESC";
			$resultset=$this->db->query($query);
			$offers=$resultset->result_array();
		}
		catch(Exception $e)
		{

		}

		return $offers;
	}

	public function editarOferta($id,$porc)
	{
		$success=false;
		try
		{
			$query="UPDATE gb_descuento SET porcentaje = ? WHERE id = ?";
			if($this->db->query($query,array($porc,$id)))
			{
				$success=true;
			}
		}
		catch(Exception $e)
		{

		}

		return $success;

	}

	public function eliminar($id)
	{
		$success=false;
		try
		{
			$query="DELETE FROM gb_descuento WHERE id = ?";
			if($this->db->query($query,array($id)))
			{
				$success=true;
			}
		}
		catch(Exception $e)
		{

		}

		return $success;

	}
}
?>