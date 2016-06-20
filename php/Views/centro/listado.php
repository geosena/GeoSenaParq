
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Centros</a>
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

<br>

<div class="container">
<h3 class="titulo">Listado de Centros<hr></h3>
<?php 
	
	//$datos =  $estudiante->index();
	
?>


	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Centros</h3>
		</div>		
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if($datos!==false){

					while ($row = mysqli_fetch_array($datos)) {
				?>
						<tr>
							<td><?php echo $row['nombre']; ?></a></td>
							<td><?php echo $row['direccion']; ?></td>
							<td>
								<a class="btn btn-info" href='<?php 	echo URL; ?>centro/ver/<?php echo $row['id']; ?>'>Ver</a>								
								<a class="btn btn-warning" href='<?php 	echo URL; ?>centro/editar/<?php echo $row['id']; ?>'>Editar</a>
								<a class="btn btn-danger" href='<?php 	echo URL; ?>centro/eliminar/<?php echo $row['id']; ?>'>Eliminar</a>
								<a class="btn btn-success" href='<?php 	echo URL; ?>centro/AgregarParq/<?php echo $row['id']; ?>'>Agregar Parqueaderos</a>
							</td>
						</tr>				
				<?php 

					}
				}
				?>
			</tbody>
		</table>
	</div>

</div>
<?php } ?>