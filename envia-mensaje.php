 <!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<title>envia cotizacion</title>
</head>
<body>
	<?php 
 

 
 $N = $_POST['n'];
 $TEL = $_POST['tel'];
 $E = $_POST['e'];
 $MSG = $_POST['msg'];
  
 $dest = "informes@mcweb.pe"; 
 
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
 
$cuerpo .= "Mensaje: ".$MSG."<br/>";
 
$cuerpo .= ' 
<br/>
<table width="600" border="0">
  <tr>
    <td width="32">&nbsp;</td>
    <th width="111" style="
    /* font-size: 20px; */
    color: blue;
">Foto del Libro</th>
    
    <th width="319"><strong>TITULO</strong></th>
    <td width="32">&nbsp;</td>
    <td width="32">&nbsp;</td>
    <td width="34">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> </td>
    <th> </th>
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


	echo "<br>Tu pedido se ha realizado satisfactoriamente. ";
 
	echo '
	 
		
				<a href="http://grijleimport.com/" >Continuar</a>
	';
	
 
	
	
 
?>
</body>
</html>

