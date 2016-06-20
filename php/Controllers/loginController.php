<?php namespace Controllers;

use Models\login as login;

class loginController{

	private $login;
	
	function __construct(){
		$this->login =  new login();
	}

	public function index(){
		$datos = $this->login->view();
		return $datos;
	}

	public function login(){
		if (!$_POST) {
				$datos = $this->login->listar();
				return $datos;
			}else{
				$this->login->set("nick",$_POST['usuario']);
				$this->login->set("pass",$_POST['password']);
				$this->estudiante->add();
			}
	}
}


?>