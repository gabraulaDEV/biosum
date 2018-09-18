<?php
defined("BASEPATH") OR exist("No direct script access allowed");


class UsuarioDAO extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function selectUser($email, $pwd)
	{
		$resultSet = $this->db->query("SELECT * from  gb_usuario where email_usuario = ? and pass_usuario = ?", array($email, $pwd));
		return $resultSet->result_array();
	}

	function selectAdmin($email, $pwd)
	{
		$resultSet = null;
	  	$query = $this->db->query("SELECT id, rango from  gb_usuario where usuario_email = ? and usuario_password = ?", array($email, md5($pwd)));
	  	if($query->row() != null)
	  	{
	  		$row = $query->row();
	  		if((int)$row->rango > 1)
	  		{
 				$resultSet = $row->id;
	  		} 
	  	}

	  	return $resultSet;
	}

	function getById($id)
	{
		$resultSet = NULL;
		$query = $this->db->query("SELECT * from gb_usuario where id = ?", array((int)$id));
		if($query->row() != null)
	  	{
	  		//Valores a mostrar por cada usuario /restringidos/
	  		$resultSet = array(
				"gb_nombre" => $query->row()->usuario_nombre,
				"gb_apellido" => $query->row()->usuario_apellido,
				"gb_email" => $query->row()->usuario_email,
				"gb_estado" => $query->row()->estado,
				"gb_rango" => $query->row()->rango,
				"gb_usuario_telefono" =>  $query->row()->usuario_telefono,
				"gb_direccion" => $query->row()->direccion
			);
	  	}

	  	return $resultSet;
	}

	public function getByRango($rango)
	{
		$usuarios=[];
		$query="SELECT id,usuario_nombre,usuario_apellido,usuario_email,usuario_telefono,direccion,estado FROM gb_usuario WHERE rango = ? ORDER BY id ASC";
		try
		{
			$resultset=$this->db->query($query,array($rango));
			$usuarios=$resultset->result_array();
		}
		catch(Exception $e)
		{

		}
		return $usuarios;
	}

	function insertUser($usuario_nombre, $usuario_apellido, $usuario_password, $usuario_email, $estado, $rango, $usuario_telefono,$direccion)
	{
		try{
			$tempArrayUser = array(
				"usuario_nombre" => $usuario_nombre,
				"usuario_apellido" => $usuario_apellido,
				"usuario_password" => md5($usuario_password),
				"usuario_email" => $usuario_email,
				"estado" => $estado,
				"rango" => $rango,
				"usuario_telefono" => $usuario_telefono,
				"direccion" => $direccion
			);

			$this->db->insert("gb_usuario",$tempArrayUser);
			return true;
		}catch(Exception $e){
			return false;
		}
	}

<<<<<<< HEAD
=======

>>>>>>> 184dde543c26f4ddfb4382e7f37427fd5e96feee
	public function cargarUsuarios($pagina,$rowsPerPage){
		$query = "SELECT * FROM gb_usuario ORDER BY id asc LIMIT ? OFFSET ? ";
		$resultSet = $this->db->query($query,array($rowsPerPage, ($pagina - 1) * $rowsPerPage));
		return $resultSet->result_array();
	}

	public function paginacionCargarUsuarios(){
		$query = "SELECT COUNT(*) as resultadoConteo FROM gb_usuario";
		$resultSet = $this->db->query($query);
		return $resultSet->row()->resultadoConteo;
<<<<<<< HEAD

	function update1($nom,$ape,$mail,$tel,$id)
=======
	}

	public function update1($nom,$ape,$mail,$tel,$id)
>>>>>>> 184dde543c26f4ddfb4382e7f37427fd5e96feee
	{
		$success=false;
		$query="UPDATE gb_usuario SET usuario_nombre=?, usuario_apellido=?, usuario_email=?, usuario_telefono=? WHERE id=?";
		try
		{
			if($this->db->query($query,array($nom,$ape,$mail,$tel,$id)))
			{
				$success=true;
			}
		}
		catch(Exception $e)
		{

		}
		return $success;

	}

	public function getUserByEmail($email)
	{
		$resultSet = $this->db->query("SELECT * FROM  gb_usuario WHERE usuario_email = ?", array($email));
		return $resultSet->result_array();
	} 

}
}
?>