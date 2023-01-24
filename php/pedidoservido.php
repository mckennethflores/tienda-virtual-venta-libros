 
 <?php
 include('../conexion.php'); 
$conexion = mysqli_connect($sv,$us,$ps,$db);

 
mysqli_set_charset($conexion,"utf8");
$peticion = " UPDATE pedidos SET estado=1 WHERE id = '".$_GET['id']."'";
$resultado = mysqli_query($conexion,$peticion);

 
mysqli_close($conexion);
 ?>
<script>
window.location = "../admin/pedidos.php";
</script>




