<?php
defined("BASEPATH") OR exist("No direct script access allowed");


class UsuarioDAO extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function selectUser($email, $pwd)
	{
		$resultSet = $this->db->query("SELECT * from  usuario where email_usuario = ? and pass_usuario = ?", array($email, $pwd));
		return $resultSet->result_array();
	}

	function insertUser($cod_t_usuario, $nom_usuario, $email_usuario, $pass_usuario, $dir_usuario, $tel_usuario, $est_usuario)
	{
		try{
			$tempArrayUser = array(
				"cod_t_usuario" => $cod_t_usuario,
				"nom_usuario" => $nom_usuario,
				"email_usuario" => $email_usuario,
				"pass_usuario" => $pass_usuario,
				"dir_usuario" => $dir_usuario,
				"tel_usuario" => $tel_usuario,
				"est_usuario" => $est_usuario
			);

			$this->db->insert("usuario",$tempArrayUser);
			return true;
		}catch(Exception $e){
			return false;
		}
	}
}
?>