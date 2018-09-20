<?php
class Usuario extends CI_Model{
	private $cod_usuario;
	private $cod_t_usuario;
	private $nom_usuario;
	private $email_usuario;
	private $pass_usuario;
	private $dir_usuario;
	private $tel_usuario;
	private $est_usuario;

	function __construct()
	{
		//EMPTY		
	}

	function __construct($cod_t_usuario, $nom_usuario, $email_usuario, $pass_usuario, $dir_usuario, $tel_usuario, $est_usuario){
		$this->$cod_t_usuario = $cod_t_usuario;
		$this->$nom_usuario = $nom_usuario;
		$this->$email_usuario = $email_usuario;
		$this->$pass_usuario = $pass_usuario;
		$this->$dir_usuario = $dir_usuario;
		$this->$tel_usuario = $tel_usuario;
		$this->$$est_usuario = $est_usuario;
	}

	public function getCodUsuario()
	{
		return $this->$cod_usuario;
	}

	public function setCodUsuario($cod)
	{
		$this->$cod_usuario=$cod;	
	}

	public function getTipoUsuario()
	{
		return $this->$cod_t_usuario;
	} 

	public function setTipoUsuario($tipo)
	{
		$this->$cod_t_usuario=$tipo;
	} 

	public function getNomUsuario()
	{
		return $this->$nom_usuario;
	} 

	public function setNomUsuario($nom)
	{
		$this->$nom_usuario=$nom;
	} 

	public function getEmailUsuario()
	{
		return $this->$email_usuario;
	}

	public function setEmailUsuario($email)
	{
		$this->$email_usuario=$email;	
	}

	public function getPassUsuario()
	{
		return $this->$pass_usuario;
	}

	public function setPassUsuario($pass)
	{
		$this->$pass_usuario=$pass;	
	}

	public function getDirUsuario()
	{
		return $this->$dir_usuario;
	}

	public function setDirUsuario($dir)
	{
		$this->$dir_usuario=$dir;	
	}

	public function getTelUsuario()
	{
		return $this->$tel_usuario;
	}

	public function setTelUsuario($tel)
	{
		$this->$tel_usuario=$tel;	
	}

	public function getEstUsuario()
	{
		return $this->$est_usuario;
	}

	public function setEstUsuario($est)
	{
		$this->$est_usuario=$est;	
	}
}
?>