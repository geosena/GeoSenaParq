<?php namespace Models;


class telefono{

	private $tipo_telef = array();
	private $telef = array();
	//private $con;

	function __construct(){
		//$this->con = new conexion();
	}

	public function set($atriburo, $contenido, $indice){
		$this->$atriburo[$indice] = $contenido;
	}

	public function get($atriburo, $indice){
		return $this->$atriburo[$indice];
	}

	public function obtenerTipoTelef()
	{
		$sql = "SELECT * FROM tipo_telefono";
		$datos = $this->con->consultaRetorno($sql);
		$row = mysqli_fetch_assoc($datos);
		return $row;
	}


}

?>