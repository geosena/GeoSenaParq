<?php 	
	define('DS', DIRECTORY_SEPARATOR); //DIRECCIONES AMIGABLES 
	define('ROOT', realpath(dirname(__FILE__)) . DS); // CONTIENE LA RUTA DE LOS ARCHIVOS Q ESTAMOS LLAMANDO.﻿
	define('URL', 'http://localhost:8080/GeoSenaParq/php/');

	require_once 'Config/autoload.php';
	Config\autoload::run(); 

	
	Config\enrutador::run(new Config\Request());

?>
