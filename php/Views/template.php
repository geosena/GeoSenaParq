<?php namespace Views;

	class template 
	{
		
		function __construct(){ ?>

<!doctype html>
<html lang="es">
<head>
<meta name="description" content="GeoLocalizaci&oacute;n automatica de parquederos aprendices, instructores Sena cetros bogota">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta charset="utf-8">
<title>GEO-SENA</title>
<link type="text/css" rel="stylesheet" href="<?php echo URL; ?>/Views/Templates/css/estilos.css">
<link rel="stylesheet" href="<?php echo URL; ?>/Views/Templates/fonts/style.css">
</head>

<body>
<!--Header-->
    <header class="menu">
    <div id="titulo">
        <h1>GEO-SENA-PARQ</h1>
        <h2>Geolocalizaci&oacute;n Centros Sena y Parqueaderos</h2>
     </div>
     <nav id="menu">
         <ul>
            <li><a href="ProyectoSena1/../../index.html">Inicio</a></li>
            <li><a href="ProyectoSena1/../../centros.html">Centros</a></li>
            <li><a href="ProyectoSena1/../../navegacion.html">Navegacion</a></li>
         </ul>
     </nav>
    </header>

			
			
			

	<?php }

			public function __destruct(){ ?>

			<script type="text/javascript" src="<?php echo URL; ?>Views/Templates/js/jquery.js"></script>
			<script type="text/javascript" src="<?php echo URL; ?>Views/Templates/js/bootstrap.js"></script>

		</body>
		</html>

		<?php
			}

	}

		$template = new template();

?>
