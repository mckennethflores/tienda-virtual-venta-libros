<?php
include('conexion.php'); 
 
$conexion=mysqli_connect($sv,$us,$ps,$db) or
    die("Problemas con la conexión");

mysqli_query($conexion,"insert into clientes(nombre,email) values 
                       ('$_REQUEST[txtNom]','$_REQUEST[txtDsc]')")
  or die("Problemas en el select ".mysqli_error($conexion));
 
mysqli_close($conexion);

 echo '<script> alert("El usuario se ha subscrito correctamente!.");  </script>';

 
