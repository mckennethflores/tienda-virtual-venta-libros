<?php
	$mensaje = $_POST['mensaje'];
	$mensaje.= "\n--------------------\n";
	$mensaje.= "\nDe: ".$_POST['nombre'];
	$mensaje.= "\nE-mail: ".$_POST['email'];

	$destino= "informes@mcweb.pe";
	$remitente = $_POST['email'];
	$asunto = "Mensaje enviado por: ".$_POST['nombre'];
	mail($destino,$asunto,$mensaje,"FROM: $remitente");
	//el mensaje que se mostrara al confirmar el envio
	echo "Mensaje enviado. gracias por contactarse.";
?>


