<?php 

	use Models\session as session;

	if (session::getSession('usuario') == ''){
		echo "No posee permisos para ingresar a esta ruta";
	}else{
		require_once "Views/template1.php";
?>

<?php 
	if($datos!==false){
		$row = mysqli_fetch_array($datos);				
	}
?>

<style>
    #map_canvas{
		height:300px;		
	}
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.22.exp&sensor=false&language=es"></script>   

<?php echo "<script> 

window.onload = function() {
// Aquí el código que deseamos cargar

if( navigator.geolocation )
     { 
        navigator.geolocation.getCurrentPosition(mostrar, errores);
     }
    else
     {
        alert('Your browser does not support geolocation services.');
     }
//mapa
 function mostrar(posicion){
	   
	 var mapDiv = document.getElementById('map_canvas');
	  
	 var origen = new google.maps.LatLng(".$row['latitud'].", ".$row['longitud'].");
	  
	 var options = {
		center: origen,
		zoom: 13,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		//Definido el mapTypeControl como true, podemos establecer los valores para la propiedad mapTypeControlOptions  
		mapTypeControl: true,
		mapTypeControlOptions: {
		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
		position: google.maps.ControlPosition.TOP_RIGHT,
		mapTypeIds: [
			google.maps.MapTypeId.ROADMAP,
			google.maps.MapTypeId.HYBRID
			],
		streetViewControl: true,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.RIGHT_TOP
			},
		draggableCursor: 'crosshair'
		}
		};//fin option
			 
	 var map = new google.maps.Map(mapDiv, options);
	
/******************************* fin arrays***********************/
	
	var infowindow = new google.maps.InfoWindow();
    var marker, i;
	var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

		var myLatLng = new google.maps.LatLng(".$row['latitud'].",".$row['longitud'].");
		
		marker = new google.maps.Marker({
			  position:myLatLng,
			  map:map,
			  title:".$row['nombre'].",
			  //icon: image,
			  animation: google.maps.Animation.DROP
			  });
		
		google.maps.event.addListener(marker, 'click', (function(marker) {
          return function() {
            infowindow.setContent(".$row['nombre'].");
            infowindow.open(map, marker);
          }
        })(marker));
		

			
}//fin mostrar

// errores de navegacion
 function errores(error){
	 
	 switch(error.code) {
			
        case error.PERMISSION_DENIED:
            alertify.alert('Oops! No has aceptado compartir tu posición.');
            break;
        case error.POSITION_UNAVAILABLE:
            alertify.alert('Oops! No se puede obtener la posición actual.');
            break;
        case error.TIMEOUT:
            alertify.alert('Oops! Hemos superado el tiempo de espera.');
            break;
        case error.UNKNOWN_ERROR:
            alertify.alert('Oops! Algo ha salido mal.');
            break;
    }
			
}
}//function onload

	</script>"
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

<br><br><br><br>

<div class="container">

	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Centro</h3>
	  </div>

	  	

	  <div class="panel-body">

	    <div class="row">
		  <div class="col-md-7">
		  	<table class="table table-striped table-hover">				
				<tbody>
					<tr>
						<td>
						<label>Nombre: </label><?php echo $row['nombre'];?>
						</td>
					</tr>
					<tr>
						<td>
						<label>Direccion: </label><?php echo $row['direccion'];?>
						</td>
					</tr>
					<tr>
						<td>
						<label>Tel Local: </label><?php if (empty($row['telefono_local'])){}else{echo $row['telefono_local'];}?>
						</td>
					</tr>
					<tr>
						<td>
						<label>Tel Cel: </label><?php if (empty($row['telefono_Cel'])){}else{echo $row['telefono_Cel'];}?>
						</td>
					</tr>
					<tr>
						<td>
						<label>Latitud: </label><?php echo $row['latitud'];?>
						</td>
					</tr>
					<tr>
						<td>
						<label>Longitud: </label><?php echo $row['longitud'];?>
						</td>
					</tr>
					<tr>
						<td>
						<label>Descripcion: </label><?php echo $row['descrip'];?>
						</td>
					</tr>
				</tbody>
			</table>
		  </div>
		  
		  <div class="col-md-5"  id="map_canvas">
		   	
		  </div>

		</div>
	  </div>
	</div>
	

</div>

<?php 
	
	}

 ?>