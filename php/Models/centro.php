<?php namespace Models;

use Models\conexion as conexion;
use Models\ubicacion as ubicacion;
use Models\telefono as telefono;

class centro extends ubicacion 
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

	public function eliminar(){
	}

	public function listar(){
		$sql = "SELECT 	s.id_sede AS id, s.nombre AS nombre, u.direccion AS direccion FROM sede s JOIN ubicacion u ON s.id_sede = u.id_sede";
		$datos = $this->con->consultaRetorno($sql);			
		return $datos;
	}

	public function buscarCentro($id){
		$sql = 	"
				SELECT 	s.id_sede AS id, 
						nombre, 
				        direccion, 
				        latitud, 
				        longitud,  
				        (SELECT telefono FROM telefono WHERE id_ubic = u.id_ubic AND id_tipoTel = 1) AS 'telefono_local',
				        (SELECT telefono FROM telefono WHERE id_ubic = u.id_ubic AND id_tipoTel = 2) AS 'telefono_Cel',
				        s.descrip
				FROM 	sede s JOIN ubicacion u 
						ON s.id_sede = u.id_sede
				WHERE 	s.id_sede = ".$id; 
		$datos = $this->con->consultaRetorno($sql);			
		return $datos;
	}

	public function editar($id){

		$val = False;

		$sql = "UPDATE 	sede 
				SET  	nomres = '{$this->nombre}',
						descrip = '{$this->descripcion}'
				WHERE 	id_sede =".$id;
		$val = $this->con->consultaSimple($sql);

		$sql = "UPDATE 	ubicacion 
				SET  	direccion = '{$this->getUbi("direccion")}',
						latitud = {$this->getUbi("latitud")},
						longitud = {$this->getUbi("longitud")}
				WHERE 	id_sede =".$id;
		$val = $this->con->consultaSimple($sql);


		$sql = "SELECT id_ubic FROM ubicacion WHERE id_sede = ".$id;
		$id = $this->con->consultaRetorno();

		$varTeleLocal = $this->tel->get("telef", 1);
		$varTeleCel = $this->tel->get("telef", 2);

		if (empty($varTeleLocal)) {
    		//echo 'telefono local vacio';
		}else{			
			$this->con->consultaSimple($sql);
			$sql = "UPDATE 	telefono 
					SET  	telefono = {$varTeleLocal},						
					WHERE 	id_ubic =".$id." AND id_tipoTel = 1";
			$this->con->consultaSimple($sql);
		}

		if (empty($varTeleCel)) {
    		//echo 'telefono cel vacio';
		}else{
			$sql = "UPDATE 	telefono 
					SET  	telefono = {$varTeleCel},						
					WHERE 	id_ubic =".$id." AND id_tipoTel = 2";
			$this->con->consultaSimple($sql);
		}	

		if ($val!==False) {
			$this->con->commitTran();
			return true;
		}else{
			$this->con->rollbackTran();
			return false;
		}

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