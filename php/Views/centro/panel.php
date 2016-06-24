<?php 

	use Models\session as session;

	if (session::getSession('usuario') == ''){
		echo "no pasa";
	}else{
		require_once "Views/template1.php";
?>
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
				<li><a href="<?php echo URL; ?>centro/panel">Inicio</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sedes</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo URL; ?>centro/listado">Listado</a></li>
						<li><a href="<?php echo URL; ?>centro/agregar">Agregar</a></li>							
					</ul>
				</li>
                <li><a href="ProyectoSena1/../../../informe/index.html">Informes</a></li>					

			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo URL; ?>centro/logout" class="btn btn-primary">Cerrar</a></li>
			</ul>

		</div>
				
	</div>				
</nav>

<section class="container" style="text-align:center;">
<h1>Bienvenido!</h1>
<h2>Gesti&oacute;n de administraci&oacute;n de sedes y parqueaderos	</h2>
</section>


<?php } ?>