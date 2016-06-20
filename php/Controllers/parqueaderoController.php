<?php namespace Controllers;

use Models\login as login;
use Models\session as session;

class parqueaderoController{

	private $login;
		
	function __construct(){

		
		$this->login =  new login();		
		session::start();

	}

	public function index(){
		
		if (!$_POST){
			echo "sin post";			
		}else{		
			echo "con post";		
			$this->login->set("nick",$_POST['usuario']);	
			$this->login->set("pass",$_POST['password']);
			$validador = $this->login->validar();
			if ($validador == true) {				
				session::setSession('usuario', $_POST['usuario']);
				session::setSession('habilitado', -1);
				//echo "Usuarios: ".session::getSession('usuario');
				header('Location: '.URL.'centro');
			}else{				
				$this->login->limpiar();
				session::destroy();
			}
		}
	}

	public function panel(){

	}

	public function agregar(){
		if (!$_POST){
			//echo "sin post";			
		}else{		
			//echo "con post";		
			$this->login->set("nick",$_POST['usuario']);	
			$this->login->set("pass",$_POST['password']);
			$validador = $this->login->validar();
			if ($validador == true) {				
				session::setSession('usuario', $_POST['usuario']);
				session::setSession('habilitado', -1);
				//echo "Usuarios: ".session::getSession('usuario');
				header('Location: '.URL.'parqueadero/panel');
			}else{				
				$this->login->limpiar();
				session::destroy();
			}
		}
	}

}



?>