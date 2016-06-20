<?php 

	use Models\session as session;

	if (session::getSession('usuario') == ''){
		echo "No posee permisos para ingresar a esta ruta";
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Centros</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo URL; ?>centro/listado">Listado</a></li>
						<li><a href="<?php echo URL; ?>centro/agregar">Agregar</a></li>							
					</ul>
				</li>						

			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo URL; ?>centro/logout" class="btn btn-primary">Cerrar</a></li>
			</ul>

		</div>
				
	</div>				
</nav>
<br>
<div class="container">

	<h1 class="title-header">Editar Centro</h1>

	<hr>
	
	<div class='alert alert-danger' role='alert'>Error en la Grabacion.</div>

	<?php 

		if($datos!==false){
			$row = mysqli_fetch_array($datos);				
		}

	?>

	<div class="col-md-9">
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputEmail" class="control-label">Nombre del Centro</label>
				<?php echo "<input class='form-control' name='nombreCed' type='text' value='".$row['nombre']."' required>" ?>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="control-label">Telefono Local</label>
				<?php echo "<input class='form-control' name='telLocal' type='number' value='".$row['telefono_local']."' >" ?>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="control-label">Telefono Celular</label>
				<?php echo "<input class='form-control' name='telCel' type='number' value='".$row['telefono_Cel']."' >" ?>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="control-label">Direccion</label>
				<?php echo "<input class='form-control' name='direccion' type='text' value='".$row['direccion']."' required>" ?>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="control-label">Latitud</label>
				<?php echo "<input class='form-control' name='latitud' type='number' step='000.000000001' value='".$row['latitud']."' required>" ?>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="control-label">Longitud</label>
				<?php echo "<input class='form-control' name='longitud' type='number' step='000.0000000001' value='".$row['longitud']."' required>" ?>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="control-label">Descripcion</label>				
				<?php echo "<textarea class='form-control' name='descripcion' cols='40' rows='4' required >".$row['descrip']."</textarea>" ?>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Editar</button>
				<button type="reset" class="btn btn-warding">Limpiar</button>
			</div>

		</form>
	</div>

</div>

<?php 
	
	}

 ?>