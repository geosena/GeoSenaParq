<?php namespace Models;

	class session{
		
		//inicio session
		static function start(){
			@session_start();				
		}

		static function getSession($name){
			if (isset($_SESSION[$name])) {
				return $_SESSION[$name];
			}else{
				return '';
			}
			
		}

		static function setSession($name, $data){
			$_SESSION[$name] = $data;
		}

		//destruye session
		static function destroy(){
			@session_destroy();
		}
	}
?>