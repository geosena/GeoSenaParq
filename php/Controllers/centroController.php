<?php namespace Controllers;

use Models\login as login;
use Models\session as session;
use Models\centro as centro;
use Models\parqueadero as parqueadero;

class centroController{

	private $login;
	private $centro;
	private $informe;
	private $parqueadero;
		
	function __construct(){		
		$this->login =  new login();		
		$this->centro = new centro();
		$this->parqueadero = new parqueadero();
		session::start();
	}

	public function index(){
		
		if (!$_POST){
						
		}else{		
			
			$this->login->set("nick",$_POST['usuario']);	
			$this->login->set("pass",$_POST['password']);
			$validador = $this->login->validar();
			
			if ($validador == true) {				
				session::setSession('usuario', $_POST['usuario']);
				session::setSession('habilitado', -1);				
				header('Location: '.URL.'centro/panel');
			}
			
		}
	}

	public function listado(){
		$datos = $this->centro->listar();
		return $datos;
	}

	public function ver($id){
		$datos = $this->centro->buscarCentro($id);
		return $datos;
	}

	public function AgregarParq($id){

		if (!$_POST){

		}else{		
			//agregar datos del parqueadero
			$this->parqueadero->set("tipo_ubicacion", 2);
			$this->parqueadero->set("nombre", $_POST['nombreCed']);
			$this->parqueadero->set("descripcion", $_POST['descripcion']);
			$this->parqueadero->setTel($_POST['telLocal'], 1);
			$this->parqueadero->setTel($_POST['telCel'], 2);
			$this->parqueadero->setUbi("direccion", $_POST['direccion']);
			$this->parqueadero->setUbi("latitud", $_POST['latitud']);
			$this->parqueadero->setUbi("longitud", $_POST['longitud']);
			//$res = $this->parqueadero->add();
			//echo var_dump($this->parqueadero);	

			//if ($res!==False) {
			//	header('Location: '.URL.'centro/listado');
			//}

		}
	}

	public function error(){

	}

	public function logout(){
		session::destroy();
		header('Location: '.URL.'centro');
	}

	public function panel(){	
		if (session::getSession('usuario') == '') {
			header('Location: '.URL.'centro/error');
		}
	}


	public function parqueadero(){

	}
	

	public function editar($id){
		$res = False;

		if (!$_POST){
			$datos = $this->centro->buscarCentro($id);
			return $datos;
		}else{

			$this->centro->set("tipo_ubicacion", 1);
			$this->centro->set("nombre", $_POST['nombreCed']);
			$this->centro->set("descripcion", $_POST['descripcion']);
			$this->centro->setTel($_POST['telLocal'], 1);
			$this->centro->setTel($_POST['telCel'], 2);
			$this->centro->setUbi("direccion", $_POST['direccion']);
			$this->centro->setUbi("latitud", $_POST['latitud']);
			$this->centro->setUbi("longitud", $_POST['longitud']);
			$res = $this->centro->editar($id);

			if ($res!==False) {
				header('Location: '.URL.'centro/ver/'.$id);
			}
		}

		
	}

	public function agregar(){

		$res = False;

		if (!$_POST){

		}else{		
			//agregar datos del centro
			$this->centro->set("tipo_ubicacion", 1);
			$this->centro->set("nombre", $_POST['nombreCed']);
			$this->centro->set("descripcion", $_POST['descripcion']);
			$this->centro->setTel($_POST['telLocal'], 1);
			$this->centro->setTel($_POST['telCel'], 2);
			$this->centro->setUbi("direccion", $_POST['direccion']);
			$this->centro->setUbi("latitud", $_POST['latitud']);
			$this->centro->setUbi("longitud", $_POST['longitud']);
			$res = $this->centro->add();
			//echo var_dump($this->centro);	

			if ($res!==False) {
				header('Location: '.URL.'centro/listado');
			}

		}
	}

}



?>