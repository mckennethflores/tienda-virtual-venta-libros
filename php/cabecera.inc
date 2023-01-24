<?php 
session_start();
if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}
?>
<!doctype html>
<html lang="es">
	<head>
		<title>Tienda</title>
		<link rel=Stylesheet href="css/movil.css" media='screen and (min-width: 1px) and (max-width: 800px)'>
		<link rel=Stylesheet href="css/pcmac.css" media='screen and (min-width: 801px) and (max-width: 4000px)'>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/codigo.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<header>
				<a href="index.php"><h1>Tienda</h1></a>
				<h2>Subtítulo de la tienda</h2>
			</header>
			<section>
			<div id="carritoarriba" style="background:black; color:white;">
			 
			</div>
		