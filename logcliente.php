<?php
session_start();
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}

if(!isset($_SESSION['ss_ini'])){
	echo "<script language='javascript'>"; 				
	echo "location.href='index.php';";
	echo "</script>";
	return;
}
include('plantilla.php'); 
include('conexion.php');
 
$cont=0;
$conexion = mysqli_connect($sv,$us,$ps,$db);
 
if(strlen($_SESSION['usuario_activo'])==0){
	$peticion  = "SELECT * FROM clientes WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'";
}else{
	$peticion  = "SELECT * FROM clientes WHERE id = ".$_SESSION['usuario_activo_id'];
}

$resultado = mysqli_query($conexion,$peticion);
$count = mysqli_num_rows($resultado);
while($fila = mysqli_fetch_array($resultado)){ 
	$cont++;      
	$_SESSION['usuario'] = $fila['id'];
}

if($cont > 0){ 
$peticion  = "INSERT INTO pedidos  VALUES (NULL,".$_SESSION['usuario'].",'".date('U')."','0','".$_SESSION['moneda']."')";
$resultado    = mysqli_query($conexion,$peticion);

$peticion = "SELECT * FROM pedidos WHERE idcliente = '".$_SESSION['usuario']."' ORDER BY fecha DESC LIMIT 1";
$resultado    = mysqli_query($conexion,$peticion);
while($fila = mysqli_fetch_array($resultado)){   
	$_SESSION['idpedido'] = $fila['id'];

}

$TOTAL = 0;
for($i =0; $i< $_SESSION['contador'];$i++){	

$TOTAL = $TOTAL + ($_SESSION['cantidad'][$i] * $_SESSION['precio'][$i]);

 
	$peticion = "INSERT INTO lineaspedido VALUES ".
	"(NULL,".$_SESSION['idpedido'].",".$_SESSION['producto'][$i].",".
	$_SESSION['cantidad'][$i].",'".$_SESSION['tapa'][$i]."',".$_SESSION['precio'][$i].")";
	
	 
	$resultado = mysqli_query($conexion, $peticion);
	$numerosesion = $_SESSION['idpedido'];
	$peticion = "SELECT * FROM productos WHERE prod_id=".$_SESSION['producto'][$i];
	 
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){   
		$prod_stock = $fila['prod_stock'];	
		$peticiondos = "UPDATE productos SET prod_stock = ".($prod_stock - $_SESSION['cantidad'][$i])." WHERE prod_id=".$_SESSION['producto'][$i];
 
		$resultadodos = mysqli_query($conexion, $peticiondos);	
	} 	
 }
// HASTA AQUI ESTA BIEN 
 
  echo '
  
  <div id="primary" class="content-area" style=" margin-top: 20px; font-size: 18px;">
              
<article id="post-7" class="post-7 page type-page status-publish hentry">

    <div class="entry-content">
                <div class="content-inner clearfix">
            <h2 class="post-title" style="
   
    font-size: 25px;
    font-family: arial;
    background: #94dc23;
    color: white;
    border-radius: 10px;
    padding: 10px;
">Orden recibida !</h2>
                        <div class="content-page">
                <div class="woocommerce">
	
		<p class="woocommerce-thankyou-order-received">Gracias. Tu orden ha sido recibida.</p>

		<ul class="woocommerce-thankyou-order-details order_details">
			<li class="order">
				Numero de Orden:  			
				
				
					<strong> '.$numerosesion.'</strong>
			</li>
			<li class="date">
				Fecha:				<strong>
				
				
				';
$peticion = "SELECT * FROM `pedidos` WHERE id = $numerosesion";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
 echo ' '.date("M d Y H:i:s",$fila['fecha']).'';
 $V_FECHA = date("M d Y H:i:s",$fila['fecha']);
} 			
 $_M="S/.";
if($_SESSION['moneda']=="D"){
	$_M="$";
}
 
				 echo '
			</strong>
			</li>
			<li class="total2">
				Total:	 	
				<strong><span class="amount">
				
				
				  '.$_M.' '.$TOTAL.'
				</span></strong>
			</li>
						 
					</ul>
		<div class="clear"></div>

	
	<p>
</p>
<h2 style="
    color: red;
    font-size: 25px;
	font-family: arial;
">Nuestros datos bancarios</h2>
 
<h3 style="
    font-weight: bold;
    font-family: arial;
">CUENTA SUELDO - BANCO DE CREDITO</h3>

NUMERO DE CUENTA SOLES:<div  style="font-size: 45px;" > 191 150 2738 070</strong></div>
NUMERO DE CUENTA DOLARES:<div  style="font-size: 45px;" > 191 155 2520 129</strong></div>
 

<div><img src="img/bcp.jpg" width="400"></div>

<br/> 
NUMERO DE CUENTA :<div  style="font-size: 45px;" > 191 155 2520 129</strong></div>
<div><img src="img/scotiabank.jpg" width="400"></div>
<div> </div><br/>  
Tipo de Cuenta:  <strong>CUENTA SUELDO</strong> 

 <ul class="order_details bacs_details">
</ul>	 
 


	<header><h2 style="
    color: red;
    font-size: 25px;
	font-family: arial;
">Detalles del cliente</h2></header>

<table class="shop_table customer_details">
	
			<tbody>
			<tr>
			
			';

$peticion = "SELECT * FROM clientes WHERE id= ".$_SESSION['usuario'];
$resultado = mysqli_query($conexion, $peticion);
 
while($fila = mysqli_fetch_array($resultado)) {
	?>
	<th>Nombre:</th>
			<td> <?php
 echo  $fila['nombre'].' '.$fila['apellidos'];
		 
 			
			?></td>
			</tr>
			<tr>
			<th>Email:</th>
			<td>
	<?php
 echo $EMAIL_UP = $fila['email'];
		 
 			
			?>
			</td>
		</tr>
	
			<tr>
			<th>Telefono: </th>
		 <td>
	<?php 	echo  $fila['telefono']; ?> </td></tr> 
    <tr><th>Celular1: </th><td><?php 	echo $fila['celular1']; ?> </td></tr> 
	<tr><th>Celular2: </th><td><?php 	echo $fila['celular2']; ?> </td></tr> 	
 	
	</tbody></table>


<header class="title">
	<h3 style="
    color: red;
    font-size: 25px;
    font-weight: bold;
	font-family: arial;
">Dirección de Envio</h3>
</header>
<address>
	<br>Dirección: <?php 	echo  $fila['direccion']; ?> <br>
		Pais: <?php 	echo  $fila['pais']; ?> 
        <br>Referencia: <?php 	echo  $fila['referencia']; ?><br> <?php 	echo  $fila['distrito']; ?><br> </address>
<?php } echo '

</div>        </div>
              </div>
    </div><!-- .entry-content -->
<!--
    <footer class="entry-footer">
       
</article><!-- #post-## --></div>';

		//
		
		$idpedido = $numerosesion;
		//saco el correo del cliente

		$dest = $EMAIL_UP . ', '; 
		$dest .= 'informes@frsystem.com.pe';
		
 
		
		// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
		$headers = 'From: Pagina Web Grijle Import S.A.\r\n';  
		//$headers = "From: ".$N ."<".$E.">\r\n"; 
		$headers .= "X-Mailer: PHP5\n";
		$headers .= 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		
		// Aqui definimos el asunto y armamos el cuerpo del mensaje
		$asunto = "Pedidos Grijle Import";

		$cuerpo .= ' 
		<br/>
		<table width="603" border="1">
		<tr>
		<td colspan="11" align="center"><strong>GRACIAS POR COMPRAR SU LIBRO</strong></td>
		</tr>
		<tr>
		<td width="151"><strong>N° PEDIDO:</strong></td>
		<td colspan="2">'.$idpedido.'</td>
		<td colspan="3"><strong>ESTADO DEL PEDIDO:</strong></td>
		<td colspan="5">EN PROCESO</td>
		</tr>
		<tr>
		<td><strong>FECHA:</strong></td>
		<td colspan="2">'.$V_FECHA.'</td>
		<td colspan="8">&nbsp;</td>
		</tr>
		<tr>
		<td><strong>ITEMS:</strong></td>
		<td colspan="10">&nbsp;</td>
		</tr>
		'; 
		//
		$DATOS="";
		$peticion2 = "SELECT * FROM vis_detalle_pedidos WHERE id = ".$idpedido;
		$resultado2 = mysqli_query($conexion, $peticion2);
		$TOTAL = 0;
		$TOTAL2 = 0;
		while($fila2 = mysqli_fetch_array($resultado2)) {
			$PRECIO =$fila2['precio'];
			$CANT= $fila2['unidades'];
			$TOTAL = $PRECIO * $CANT;
			$TOTAL2 = $TOTAL2 + $TOTAL;
			$DATOS= $DATOS. ' 
			<tr>
			<td><strong> ->'.$fila2['prod_nom'].'</strong></td>
			<td width="84">Precio: </td><td width="21">'.$fila2['precio'] .'</td>
			<td width="58">Cantidad</td><td width="40">'.$fila2['unidades'] .'</td>
			<td width="52">Moneda</td><td width="9">'.$fila2['moneda'].'</td>
			<td width="31">Tapa</td><td width="9">'.$fila2['tapa'].'</td>
			<td width="48">Importe</td><td width="30">'.$TOTAL.'</td>
			</tr>
			';
		}

		$cuerpo = $cuerpo.$DATOS.' 
		<tr>
			<td>&nbsp;</td>
			<td colspan="4" rowspan="4">&nbsp;</td>
			<td colspan="6" rowspan="2">&nbsp;</td>
		  </tr>
		  <tr>
		   <td style="
			COLOR: RED;
		"><strong>NOTA:</strong></td>
		  </tr>
		  <tr>
			<td><strong>S: SOLES</strong></td>
			<td colspan="5" rowspan="2"><strong>COSTO TOTAL:</strong></td>
			<td rowspan="2"><strong>'.$TOTAL2.'</strong></td>
		  </tr>
		  <tr>
			<td><strong>D: DOLARES</strong></td>
		  </tr>
		</table>
		
		
		  ';
		 //  

 
	// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:	
 
		mail($dest,$asunto,$cuerpo,$headers); //ENVIAR! 	 
		echo "<br>Tu pedido se ha realizado satisfactoriamente. ";
		echo '<a href="http://grijleimport.com/" >Continuar</a>';		
	 //
	  
 $TOTAL = 0;	
	  echo "<script>
		var pagina='index.php'
		function redireccionar() 
		{
		location.href=pagina
		} 
		//setTimeout ('redireccionar()', 10000);
		
		</script> ";
		
$_SESSION['contador'] =0;	
		
 }else{
	echo "El usuario no existe";
	echo "<script>
	var pagina='http://grijleimport.com/confirmar.php'
	function redireccionar() 
	{
	location.href=pagina
	} 
	 setTimeout ('redireccionar()', 2000);
	
	</script> ";
}
mysqli_close($conexion);	
  ?>