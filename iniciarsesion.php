<?php 
session_start();
if(!isset($_SESSION['ss_ini'])){$_SESSION['ss_ini'] = 1;}
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}

include('conexion.php'); 
if($_POST){
	$u=$_POST['usuario'];
	$c=$_POST['contrasena'];
	if($u==null)$u="";
	if($c==null)$c="";
	if(strlen($u)>0 && strlen($c)>0){
		$contadorX = 0;
		$conexion = mysqli_connect($sv,$us,$ps,$db);
		// // // mysqli_set_charset($conexion, "utf8");
		$peticion  = "SELECT * FROM clientes WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'";
		$resultado = mysqli_query($conexion, $peticion);
		$contadorX = mysqli_num_rows($resultado);
		while($fila = mysqli_fetch_array($resultado)){ 
			$contadorX++;      
			$_SESSION['usuario_activo'] = $fila['nombre'];
			$_SESSION['usuario_activo_id'] = $fila['id'];
		 
		}
		if($contadorX > 0){	 
			echo "<script> alert('Registro Exitoso');</script>";
		 
				 echo "
				 <script>  
	
	// var pagina='http://localhost:85/grijle/index.php'
	var pagina='http://grijleimport.com/index.php'

	function redireccionar() 

	{location.href=pagina} 

	setTimeout ('redireccionar()', 500);

	</script>

	"; 
		}else{
			echo "<script> alert('el usuario no existe');</script>";
		} 
	}
}else{
	if(strlen($_SESSION['usuario_activo'])>0){
		echo "Bienvenido: ".$_SESSION['usuario_activo']." ";	
		echo " <a href='php/destruir.php' style='color: #f39c12;' >Cerrar sesion</a>";	
		
	}
}

?> 


<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>GRIJLE - BIENVENIDO A GRIJLE IMPORT S.A.</title>

	 <link rel="stylesheet" href="../css/bootstrap.min.css">

	  <link rel="stylesheet" href="../css/signin.css">

	 <!-- Fuente -->

<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

<!-- /Fuente -->

<!-- /Codigo carrusel-->

 <script src="../js/bootstrap.min.js"> </script>

   <!-- /Codigo carrusel-->

</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">GRIJLE IMPORT </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
         

          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://grijleimport.com/registrarusuario.php"  >Crear Cuenta</a></li>
            <li><a href="http://grijleimport.com/" >Salir</a></li>
          </ul>

        </div>
      </div>
</div>

 
	

   <div class="container">
<BR/><BR/><BR/>
      <form class="form-signin " method="post" action="iniciarsesion.php">

        <h2 class="form-signin-heading">BIENVENIDO A GRIJLE IMPORT S.A. </h2>

 <input type="text"  name="usuario" id="usuario" class="form-control" placeholder="USUARIO" required>
        </br>

       	  <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="CONTRASEÑA"required>
<div style="margin-top: 10px; " id="nivo-lightbox-demo">
											<a style="color: #FF5722;" href="res_pass/" data-lightbox-type="iframe" class="turq popup-indice">¿Olvidó su contraseña?</a>
											</div>
		  </br>
        <button class="btn btn-lg btn-primary btn-block" value="log" name="log" type="submit">INGRESAR</button>
 
		<center><H4 style="color:red; "><?php echo $MENSAJE; ?></H4></center>	

      </form>

    </div> <!-- /container -->



</div>

</body>

</html>