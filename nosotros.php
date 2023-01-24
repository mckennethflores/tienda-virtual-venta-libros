<?php 
session_start();
 $titulo = "Nosotros - GRIJLEY EIRL ";

 $nosotros = "active";

include('plantilla.php'); 



 ?>
 <?php 

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
			$ECHO ="Bienvenido: ".$_SESSION['usuario_activo'] ."<br/>";	
		}else{
			$ECHO= "<script> alert('el usuario no existe');</script>";
		} 
	}
}else{
	if(strlen($_SESSION['usuario_activo'])>0){
		$ECHO= "Bienvenido: ".$_SESSION['usuario_activo'];	
		$ECHO= " <a href='php/destruir.php' style='color: #f39c12;' >Cerrar sesion</a>";	
		
	}
}

?> 	
 

	<div class="container">
		  <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			
			 <?php include("embed_cate.php"); ?>
			
			
				 
			</div>

			    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

			        <div class="row">

			        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			            	<div class="cont-miga">

			              		<a href="http://grijleimport.com/">Inicio</a> &gt; Nosotros		            	</div>

			         	</div>

			        </div>

			        

			        <div style="margin-bottom: 50px;" class="sombra clearfix">

					   <div style="margin: 10px; line-height: 25px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 detalle bg_blanco">

			         <h2>Quienes Somos</h2><br>
<p>Somos una Empresa con mas de 20 años de experiencia en la venta de libros de derecho,
  contamos con los mejores libros de derecho en todo el Perú</p>
 

<!--<img src="img/imagen-nosotros.jpg" alt="Smiley face" height="150" width="675">-->

 


  </div>

			        </div>

			    </div>

			</div>

		</div>