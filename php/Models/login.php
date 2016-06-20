<?php namespace Models;

	class login{

      	private $nick;
      	private $pass;
      	private $con;      
    
     	function __construct(){
			$this->con = new conexion();
		}

		public function set($atriburo, $contenido){
			$this->$atriburo = $contenido;
		}

		public function get($atriburo){
			return $this->$atriburo;
		}
		
		public function validar(){	
       
	        $sql = "SELECT * FROM usuario WHERE txt_nick = '{$this->nick}' AND txt_password = '{$this->pass}'";
	        $datos = $this->con->consultaRetorno($sql);

	        if ($row = mysqli_fetch_assoc($datos)) {	                   
	        	return true;	           
	        } else {	            
	            return false;
	        }          
       
      	}

      	public function limpiar(){
	        unset($this->nick);
	        unset($this->pass);	        	
	    }    
       
    }

?>