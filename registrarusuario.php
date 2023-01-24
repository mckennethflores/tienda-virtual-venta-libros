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

	 <link rel="stylesheet" href="css/bootstrap.min.css">

	  <link rel="stylesheet" href="css/signin.css">

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
            <li><a href="http://grijleimport.com/iniciarsesion.php"  >Iniciar Sesion</a></li>
            <li><a href="http://grijleimport.com/" >Salir</a></li>
          </ul>

        </div>
      </div>
    </div>
   <div class="container">
<BR/><BR/><BR/>
  
<form class="form-signin " method="post" action="registrosolo.php" style="max-width: 500px;">
    
    <h2 class="form-signin-heading">REGISTRAR USUARIO*</h2>
 
 <input  type="text" name="reg_nombre"class="form-control"  id="reg_nombre" placeholder="NOMBRE*" required>
 <input  type="text" name="reg_apellidos" id="reg_apellidos" placeholder="APELLIDOS" >
 <input type="text" name="reg_email" id="reg_email" placeholder="EMAIL*" required>
 <input type="text" name="reg_usuario" id="reg_usuario" placeholder="USUARIO*" required>
 	<input type="password" name="reg_contrasena" id="reg_contrasena" placeholder="CONTRASEÑA*" required>
	<input type="password" name="reg_rcontrasena" id="reg_rcontrasena" placeholder="REPETIR CONTRASEÑA*" required>
	<input type="text" name="reg_celular1" id="reg_celular1" placeholder="CELULAR 1*" required>
	<input type="text" name="reg_celular2" id="reg_celular2" placeholder="CELULAR 2" >
		<input type="text" name="reg_telefono" id="reg_telefono" placeholder="TELÉFONO" >
		<input type="text" name="reg_pais" id="reg_pais" placeholder="PAÍS*" required>
			<input type="text" name="reg_direccion" id="reg_direccion" placeholder="DIRECCIÓN*" required>
        </br>
		<input type="text" name="reg_referencia" id="reg_referencia" placeholder="REFERENCIA" >
		
       	   
       
 <button class="btn btn-lg btn-primary btn-block" value="log" name="log" type="submit" style="
    max-width: 92%;
">INGRESAR</button>
		<center><H4 style="color:red; "><?php echo $MENSAJE; ?></H4></center>	

      </form>
	  
  

    </div> <!-- /container -->



</div>

</body>

</html>