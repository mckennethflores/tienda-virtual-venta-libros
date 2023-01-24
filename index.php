<?php 
session_start();
error_reporting(0);
if(!isset($_SESSION['ss_ini'])){$_SESSION['ss_ini'] = 1;}
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}

if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}

// inicializas la secion moneda = s
if(!isset($_SESSION['moneda'])){$_SESSION['moneda'] = "S";}
include('conexion.php'); 
 $titulo = "Inicio - GRIJLEY EIRL";
 //$inicio = "active"; 
// chapas el value del combo
$NM=$_GET[sel_tcam];
if($NM==null){
	$NM=$_SESSION['moneda'];
}
$MON=$NM;

$cn = mysqli_connect($sv,$us,$ps,$db);
//mysqli_set_charset($cn, "utf8");
$pt  = "SELECT valor, dato FROM valores WHERE dato = 'tipo_cambio'";
$rs = mysqli_query($cn, $pt);
while($fila = mysqli_fetch_array($rs)){
	$TIP_CAM = $fila['valor'];
}
mysqli_close($cn);	
// VERIFICAR SI SE CAMBIO DE MONEDA

if($_SESSION['contador']>0){
	if($_SESSION['moneda']!=$MON){
		for($i =0; $i< $_SESSION['contador'];$i++){	
			if($MON=="S"){
// pre_o precio original
				$_SESSION['precio'][$i] = $_SESSION['pre_o'][$i];		
			}else{
				$_SESSION['precio'][$i] = number_format($_SESSION['pre_o'][$i] / $TIP_CAM,2,'.','');						
			}
		}
	}		
}
$_SESSION['moneda']=$MON;	

// TIPO DE CAMBIOS FIN

  $conexion = mysqli_connect($sv,$us,$ps,$db);
  //  mysqli_set_charset($conexion, "utf8");
  
   // $peticion  = "select * from  vis_productos WHERE prod_stock > 0 LIMIT 6 ";
    $peticion  = "SELECT
	productos.prod_id,
	productos.prod_nom,
	productos.prod_aut,
	productos.prod_pais_id,
	productos.prod_edi,
	productos.prod_format,
	productos.prod_pagi,
	productos.prod_isbn,
	productos.prod_pre1,
	productos.prod_pre2,
	productos.prod_indi,
	productos.prod_resu,
	productos.prod_stock,
	productos.prod_acti_id,
	productos.prod_foto,
	productos.prod_cate_id,
	productos.prod_scate_id,
	productos.prod_edito_id,
	productos.prod_year
	FROM
	productos
	LIMIT 5
	";
	$resultado = mysqli_query($conexion,$peticion);
	$count  =   mysqli_num_rows($resultado);
	$slides='';
	$Indicators='';
	$counter=0;

    while($row=mysqli_fetch_array($resultado))
    { 

        $prod_nom = $row['prod_nom'];
        $prod_aut = $row['prod_aut'];
        $prod_foto = $row['prod_foto'];
		$prod_id = $row['prod_id'];
        if($counter == 0)
        {
            $Indicators .='<li data-target="#quote-carousel" data-slide-to="'.$counter.'" class="active"></li>';
            $slides .= '
			<div class="item active">
			 <div class="img">
				<a href="   detalle-producto.php?id='.$prod_id.'"> 
				<img src="img/foto-destacada/'.$prod_foto.'"  alt="'.$prod_nom.'" />
				</a>
			 </div>
			 <div class="block-oferta">
                <div class="tit-ofeta">
				<a href="   detalle-producto.php?id='.$prod_id.'"> 
				<span>'.$prod_nom.'</span>
				 </a>
			    </div>
			    <div class="aut-ofeta">	
			    <a href="   detalle-producto.php?id='.$prod_id.'"> 
				<span>'.$prod_aut.' </span>
				</a>
			    </div>
             </div>
	    	</div>';
        }
        else
        {
            $Indicators .='<li data-target="#quote-carousel" data-slide-to="'.$counter.'" ></li>';
            $slides .= '
			<div class="item ">
			 <div class="img">
				<a href="   detalle-producto.php?id='.$prod_id.'"> 
				<img src="img/foto-destacada/'.$prod_foto.'"  alt="'.$prod_nom.'" />
				</a>
			 </div>
			 <div class="block-oferta">
                <div class="tit-ofeta">
				<a href="   detalle-producto.php?id='.$prod_id.'"> 
				<span>'.$prod_nom.'</span>
				 </a>
			    </div>
			    <div class="aut-ofeta">	
			    <a href="   detalle-producto.php?id='.$prod_id.'"> 
				<span>'.$prod_aut.' </span>
				</a>
			    </div>
             </div>
	    	</div>';
        }
        $counter++;
    }

	
 /*slider*/

$peticion2  = "SELECT * FROM slider order by id";
$resultado2    = mysqli_query($conexion,$peticion2);
$count2  =   mysqli_num_rows($resultado2);
$slides2='';
$Indicators2='';
$counter2=0;

    while($row2=mysqli_fetch_array($resultado2))
    { 

        $title = $row2['titulo'];
        $desc = $row2['descripcion'];
        $image = $row2['imagen'];
        if($counter2 == 0)
        {
            $Indicators2 .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter2.'" class="active"></li>';
            $slides2 .= '<div class="item active">
            <img src="img/'.$image.'" width="1140" height="285" alt="'.$title.'" />
            <div class="carousel-caption">
              
                   
            </div>
          </div>';

        }
        else
        {
            $Indicators2 .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter2.'"></li>';
            $slides2 .= '<div class="item">
            <img src="img/'.$image.'" width="1140" height="285" alt="'.$title.'" />
            <div class="carousel-caption">
             
               
            </div>
          </div>';
        }
        $counter2++;
    }

 /* /slider*/
// BOletines
 


 
 ?>






 <!--de la plantilla-->
 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?> </title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<meta property="og:url"           content="http://grijleimport.com/detalle-producto.php?id=59#.V7K9FU3hC2w" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Editora y Libreria Juridica" />
	<meta property="og:description"   content="libros de derecho, libros juridicos, libreria juridica, virtual online, ediciones juridicas, articulos de derecho gratis, articulos juridicos gratis, constitucion gratis, constitucion politica gratis,constitucion politica del peru gratis, normas legales, legislacion, jurisprudencia gratis, codigo civil gratis, codigo civil comentado, codigo penal comentado, codigo procesal civil comentado, ley de procedimiento administrativo general comentado, ley general de sociedades, ley de titulos valores, delivery gratis, descargas gratuitas, gratis, delivery, novedades 2012, artículos, autores,venta, abogados, tributario, derecho, editorial, distribuidora, registral, penal, civil, código procesal gratis, libreria online,libreria virtual,judicial,societario,nacionales,importados, legislación, doctrina, jurisprudencia gratis, leyes, código gratis, constitucion politica del peru, constitución comentada, comentarios, administrativo, los especialistas en libros de derecho" />
	<meta property="og:image"         content="http://grijleimport.com/img/logo-grijle.png" />	
	
	
	 <link rel="shortcut icon" href="img/favicon.ico">
	 
	 
<!-- Carrito de Compras-->	  
		<script type="text/javascript" src="js/jquerycarrito.js"></script>
		<script type="text/javascript" src="js/codigocarrito.js"></script>
<!-- /Carrito de Compras-->	  
	  
<!-- Fuente -->
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!-- /Fuente -->

<!--  icomoon -->
<link rel="stylesheet" href="css/icomoon.css">
<!-- / icomoon -->

  <!-- Codigo acordeon-->

  <link rel="stylesheet" type="text/css" href="acordeon/jquery-ui-1.8.23.custom.css" />
  <link rel="stylesheet" type="text/css" href="acordeon/estilosacordeon.css" />
  <!-- /Codigo acordeon-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Codigo carrusel-->
  <link href="carrusel/estilo-carousel.css"   type="text/css"rel="stylesheet" />
  <link rel="stylesheet" href="carrusel/feature-carousel.css"  />
  <script type="text/javascript" src="js/jquery.min.1.9.1.js"></script>

  <script src="js/bootstrap.min.js"> </script>
   <!-- /Codigo carrusel-->


   <!-- Productos -->
   <script src="js/jquery.validate.min.js"></script>
   <script src="js/jquery.royalslider.min.js"></script>

   <!-- /Productos-->

   <!--  estile slt producto -->
   <link rel="stylesheet" href="css/estile-stl.css">
   <!-- / estile slt producto -->

   <!-- java tcambio-->
   <script>
	function F1(ID,PR,CT,PO){
		document.getElementById("T_PRO").value=PO;
		document.getElementById("T_PRE").value=PR;
		document.getElementById("T_TIP").value=CT;				
		document.getElementById("cmd"+ID).click();
	}
	</script>
   <!-- /java tcambio-->
   
<script>
function ocultar(){
document.getElementById('ver').style.visibility = 'hidden';}


function mostrar(a){
	var a=document.getElementById("DL"+a).innerHTML;
	document.getElementById('ver').style.visibility = 'visible';
	document.getElementById('LIBRO').innerHTML=a;
}
</script>

</head>
 <body>
  <!--<div class="container">  <div class="col-md-offset-10 col-md-12"> Bienvenido: <?php ?></div></div>-->
<input name="T_PRE" id="T_PRE" type="hidden" value="">
<input name="T_PRO" id="T_PRO" type="hidden" value="">
<input name="T_TIP" id="T_TIP" type="hidden" value="">
<input name="T_MON" id="T_MON" type="hidden" value="<?php echo $MON;?>">
	<div  id="ver" style="    width: 75%;
		height: 506px;
		background:black;
		position: fixed;
		top: 25%;
		left: 25%;
		margin-left: -100px;
		margin-top: -100px;
		z-index:99999;   display: block; visibility:hidden" >

	<input type="button" value="Cerrar" onclick="ocultar()" style=" float: right;" >
			<div class="lightcaja col-xs-12 col-sm-12 col-md-12 col-lg-8 bg_blanco clearfix indice">
				<div id="LIBRO" class="">
				 
					</div>
			</div>
	</div>

 
<!--header-->
<div class="container   espacio_head">       
<div class="row">
<div class=" col-xs-12 col-xs13 col-md-6  ">
<div class="logo-header">
<img class="foto-logo" src="img/logo-grijle.png" width="100%" height="95" alt="GRIJLEY "  usemap="#Map">
<map name="Map">
<area shape="rect" coords="14,-1,159,94" href="index.php" alt="GRIJLE DERECHO">
</map>
<div>

<!--Bienvenido: Mckenneth-->
</div>            
            </div>
            </div>
      
        <div style="font-size: 12px;  padding-top: 14px;" 
        class="col-xs-6  col-md-3 ">       
            <div class="direccion-header">
              Informes y consultas:

   
      <div style="color: rgb(219, 82, 37); letter-spacing: 1px;" class="telefonos">(511) 3210258 / (511)  4271881 </div>
              <div class="direccion_responsive" style="
    letter-spacing: .5px;
">

              Dirección: Jr. Azangáro 1077 Lima Cercado

             <!-- mentejuridica@hotmail.com --> info@grijleimport.com
			   
              </div>
            </div>
        </div>

      

        <div class="col-xs-6 col-md-3  ">


            <div class="carrito-header" style="font-size: 12px;  padding-top: 14px;" >
              <div class="tittle-carrito">
                
               <a href="php/parrillaproducto.php">
			   
			   
			
			   
		<a href='php/parrillaproducto.php'>   
<div style="
font-size: 15px;
font-weight: bold;
color: #f39c12;
"> Carrito de Compras</div></a>	
			   
			   </a>
               
			   
			   
			   
               <div id="carritoarriba"  style="background: #18bc9c;color:white;padding-top: 5px;padding-bottom:5px;padding-left: 10px;padding-right: 10px;border-radius: 10px;display: inline-flex;margin-bottom: 5px;">
            		Vacio
                </div>
               </div>

              <div class="description"> 
              </div>
<form name="fbusca" action="index.php"  id="fbusca">
T.C.: <?php echo number_format($TIP_CAM,2,'.','');?> / S/. Soles        

<select style="font-size:12px;font-family:verdana, helvetica, arial;color: #ffffff;background-color: #2c3e50;border-color:#990000;border-top: #353D60 1px solid;border-bottom: #2c3e50 1px solid;border-left: #353D60 1px solid;border-right: #2c3e50 1px solid;"
 size="1" name="sel_tcam" id="sel_tcam" onchange="document.getElementById('fbusca').submit()()">
<?php				
if($MON=="S"){
?>
    <option value="S"  selected="selected">S/. Soles</option>
    <option value="D">U$. Dolares</option>
<?php
}else{
?>
    <option value="S"  >S/. Soles</option>
    <option value="D" selected="selected">U$. Dolares</option>
<?php
}
?>
         
</select>
</form>
            </div>
    
	

<?php 
 
if($_POST){
	$u=$_POST['usuario'];
	$c=$_POST['contrasena'];
	if($u==null)$u="";
	if($c==null)$c="";
	if(strlen($u)>0 && strlen($c)>0){
		$contadorX = 0;
		$conexion = mysqli_connect($sv,$us,$ps,$db);
	
		$peticion  = "SELECT * FROM clientes WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'";
		$resultado = mysqli_query($conexion, $peticion);
		$contadorX = mysqli_num_rows($resultado);
		while($fila = mysqli_fetch_array($resultado)){ 
			$contadorX++;      
			$_SESSION['usuario_activo'] = $fila['nombre'];
			$_SESSION['usuario_activo_id'] = $fila['id'];
		 
		}
		if($contadorX > 0){	 
			echo "Bienvenido: ".$_SESSION['usuario_activo']." ";	
			echo " <a href='php/destruir.php' style='color: #f39c12;' >Cerrar sesion</a>";	
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
        </div>

   </div>
</div>
 <!--/header-->
 <!--nav-->
 <nav class="navbar navbar-default">



  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">INICIO <span class="sr-only">(current)</span></a></li>
        <li class="<?php /*echo $nosotros;*/ ?>"><a href="nosotros.php">QUIÉNES SOMOS</a></li>
        <li class="<?php /*echo $fpago;*/ ?>"><a href="formasdepago.php">FORMAS DE PAGO</a></li>

        <li class="<?php /*echo $pgrijley;*/ ?><?php/* echo $pcatotros;*/ ?>"  class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            CATÁLOGO <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="<?php/* echo $pgrijley;*/ ?>"   > <a href="libros-grijle-import.php">GRIJLE IMPORT S.A.</a></li>
           
 
            <li class="divider"></li>
            <li class="<?php/* echo $pcatotros;*/ ?>"><a href="libros-otras-editoriales.php">OTRAS EDITORIALES</a></li>
          </ul>
        </li>
		<li class=" <?php /*echo $pcontact;*/ ?>   " ><a href="contacto.php">CONTÁCTENOS</a></li>
      </ul>
	  
		
<?php 
 
	
	if(strlen($_SESSION['usuario_activo'])>0){
	
	echo '<ul class="nav navbar-nav navbar-right"  style="display: none;"> 
	<li ><a class="btnnuevo" href="#" style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px;margin-right: 15px;/*background: #f39c12;*/text-align: center;font-size: 16px;"><i class="fa fa-user"></i> Registrarse</a></li> 
<li><a class="btnnuevo" href="#"  style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px; margin-right: 15px;text-align: center;font-size: 16px;"><i class="fa fa-sign-in"></i> Iniciar Sesión</a></li> 
</ul>';}else {
	
echo ' <ul class="nav navbar-nav navbar-right"> 
	<li ><a class="btnnuevo" href="http://grijleimport.com/registrarusuario.php" style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px;margin-right: 15px;/*background: #f39c12;*/text-align: center;font-size: 16px;"><i class="fa fa-user"></i> Registrarse</a></li> 
<li><a class="btnnuevo" href="http://grijleimport.com/iniciarsesion.php"  style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px; margin-right: 15px;text-align: center;font-size: 16px;"><i class="fa fa-sign-in"></i> Iniciar Sesión</a></li> 
</ul> ';
	
}	

?>
  
    </div>
  </div>
</nav>
 <!--/nav-->	
 <!-- /de la plantilla-->

 <!-- Slide -->
    <div class="container">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			 <?php echo $Indicators2; ?>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			<?php echo $slides2; ?>  
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>	
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
    </div>
 <!-- /Slide -->
 
 <!-- Buscar -->
	<div class="container">
       <form style="text-align: center;" class="navbar-form" action="busqueda.php" method="get">
        <div class="form-group">
          
		  
		  <input type="text" placeholder="TÍTULO" class="form-control" style="text-transform:uppercase; font-size: 17px;" name="T"  onkeyup="javascript:this.value=this.value.toUpperCase();">

        </div>
        <div class="form-group">
		<input type="text" placeholder="EDITORIAL" class="form-control" style="text-transform:uppercase; font-size: 17px;"  name="E"   onkeyup="javascript:this.value=this.value.toUpperCase();">		  
      </div>
        <div class="form-group">

		<input type="text" placeholder="AUTOR" class="form-control" style="text-transform:uppercase; font-size: 17px;"  name="A"   onkeyup="javascript:this.value=this.value.toUpperCase();">		  

        </div>
      <button style="font-size: 17px;" type="submit" class="btn btn-success">Buscar en GRIJLE</button>
      </form>
	</div>
 <!-- /Buscar-->
	<br/>
<!-- Container 1-->
	<div class="container">
		  <div class="row">
			<div class="col-md-4">
				<!-- Acordeon      -->
				<div id="areas_tematicas" class="ui-accordion ui-widget ui-helper-reset ui-accordion-icons" role="tablist">
	 	
 	
             <?php
								$conexion = mysqli_connect($sv,$us,$ps,$db);
							//	// // // mysqli_set_charset($conexion, "utf8");
								$peticion = "SELECT * FROM categorias";
								$resultado = mysqli_query($conexion, $peticion);

								while($fila = mysqli_fetch_array($resultado)){
									?>
                      <div id="tematica">
						<h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-state-active ui-corner-top" role="tab" aria-expanded="true" aria-selected="true" tabindex="0">
						<span class="ui-icon ui-icon-triangle-1-s"></span>
						<?php echo "<a href='#' tabindex='-1'>".$fila['cate_nom']."</a>"; ?></a></h3>
						<ul class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" role="tabpanel">
						<?php $peticion2 = 'SELECT * FROM scategorias WHERE scate_cate_id = '.$fila['cate_id'];
										$resultado2 = mysqli_query($conexion, $peticion2);
										while($fila2 = mysqli_fetch_array($resultado2))
										{?>
						
							<li><?php echo '<a href="subcategoria.php?id='.$fila2['scate_id'].'" class="link_at">'.$fila2['scate_nom'].'</a>';
										}?></li>
									
						</ul>
					</div>                 
                                  
							 		<?php	
							 }
								mysqli_close($conexion);
								?>   

				</div>
				<!-- Acordeon-->
			</div>
		  
			<div class="col-md-8 ocultar">
		  <!--Carrusel-->
			<div id="page_wrapper"> 
				<div id="header_wrapper"><div id="banner_principal"><div id="banner_centro"><div id="wrapper"><div class="slider-wrapper theme-default"></div></div></div></div></div>
				<div id="content-wrapper">
				  <div id="work">
					<div id="work-der">              
						<div id="contenido">   
						<div id="ultima_publi"> 
								<script type="text/javascript">
								 $(document).ready(function() {
								var carousel = $("#carousel").featureCarousel({
								 
								});

								$("#but_prev").click(function () {
								carousel.prev();
								});
								$("#but_pause").click(function () {
								carousel.pause();
								});
								$("#but_start").click(function () {
								carousel.start();
								});
								$("#but_next").click(function () {
								carousel.next();
								});
								});
								</script>
						<div id="titulo-carru_cat">
							 <!--Titulo Ultimas Publicaciones-->
							 <div id="titulo-carru_cat" style="background:#2c3e50 url(acordeon/ui-bg_highlight-soft_65_e07c00_1x100.png) 50% 50% repeat-x; padding: 5px 0;  width: 100%;">
							  <span class="title_catalogo_carr">&Uacute;ltimas <b>Publicaciones</b></span>
							</div>
							 <!--/Titulo Ultimas Publicaciones-->
							 <!--Carrusel contenedor-->		 
							 <div class="carousel-container">
								<div id="carousel">
								<?php
								$conexion = mysqli_connect($sv,$us,$ps,$db);
								// // // mysqli_set_charset($conexion, "utf8");
								$peticion = "SELECT
								productos.prod_id,
								productos.prod_nom,
								productos.prod_aut,
								productos.prod_pais_id,
								productos.prod_edi,
								productos.prod_format,
								productos.prod_pagi,
								productos.prod_isbn,
								productos.prod_pre1,
								productos.prod_pre2,
								productos.prod_indi,
								productos.prod_resu,
								productos.prod_stock,
								productos.prod_acti_id,
								productos.prod_foto,
								productos.prod_cate_id,
								productos.prod_scate_id,
								productos.prod_edito_id,
								productos.prod_year
								FROM
								productos
								LIMIT 5
								";
								$resultado = mysqli_query($conexion, $peticion);

								while($fila = mysqli_fetch_array($resultado)){
								echo " <div class='carousel-feature'> ";
										//fila de la foto
										 
										echo "<a href='detalle-producto.php?id=".$fila['prod_id']."'><img width='235' height='295' class='carousel-image' src='img/foto-destacada/".$fila['prod_foto']."'></a>";
										 
										// fin fila de la foto
										echo "<div class=carousel-caption'>
												<div class='titulo_carru'><a href='detalle-producto.php?id=".$fila['prod_id']."' class='titulo_libr'> ".$fila['prod_nom']."</a></div>";
										echo "  <div class='titulo_libr'>Autor: <a href='detalle-producto.php?id=".$fila['prod_id']."' >  ".$fila['prod_aut']."</a></div>";
										echo "</div>
									  </div>";
						 }
								mysqli_close($conexion);
								?>     
								</div>
							<div id="carousel-left"></div>
							<div id="carousel-right"> </div>
							</div> 
							<!--/ Carrusel contenedor-->	
							<br />
						 </div>
						</div>
					</div>
					</div>
				  </div>
				</div>
			</div> 
		  <!--/Carrusel-->
			</div>
		</div>     
	
<!-- / Container 1-->



 



  
  <!-- Container 3-->
	<div class="container top17">
		<div class="row">
			<!-- Formulario ingresar y subscribirse-->		
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="row">
				<!-- Los mas Vendidos-->	
					<div class="col-xs-12 col-sm-12 ofertas">
						<div class="col-md-12 col-lg-12 altura10 blanco fondo1">
						<a href="#" style="color: white; font-weight: bold;">LOS MÁS VENDIDOS<i class="fa fa-tag pull-right"></i></a>
						</div>
						<div class= "sombra clearfix">
							<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
							  <div class="row">
								<div class="carousel slide" data-ride="carousel" id="quote-carousel">           
								  <!-- Carousel Slides / Quotes -->
								  
								  <div class="carousel-inner">
								  <?php echo $slides; ?> 
								  </div>
											
								  <!-- Bottom Carousel Indicators -->
								  <ol class="carousel-indicators">
								  <?php echo $Indicators; ?>                  
								  </ol>

								</div> 
							  </div>                       
							</div>
						</div>
							<script type="text/javascript">
							  // When the DOM is ready, run this function
							  
							  $(document).ready(function() {
								//Set the carousel options
								$('#quote-carousel').carousel({
								  pause: true,
								  interval: 104000,
								});
							  });
							</script>         
					</div>        
				<!-- / Los mas Vendidos-->	
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sombra clearfix login">
				<!-- Validacion de contraseña formulario de inicio-->	
					 <script>
							$().ready(function() {
							// validate signup form on keyup and submit
							$("#login").validate({
							  rules: {
								usmail: {
								  required: true,
								  email: true
								},
								uscontrasena: "required"               
							  },
							  messages: {
								usmail: "Debe ingresar su correo",
								uscontrasena: "Cotraseña incorrecta"
							  }
							});
							$("#registra").validate({      
							  rules: {
								nnombre: "required",
								nmail: {
								  required: true,
								  email: true
								},        
								ncontrasena: {
								  required: true,
								  minlength: 5
								},
								nrcontrasena: {
								  required: true,          
								  equalTo: "#ncontrasena"
								}             
							  },
							  messages: {
								nnombre: "Debe ingresar su nombre",
								nmail: "Debe ingresar su correo",        
								ncontrasena: {
								  required: "Debe ingresar su contraseÃ±a",
								  minlength: "Debe ser mayor a 5 carÃ¡cteres"
								},
								nrcontrasena: {       
								  required: "Debe ingresar su contraseÃ±a",   
								  equalTo: "Las contraseÃ±as no coinciden"
								}
							  }
							});
						  });
						</script>
				<!-- /Validacion de contraseña formulario de inicio-->	
				<!-- Ingresar y subscribirse-->		
					 <div class="clearfix">
							  <ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#home" role="tab" data-toggle="tab"><span><i class="fa fa-lock"></i> Suscribase</span></a></li>
							    
							  </ul>
							  <!-- Tab panes -->
							  <div class="tab-content">
								<div class="tab-pane fade in active" id="home">
								  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="row top17">
									  <form name="login" id="login" method="POST" action="suscribirse.php">
									  <input class="form-control" style="
    background-color: rgba(158, 158, 158, 0.75);  width:100px;" readonly value="" type="hidden" name="txtId" />
										<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
							 
										<input type="text"  name="txtNom"   class="form-control" placeholder="Nombre" required>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
										  <input type="email" name="txtDsc"   class="form-control" placeholder="Email"required>
										</div>
										
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
												<button type="submit" class="btn btn-search btn-warning navbar-btn">INGRESAR</button>
										</div>
										
									  </form>
								  
									</div>
								  </div>
								</div>
								  
							  </div>
					  
							  <script type="text/javascript">
								$('#myTab a').click(function (e) {
								  e.preventDefault()
								  $(this).tab('show')
								})
							  </script>
						</div>
				<!-- /Ingresar y subscribirse-->		
					</div>
				</div>
			</div>
			<!-- /Formulario ingresar y subscribirse-->	
			<!-- Titulo Ultimas Publicaciones Bloque de 3-->			
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" style=" margin-top: -10px !important;">
				<!-- Titulo Ultimas Publicaciones-->		
				<div class="row">
					<div class="col-xs-3 col-sm-12 col-md-12 col-lg-12 subtitulos bot17 centrar-publi">
					<h2>Ultimas Publicaciones de GRIJLE <em>Ediciones</em><a href="libros-grijle-import.php"><SPAN STYLE="color: white; font-size: 12pt; font-weight: bold;">Ver mas</span></a></h2> 
					</div>
				</div>
				<!-- /Titulo Ultimas Publicaciones-->
				
				<div class="owl-carousel bot17">
					<?php
					  $conexion = mysqli_connect($sv,$us,$ps,$db);
					  // // // mysqli_set_charset($conexion, "utf8");
					  $peticion = "SELECT
					  productos.prod_id,
					  productos.prod_nom,
					  productos.prod_aut,
					  productos.prod_pais_id,
					  productos.prod_edi,
					  productos.prod_format,
					  productos.prod_pagi,
					  productos.prod_isbn,
					  productos.prod_pre1,
					  productos.prod_pre2,
					  productos.prod_indi,
					  productos.prod_resu,
					  productos.prod_stock,
					  productos.prod_acti_id,
					  productos.prod_foto,
					  productos.prod_cate_id,
					  productos.prod_scate_id,
					  productos.prod_edito_id,
					  productos.prod_year
					  FROM
					  productos
					  LIMIT 10
					  ";
					  $resultado = mysqli_query($conexion, $peticion);

					/*  Titulo Query mysql Ultimas Publi Boque de 3 */		  
					  while($fila = mysqli_fetch_array($resultado)){
					  $MND="S/.";	
					  $PRE_1=$fila['prod_pre1'];	
					  $PRE_2=$fila['prod_pre2'];	
					  if($MON=="D"){
						  if($PRE_1>=0){
							  $PRE_1=number_format($PRE_1 / $TIP_CAM,2,'.','');
						  }
						  if($PRE_2>=0){
							  $PRE_2=number_format($PRE_2 / $TIP_CAM,2,'.','');
						  }
						  $MND="$";
					  }
					  echo '<div class="item clearfix">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 libro-item">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="libro-img img">';
											   $peticion2 = "SELECT
											   productos.prod_id,
											   productos.prod_nom,
											   productos.prod_aut,
											   productos.prod_pais_id,
											   productos.prod_edi,
											   productos.prod_format,
											   productos.prod_pagi,
											   productos.prod_isbn,
											   productos.prod_pre1,
											   productos.prod_pre2,
											   productos.prod_indi,
											   productos.prod_resu,
											   productos.prod_stock,
											   productos.prod_acti_id,
											   productos.prod_foto,
											   productos.prod_cate_id,
											   productos.prod_scate_id,
											   productos.prod_edito_id,
											   productos.prod_year
											   FROM
											   productos
											   WHERE prod_id = ".$fila['prod_id']." LIMIT 1 ";
											   $resultado2 = mysqli_query($conexion, $peticion2);
												  while($fila2 = mysqli_fetch_array($resultado2)){
												  echo "<a  href='detalle-producto.php?id=".$fila['prod_id']."'> 
												  <img width='130' height='178' class='carousel-image tamanoImg' src='img/foto-destacada/".$fila2['prod_foto']."'></a>";
												  }
											   echo '			    
											</div>                    
										</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 link-libro">
											<a href="detalle-producto.php?id='.$fila['prod_id'].'"><span class="tit-libro clearfix"><h4><i class="fa fa-book" ></i> '.$fila['prod_nom'].'</h4></span></a>';	
									echo '  </div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 link-prod_aut">
										<a href="detalle-producto.php?id='.$fila['prod_id'].'">
										<span class="tit-libro"><h6><i class="fa fa-user" ></i> '.$fila['prod_aut'].'</h6></span></a>';	
								  echo '</div><div>';
								  if($PRE_1>=0){
								  echo "<button onclick=\"F1(".$fila['prod_id'].",".$PRE_1.",'S',".$fila['prod_pre1'].");\" 
								  		 style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Rustica: ".$MND." ".$PRE_1." Comprar</button>";
								  }else{
								  echo "<button  style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Rustica: NO DISPONIBLE</button>";	  
								  }
								  if($PRE_2>=0){
								  echo "<button onclick=\"F1(".$fila['prod_id'].",".$PRE_2.",'D',".$fila['prod_pre2'].");\" 
								  		 style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Dura: ".$MND." ".$PRE_2." Comprar</button>";
								  }else{
								  echo "<button  style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Dura:  NO DISPONIBLE</button>";	  
								  }
										
								echo '</div>';
								
									echo '<button id="cmd'.$fila['prod_id'].'"  style="display: none;" class="botoncompra" value="'.$fila['prod_id'].'" >Añadir al carro</button>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 foot-item clearfix">
					 
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">						
												<div id="nivo-lightbox-demo">
											
											
	 <input style=" width: 100%; margin-top: 10px;" class="btn btn-info popup-indice"  type="button" value="Ver Indice" ';
					echo " onclick=\"mostrar(".$fila['prod_id'].")\" >";
echo "<div id=\"DL".$fila['prod_id']."\" style=\"visibility:hidden;display:none\">".$fila['prod_indi']."</div>";
												echo '</div>		
											</div>
										</div>
								   </div>
							
								</div>        
							</div>';		
												
					 }
					 mysqli_close($conexion);
					 /* /Titulo Query mysql Ultimas Publi Boque de 3*/		
					?>  
				</div>
				<script src="js/owl.carousel.js"></script>
				<!-- Script de movimiento-->			
				<script>

					  var owl = $('.owl-carousel');      
					 $('.owl-carousel').owlCarousel({
					rtl:false,
					loop:true,
					margin:24,
					nav:true,
					autoplay:true,
					autoplayTimeout:4000,
					dots:false,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1000:{
							items:3
						}
					}
				})
				</script>      
				<!-- /Script de movimiento-->	 
		   </div>
			<!-- /Titulo Ultimas Publicaciones Bloque de 3-->		
		</div>
    </div> 
    <!-- /Container 3-->  
 




	<div class="container top17">

	<link href="css/custom.css" rel="stylesheet">

	  <!-- producto 2-->
		<!-- Galeria de productos de 4 Items--> 
		   <div class="row">   
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subtitulos bot17">
					<h2>Últimas Publicaciones de otras editoriales <a href="catalogo-otras-editoriales.html"><SPAN STYLE="color: white; font-size: 12pt; font-weight: bold;">Ver mas</span></a></h2>
				  </div>
				</div>
				<div class="owl-carousel bot17">
					<?php
					  $conexion = mysqli_connect($sv,$us,$ps,$db);
					  // // // mysqli_set_charset($conexion, "utf8");
					  $peticion = "SELECT
					  productos.prod_id,
					  productos.prod_nom,
					  productos.prod_aut,
					  productos.prod_pais_id,
					  productos.prod_edi,
					  productos.prod_format,
					  productos.prod_pagi,
					  productos.prod_isbn,
					  productos.prod_pre1,
					  productos.prod_pre2,
					  productos.prod_indi,
					  productos.prod_resu,
					  productos.prod_stock,
					  productos.prod_acti_id,
					  productos.prod_foto,
					  productos.prod_cate_id,
					  productos.prod_scate_id,
					  productos.prod_edito_id,
					  productos.prod_year
					  FROM
					  productos
					  LIMIT 5
					  ";
					  $resultado = mysqli_query($conexion, $peticion);

					/*  Titulo Query mysql Ultimas Publi Boque de 3 */		  
					  while($fila = mysqli_fetch_array($resultado)){
					  $MND="S/.";	
					  $PRE_1=$fila['prod_pre1'];	
					  $PRE_2=$fila['prod_pre2'];	
					  if($MON=="D"){
						  if($PRE_1>=0){
							  $PRE_1=number_format($PRE_1 / $TIP_CAM,2,'.','');
						  }
						  if($PRE_2>=0){
							  $PRE_2=number_format($PRE_2 / $TIP_CAM,2,'.','');
						  }
						  $MND="$";
					  }
					  echo '<div class="item clearfix">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 libro-item">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="libro-img img">';
											   $peticion2 = "SELECT
											   productos.prod_id,
											   productos.prod_nom,
											   productos.prod_aut,
											   productos.prod_pais_id,
											   productos.prod_edi,
											   productos.prod_format,
											   productos.prod_pagi,
											   productos.prod_isbn,
											   productos.prod_pre1,
											   productos.prod_pre2,
											   productos.prod_indi,
											   productos.prod_resu,
											   productos.prod_stock,
											   productos.prod_acti_id,
											   productos.prod_foto,
											   productos.prod_cate_id,
											   productos.prod_scate_id,
											   productos.prod_edito_id,
											   productos.prod_year
											   FROM
											   productos
											   WHERE prod_id = ".$fila['prod_id']." LIMIT 1";
											   $resultado2 = mysqli_query($conexion, $peticion2);
												  while($fila2 = mysqli_fetch_array($resultado2)){
												  echo "<a  href='detalle-producto.php?id=".$fila['prod_id']."'> 
												  <img width='130' height='178' class='carousel-image tamanoImg' src='img/foto-destacada/".$fila2['prod_foto']."'></a>";
												  }
											   echo '			    
											</div>                    
										</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 link-libro">
											<a href="detalle-producto.php?id='.$fila['prod_id'].'"><span class="tit-libro clearfix"><h4><i class="fa fa-book" ></i> '.$fila['prod_nom'].'</h4></span></a>';	
									echo '  </div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 link-prod_aut">
										<a href="detalle-producto.php?id='.$fila['prod_id'].'">
										<span class="tit-libro"><h6><i class="fa fa-user" ></i> '.$fila['prod_aut'].'</h6></span></a>';	
								  echo '</div><div>';
								  if($PRE_1>=0){
								  echo "<button onclick=\"F1(".$fila['prod_id'].",".$PRE_1.",'S',".$fila['prod_pre1'].");\" 
								  		 style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Rustica: ".$MND." ".$PRE_1." Comprar</button>";
								  }else{
								  echo "<button  style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Rustica: NO DISPONIBLE</button>";	  
								  }
								  if($PRE_2>=0){
								  echo "<button onclick=\"F1(".$fila['prod_id'].",".$PRE_2.",'D',".$fila['prod_pre2'].");\" 
								  		 style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Dura: ".$MND." ".$PRE_2." Comprar</button>";
								  }else{
								  echo "<button  style=\"margin-bottom:5px; font-size:12.5px;width: 80% !important;display: inline-block;margin-left: 10%;margin-right: 10%;\" >Precio Tapa Dura:  NO DISPONIBLE</button>";	  
								  }
										
								echo '</div>';
								
									echo '<button id="cmd'.$fila['prod_id'].'"  style="display: none;" class="botoncompra" value="'.$fila['prod_id'].'" >Añadir al carro</button>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 foot-item clearfix">
					 
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">						
												<div id="nivo-lightbox-demo">
											
											
	 <input style=" width: 100%; margin-top: 10px;" class="btn btn-info popup-indice"  type="button" value="Ver Indice" ';
					echo " onclick=\"mostrar(".$fila['prod_id'].")\" >";
echo "<div id=\"DL".$fila['prod_id']."\" style=\"visibility:hidden;display:none\">".$fila['prod_indi']."</div>";
												echo '</div>		
											</div>
										</div>
								   </div>
							
								</div>        
							</div>';		
												
					 }
					 mysqli_close($conexion);
					 /* /Titulo Query mysql Ultimas Publi Boque de 3*/		
					?>  
				</div>
 
			  <script src="js/owl.carousel.js"></script>
			  <script>
				  var owl = $('.owl-carousel');      
				 $('.owl-carousel').owlCarousel({
				rtl:false,
				loop:true,
				margin:24,
				nav:true,
				autoplay:true,
				autoplayTimeout:4000,
				dots:false,
				/*navText: [
				  "<i class='icon-chevron-left icon-white'></i>",
				  "<i class='icon-chevron-right icon-white'></i>"
				  ],*/
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:4
					}
				}   
			})
			  </script>
			   <script src="js/jquery.magnific-popup.min.js"></script>
				<script type="text/javascript">
					  $(document).ready(function() {
						$('.popup-indice, .popup-vimeo, .popup-gmaps').magnificPopup({
						  disableOn: 700,
						  type: 'iframe',
						  mainClass: 'mfp-fade',
						  removalDelay: 160,
						  preloader: false,
						  fixedContentPos: false
						});
					  });
				</script>  
			</div>
		   </div>
		 <!-- /Galeria de productos de 4 Items--> 
	  <!-- /producto 2 -->
	<!--plantilla footer -->
	   <!-- Codigo acordeon-->
		  <script type="text/javascript" src="carrusel/jquery-1.8.2.js"  ></script>
		  <script type="text/javascript" src="acordeon/jquery-ui-1.8.23.custom.min.js" ></script>
		  <script type="text/javascript">
					  $(document).on("ready",function(){
				 
					  $("#areas_tematicas ")
				.accordion({ header: "h3",  clearStyle:true, heightStyle:'content', autoHeight:false,active:0 ,});
					  });
		  </script>
		  <!-- /Codigo acordeon-->
		<!--  carrusel-->
		<script src="carrusel/jquery.featureCarousel.min.js"  > </script>
		<!-- / carrusel-->
		<center><div id="container">
		<a class="btn btn-warning popup-indice" target="_blank" href="https://issuu.com/mckennethflores/docs/catalogo_2014_pdf/3?e=0" style=" font-size: 16px;
		">Ver Nuestro Catalogo en Linea</a></div></center><br/>	
	</div>

</div>
	<!-- footer -->
    <div class="footer ">
		<div class="container container-fluid">
		  <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center">
			  <a href="index.php"><img src="img/logo-footer.png" alt="Legales Ediciones"></a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
				<h3 class="blanco">INFORMACIÓN</h3>
				<div class="menu-footer">
				  <ul>
				  <li><a href="informacion-formas_de_pago-1.html" target="_self">Formas de pago</a></li>
				  </ul>
				</div>
				<div class="tarjetas">
				  <ul>
					<li><a href="https://www.paypal.com/pe/home" target="_blank"><img src="img/paypal.png" alt="PayPal"></a></li>
					<li><a href="https://www.multimerchantvisanet.com/formularioweb/formulariopago.asp?codtienda=523085302" target="_blank"><img src="img/visa.png" alt="Visa"></a></li>
					<li><a href="https://www.visanet.com.pe/promovbv/bancos.html"><img src="img/by-visa.png"></a>    </li>
					<li><a href="#"><img src="img/mastercard.png" alt="mastercard"></a></li>
					<li><a href="https://www.westernunion.com.pe/WUCOMWEB/countryHomeAction.do?method=load" target="_blank"><img src="img/wenster-union.png" alt="mastercard"></a></li>
				  </ul>              
				</div>
	<br>
	<br>
	Agréganos a:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/pages/editora-juridica-grijle-import-sa/111843135553405?sk=wall" target="_blank"><img src="img/icono-facebook.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/you-tube-logo.png">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			  <h3 class="blanco">VENTAS</h3>
			  <ul class="datos">
				<li class="direccion">Direccion: Jr. Azangáro 1077 Lima Cercado</li>
				<li class="fono" style="line-height: 14px; font-size: 12px;"> TELEFONO: 321-0258 - 427-1881, WhatsApp: 919067331 - 947243562 </li>
				<li class="mail"><a href="mailto:mentejuridica@hotmail.com / skype: mentejuridica@hotmail.com  ">mentejuridica@hotmail.com </a></li>
			  </ul>
			</div>
		 </div>
		</div>
    <div class="chatbot-ws">
        <a target="_blank" href="https://api.whatsapp.com/send?phone=51947243562&amp;text=Quiero%20más%20información!"><img src="../img/whatsapp-logo.png" alt="Logo WhatsAPP"> </a>       
    </div>
		<div class="creditos text-center blanco">
		  © Copyright GRIJLE  -  Derechos Reservados  <?php echo date('Y'); ?> 
		</div>
    </div>
    <!-- ManyChat -->
<script src="//widget.manychat.com/142615625909032.js" async="async"></script>
<!-- /footer -->
</body>
</html>
<!--/plantilla footer -->