<?php namespace Models;
	
use Models\conexion as conexion;
use Models\ubicacion as ubicacion;
use Models\telefono as telefono;

class parqueadero extends ubicacion
{	

	private $nombre;
	private $descripcion;	
	private $tipo_ubicacion;
	private $tel;
	private $con;
	
	function __construct(){
		$this->con = new conexion();
		$this->tel = new telefono();
	}

	public function set($atriburo, $contenido){
		$this->$atriburo = $contenido;
	}

	public function get($atriburo){
		return $this->$atriburo;
	} 

	public function setTel($contenido, $indice){
		$this->tel->set("telef", $contenido, $indice);
	}
	public function getTel($indice){
		return $this->tel->get("telef", $indice);
	}
	
	public function listar(){
		$sql = "SELECT t1.*, t2.nomb_seccion as nombre_seccion FROM estudiante t1 INNER JOIN seccion t2 ON t1.id_seccion = t2.id";
		$datos = $this->con->consultaRetorno($sql);			
		return $datos;
	}

	public function add(){

		$val = False;

		$sql = "INSERT INTO sede (nombre, descrip) 
		VALUES('{$this->nombre}', '{$this->descripcion}')";
		$val = $this->con->consultaSimple($sql);

		if ($val!==False) {

			$id = $this->con->obtenerID();

			$sql = "INSERT INTO ubicacion (id_tipo_ubicacion, id_sede, direccion, latitud, longitud)
			VALUES ({$this->tipo_ubicacion}, {$id}, '{$this->getUbi("direccion")}', {$this->getUbi("latitud")}, {$this->getUbi("longitud")})";
			$val = $this->con->consultaSimple($sql);

			if ($val!==False) {

				$id = $this->con->obtenerID();

				$varTeleLocal = $this->tel->get("telef", 1);
				$varTeleCel = $this->tel->get("telef", 2);

				if (empty($varTeleLocal)) {
		    		//echo 'telefono local vacio';
				}else{
					$sql = "INSERT INTO telefono (id_tipoTel, id_ubic, telefono) 
					VALUES (1, {$id}, {$this->tel->get("telef",1)})";
					$this->con->consultaSimple($sql);
				}

				if (empty($varTeleCel)) {
		    		//echo 'telefono cel vacio';
				}else{
					$sql = "INSERT INTO telefono (id_tipoTel, id_ubic, telefono) 
					VALUES (2, {$id}, {$this->tel->get("telef",2)})";
					$this->con->consultaSimple($sql);
				}
			}

		}

		if ($val!==False) {
			$this->con->commitTran();
			return true;
		}else{
			$this->con->rollbackTran();
			return false;
		}
	}

	
}


?>