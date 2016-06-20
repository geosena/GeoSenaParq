<?php namespace Views;

	class template_2 
	{
		
		function __construct(){ ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<title>Ingreso Plataforma</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>Views/Templates/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>Views/Templates/css/Style1.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="css/Style1.css">

	<meta name="description" content="Parametrizacion Parqueaderos">
    <meta name="author" content="Gustavo Moreno">


	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body cz-shortcut-listen="true">
	

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target"#bs-example-navbar-collapse-2">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Centros de Formacion SENA</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo URL; ?>parqueadero/panel">Inicio</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Centros de Formacion</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo URL; ?>parqueadero">Listado</a></li>
								<li><a href="<?php echo URL; ?>parqueadero/agregar">Agregar</a></li>							
							</ul>
						</li>						

					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"></a>Centros de Formacion SENA</li>
					</ul>

				</div>
				
			</div>				
		</nav>
			
			
			

	<?php }

			public function __destruct(){ ?>

			<script type="text/javascript" src="<?php echo URL; ?>Views/Templates/js/jquery.js"></script>
			<script type="text/javascript" src="<?php echo URL; ?>Views/Templates/js/bootstrap.js"></script>

		</body>
		</html>

		<?php
			}

	}

		$template2 = new template_2();

?>
