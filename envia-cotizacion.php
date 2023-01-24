 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Envia cotizacion</title>
</head>
<body>
	<?php 
 

 $idlibro = $_POST['idlibro'];
 $FOTO = $_POST['foto'];
 $T = $_POST['t'];
 $N = $_POST['n'];
 $TEL = $_POST['tel'];
 $E = $_POST['e'];
 $MSG = $_POST['msg'];
  
 //$dest = "info@grijleimport.com"; 
 $dest = "informes@frsystem.com.pe"; 
// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
 
$headers = "From: ".$N ."<".$E.">\r\n"; 
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Aqui definimos el asunto y armamos el cuerpo del mensaje
$asunto = "COTIZACION PRODUCTO";
$cuerpo = "Nombre: ".$N."<br>";
$cuerpo .= "Email: ".$E."<br>";
$cuerpo .= "Telefono: ".$TEL."<br>";
$cuerpo .= "Libro: ".$T."<br>";
$cuerpo .= "Mensaje: ".$MSG."<br/>";
 
$cuerpo .= ' 
<br/>
<table width="600" border="0">
  <tr>
    <td width="32">&nbsp;</td>
    <th width="111" style="
    /* font-size: 20px; 
    color: blue;*/
">Foto del Libro</th>
    
    <th width="319"><strong>TITULO</strong></th>
    <td width="32">&nbsp;</td>
    <td width="32">&nbsp;</td>
    <td width="34">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src=\"http://grijleimport.com/img/'.$FOTO.' \" width=\"100\"></td>
    <th><h2>'.$T.'</h2></th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <th>Cliente:</th>
    <th><h2>'.$N.'</h2></th>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th>Email:</th>
    <th><h2>'.$E.'</h2></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <th>Telefono:</th>
    <th><h2>'.$TEL.'</h2></th>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <th>Mensaje:</th>
    <th><h2>'.$MSG.'</h2></th>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

';
 
 
 
 
// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:

    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!


	echo "<br> Tu solicitud se ha enviado satisfactoriamente. ";
 
	echo '
	 
		
				<a href="http://grijleimport.com/" >Continuar</a>
	';
	
 
	
	
 
?>
</body>
</html>

