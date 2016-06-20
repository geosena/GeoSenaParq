<?php namespace Views;

	class template 
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
		<body cz-shortcut-listen="true" >

			
			
			

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
