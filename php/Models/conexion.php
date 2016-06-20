<?php  namespace Models;
	
	class conexion 
	{
		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"db"   => "geoceet" 
		);
		private $con;

		public function __construct(){

			$this->con = new \mysqli($this->datos['host'], 
									 $this->datos['user'], 
									 $this->datos['pass'], 
									 $this->datos['db']);

			$this->con->autocommit(false);
		}
 
		public function commitTran(){
			$this->con->commit();
		}
		
		public function rollbackTran(){
			$this->con->rollback();
		}

		public function consultaSimple($sql){
			return $this->con->query($sql);
		}

		public function consultaRetorno($sql){
			$datos = $this->con->query($sql);
			return $datos;
		}

		public function obtenerID(){
			return $this->con->insert_id;
		}

	}
	
?>
