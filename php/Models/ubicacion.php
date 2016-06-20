<?php namespace Models;


class ubicacion{

	private $direccion;
	private $latitud;
	private $longitud;

	function __construct(){}

	public function setUbi($atributo, $contenido){
		$this->$atributo = $contenido;
	}

	public function getUbi($atributo){
		return $this->$atributo;
	}

}

?>