<?php
defined("BASEPATH") OR exist("No direct script access allowed");

class CategoriaDAO extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function nombresCategorias()
	{
		$query="SELECT id,nom_categoria FROM gb_categoria GROUP BY id,nom_categoria ORDER BY nom_categoria DESC";
		$resultset=$this->db->query($query);
		return $resultset->result_array();
	}

	public function getIdByName($name)
	{
		$query="SELECT id FROM gb_categoria WHERE nom_categoria = ?";
		$resultset=$this->db->query($query,array($name));
		return $resultset->result_array();
	}
}
?>