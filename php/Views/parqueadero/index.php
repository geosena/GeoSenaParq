<?php 
	use Models\session as session;
	//session::destroy();
	if (session::getSession('usuario') <> '') {
		echo "Usuario de session: ".session::getSession('usuario');		
	}

?>
<div class="container">

	<div class="jumbotron">
        <h1>GeoCeet</h1>	          
    </div>

	<section class="formulario">
		
		<form class="form-signin" action="" method="POST" enctype="multipart/form-data">		
	        <h2 class="form-signin-heading">Bienvenido</h2>
	        <label for="inputEmail" class="sr-only">Usuario</label>
	        <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
	        
	        <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresa</button>
	    </form>							
		
	</section>
</div>	