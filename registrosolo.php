<?php

if(!empty($_POST)){

	if(isset($_POST["reg_nombre"])
	 
     &&isset($_POST["reg_email"])
	 &&isset($_POST["reg_usuario"])
	 &&isset($_POST["reg_contrasena"]) 
	 &&isset($_POST["reg_rcontrasena"]) 
	 &&isset($_POST["reg_celular1"])

	 &&isset($_POST["reg_pais"])
	 &&isset($_POST["reg_direccion"])	
  
	 )
	 {
		if(
		$_POST["reg_nombre"]!=""&&
		$_POST["reg_email"]!=""&&
		$_POST["reg_usuario"]!=""&&
		$_POST["reg_contrasena"]!=""&&
		$_POST["reg_celular1"]!=""&&
		
		
		$_POST["reg_pais"]!=""&&
		$_POST["reg_direccion"]!=""&&
		
		$_POST["reg_contrasena"]==$_POST["reg_rcontrasena"]
		  
		 ){
			include "conexionregistro.php";
			
			$found=false;
			$sql1= "select * from clientes where usuario=\"$_POST[reg_usuario]\" or contrasena=\"$_POST[reg_contrasena]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../index.php';</script>";
			}
	 		$sql = "insert into clientes (nombre, apellidos, email ,usuario, contrasena, celular1, celular2, telefono, pais ,direccion, referencia ) VALUES (
			\"$_POST[reg_nombre]\",
			\"$_POST[reg_apellidos]\",
			\"$_POST[reg_email]\",
			\"$_POST[reg_usuario]\",
			\"$_POST[reg_contrasena]\",
			\"$_POST[reg_celular1]\",
			\"$_POST[reg_celular2]\",
			\"$_POST[reg_telefono]\",
			\"$_POST[reg_pais]\",
			\"$_POST[reg_direccion]\",
			\"$_POST[reg_referencia]\"						
			)";
 	 
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");
				window.location='http://grijleimport.com/';</script>";
			}
		}
	}
}



?>