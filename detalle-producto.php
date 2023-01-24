<?php 
session_start();

if(!isset($_SESSION['ss_ini'])){$_SESSION['ss_ini'] = 1;}
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}

if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}
// inicializas la secion moneda = s
if(!isset($_SESSION['moneda'])){$_SESSION['moneda'] = "S";}

include('conexion.php'); 
 $gprod_foto = "Detalle Producto - GRIJLEY EIRL ";

 // chapas el value del combo
$NM=$_GET[sel_tcam];
if($NM==null){
	$NM=$_SESSION['moneda'];
}
$MON=$NM;

$cn = mysqli_connect($sv,$us,$ps,$db);
mysqli_set_charset($cn, "utf8");
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
// include('plantilla.php'); 

?>
 
  <!--de la plantilla-->
 <!DOCTYPE html>
 <html lang="en"><head>
	<meta charset="UTF-8">
	<title><?php echo $gprod_foto; ?> </title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="shortcut icon" href="img/favicon.ico">
	 
	<meta property="og:url"           content="http://grijleimport.com/detalle-producto.php?id=59#.V7K9FU3hC2w" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Editora y Libreria Juridica" />
	<meta property="og:description"   content="libros de derecho, libros juridicos, libreria juridica, virtual online, ediciones juridicas, articulos de derecho gratis, articulos juridicos gratis, constitucion gratis, constitucion politica gratis,constitucion politica del peru gratis, normas legales, legislacion, jurisprudencia gratis, codigo civil gratis, codigo civil comentado, codigo penal comentado, codigo procesal civil comentado, ley de procedimiento administrativo general comentado, ley general de sociedades, ley de titulos valores, delivery gratis, descargas gratuitas, gratis, delivery, novedades 2012, artículos, autores,venta, abogados, tributario, derecho, editorial, distribuidora, registral, penal, civil, código procesal gratis, libreria online,libreria virtual,judicial,societario,nacionales,importados, legislación, doctrina, jurisprudencia gratis, leyes, código gratis, constitucion politica del peru, constitución comentada, comentarios, administrativo, los especialistas en libros de derecho" />
	<meta property="og:image"         content="http://grijleimport.com/img/logo-grijle.png" /> 
	 
     
 

	
	<link href="css/custom.css" rel="stylesheet">
 	 
		
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

  <!-- Codigo carrusel-->
  <link href="carrusel/estilo-carousel.css"   type="text/css"rel="stylesheet" />
  <link rel="stylesheet" href="carrusel/feature-carousel.css"  />
  <script type="text/javascript" src="js/jquery.min.1.9.1.js"></script>

  <script src="js/bootstrap.min.js"> </script>
   <!-- /Codigo carrusel-->
<link rel="stylesheet" href="css/font-awesome.min.css">

   <!-- Productos -->
   <script src="js/jquery.validate.min.js"></script>
   <script src="js/jquery.royalslider.min.js"></script>

   <!-- /Productos-->

   <!--  estile slt producto -->
   <link rel="stylesheet" href="css/estile-stl.css">
   <!-- / estile slt producto -->

   <!-- java tcambio-->
   <script>
	function F1(id,PR,CT,PO){
		document.getElementById("T_PRO").value=PO;
		document.getElementById("T_PRE").value=PR;
		document.getElementById("T_TIP").value=CT;				
		document.getElementById("cmd"+id).click();
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

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

 
 
<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>

 

 <style type="text/css">
 *{font-size:0px;}
  .size15{
	 font-size:15px;
 }.size13{
	 font-size: 14px !important;
	 color: #1f1f1f;
    text-decoration: none;
    font-weight: 700;
    font-size: 96%;
    letter-spacing: -0.4px;
 }
  </style>

</head>
<body >
<input name="T_PRE" id="T_PRE" type="hidden" value="">
<input name="T_PRO" id="T_PRO" type="hidden" value="">
<input name="T_TIP" id="T_TIP" type="hidden" value="">
<input name="T_MON" id="T_MON" type="hidden" value="<?php echo $MON;?>">
 <!--<div  id="fotozoom" style="    
width: 500px;
    height: 506px;
    background:black;
    position: fixed;
    top: 50px;
    left: 50px;
   
    display: block;
    z-index:999;  visibility:hidden;    " >
 
	 
</div>-->


 
 <!--header-->
 <div class="container">
       
     <div class="row">
            <div class=" col-xs-12 col-xs13 col-md-6  ">
            <div class="logo-header">
              <img class="foto-logo" src="img/logo-grijle.png" width="100%" height="95" alt="GRIJLEY "  usemap="#Map">
                <map name="Map">
                <area shape="rect" coords="21,-1,216,87" href="index.php" alt="GRIJLEY DERECHO">
              </map>
<div>

</div>
            </div>
            </div>
      
        <div style="font-size: 12px;  padding-top: 14px;" 
        class="col-xs-6  col-md-3 ">       
            <div class="direccion-header" style="font-size: 12px;  " >
              Informes y consultas:

   
            <div style="color: rgb(219, 82, 37);font-size: 12px; letter-spacing: 1px;" class="telefonos">(511) 3210258 / (511)  4271881 </div>
            <div  class="direccion_responsive" style="letter-spacing:.5px;font-size: 12px;">

              Direccion: Jr. Azangáro 1077 Lima Cercado
             <<!-- mentejuridica@hotmail.com --> info@grijleimport.com
 			 <a style="font-size: 12px;  " href="http://grijleimport.com/admin/"> Administrador</a>
            </div>
            </div>
        </div>

      

        <div class="col-xs-6 col-md-3  ">


            <div class="carrito-header" style="font-size: 12px;  padding-top: 14px;" >
              <div class="tittle-carrito" style=" font-size: 12px;" >
                
              
     <a href='php/parrillaproducto.php'>   
<div style="
font-size: 15px;
font-weight: bold;
color: #f39c12;
"> Carrito de Compras</div></a>	          
               <div id="carritoarriba" class="size15"  style="background: #18bc9c;color:white;padding-top: 5px;padding-bottom:5px;padding-left: 10px;padding-right: 10px;border-radius: 10px;display: inline-flex;margin-bottom: 5px;">
            		Vacio
                </div>
               </div>

              <div class="description"> 
              </div>
 <form name="fbusca" action="index.php"  id="fbusca"  style="
    font-size: 13px;
">
T.C.: <?php echo number_format($TIP_CAM,2,'.','');?> / S/. Soles        

<select disabled style="font-size:12px;font-family:verdana, helvetica, arial;color: #ffffff;background-color: #2c3e50;border-color:#990000;border-top: #353D60 1px solid;border-bottom: #2c3e50 1px solid;border-left: #353D60 1px solid;border-right: #2c3e50 1px solid;"
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
			echo "<p class='size15' >Bienvenido: ".$_SESSION['usuario_activo'] ."<br/></p>";	
		}else{
			echo "<script> alert('el usuario no existe');</script>";
		} 
	}
}else{
	if(strlen($_SESSION['usuario_activo'])>0){
		echo "<div class='size15' style='display: inline-block;'>Bienvenido: ".$_SESSION['usuario_activo']."</div>";	
		echo " <a class='size15' href='php/destruir.php' style='color: #f39c12;' >Cerrar sesion</a>";	
		
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
        <li class="active "><a class="size15" href="index.php">INICIO <span class="sr-only">(current)</span></a></li>
        <li class="<?php /*echo $nosotros;*/ ?>"><a  class="size15" href="nosotros.php">QUIENES SOMOS</a></li>
        <li class="<?php /*echo $fpago;*/ ?>"><a  class="size15" href="formasdepago.php">FORMAS DE PAGO</a></li>

        <li class="<?php /*echo $pgrijley;*/ ?><?php/* echo $pcatotros;*/ ?>"  class="dropdown">
          <a href="#" class="dropdown-toggle size15" data-toggle="dropdown" role="button" aria-expanded="false">
            CATÁLOGO <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="<?php/* echo $pgrijley;*/ ?>"   > <a  class="size15" href="libros-grijle-import.php">GRIJLE IMPORT S.A.</a></li>
           
 
            <li class="divider"></li>
            <li class="<?php/* echo $pcatotros;*/ ?>"><a  class="size15" href="libros-otras-editoriales.php">OTRAS EDITORIALES</a></li>
          </ul>
        </li>
		<li class=" <?php /*echo $pcontact;*/ ?>   " ><a  class="size15" href="contacto.php">CONTACTENOS</a></li>
      </ul>
 <?php 
 
	
	if(strlen($_SESSION['usuario_activo'])>0){
	
	echo '<ul class="nav navbar-nav navbar-right"  style="display: none;"> 
	<li ><a class="btnnuevo" href="#" style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px;margin-right: 15px;/*background: #f39c12;*/text-align: center;font-size: 16px;"><i class="fa fa-user"></i> Registrarse</a></li> 
<li><a class="btnnuevo" href="#"  style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px; margin-right: 15px;text-align: center;font-size: 16px;"><i class="fa fa-sign-in"></i> Iniciar Sesion</a></li> 
</ul>';}else {
	
echo ' <ul class="nav navbar-nav navbar-right"> 
	<li ><a class="btnnuevo" href="#" style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px;margin-right: 15px;/*background: #f39c12;*/text-align: center;font-size: 16px;"><i class="fa fa-user"></i> Registrarse</a></li> 
<li><a class="btnnuevo" href="http://grijleimport.com/iniciarsesion.php"  style="padding: 10px 10px 10px;border: 2px solid #f39c12;
/background: #f39c12; /margin-top: 8px;border-radius: 4px;margin-top: 8px;margin-left: 10px; margin-right: 15px;text-align: center;font-size: 16px;"><i class="fa fa-sign-in"></i> Iniciar Sesion</a></li> 
</ul> ';
	
}	

?>   
    </div>
  </div>
</nav>
 <!--/nav-->	
 <!-- /de la plantilla-->
 
 
 <!-- Buscar -->
	<div class="container">
       <form style="text-align: center;" class="navbar-form" action="busqueda.php" method="get">
        <div class="form-group">
          
		  
		  <input type="text" placeholder="TITULO" class="form-control" style="text-transform:uppercase; font-size: 17px;" name="T"  onkeyup="javascript:this.value=this.value.toUpperCase();">

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

 <div class="container">
<div class="col-sm-4">
        <!-- Acordeon-->
          

       <div id="areas_tematicas" class="ui-accordion ui-widget ui-helper-reset ui-accordion-icons" role="tablist">
	 	
 	
             <?php
								$conexion = mysqli_connect($sv,$us,$ps,$db);
							//	mysqli_set_charset($conexion, "utf8");
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
						
							<li><?php echo '<a  class="size13" href="subcategoria.php?id='.$fila2['scate_id'].'" class="link_at">'.$fila2['scate_nom'].'</a>';
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
	
	
	


	
	<div class="col-sm-8">
 

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		  
		 

            <div class="cont-miga size15"> 
			  <?php
			  $conexion = mysqli_connect($sv,$us,$ps,$db);
		  //    mysqli_set_charset($conexion, "utf8");
			  $peticion = "SELECT * FROM vis_productos WHERE prod_id = ".$_GET['id']." ";
              $resultado = mysqli_query($conexion, $peticion);	
			  while($fila = mysqli_fetch_array($resultado)){   ?>			
              <a class="size15 " href="index.php">Inicio</a> &gt;   <?php echo $fila['prod_nom'] ; ?>             
            </div>
          </div>
        </div>
		
        <div class="sombra clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 detalle bg_blanco">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 img-libro">
              <div class="img">
      <div class="container1">
<div class="preview col" style="
  
">
    <div class="app-figure" id="zoom-fig" style="
  
    float: left;
">
      <?php
					 //fila de la foto
				  $peticion2 = "SELECT * FROM gproductos WHERE gprod_prod_id = ".$fila['prod_id']." LIMIT 1 ";
					 $resultado2 = mysqli_query($conexion, $peticion2);
					 while($fila2 = mysqli_fetch_array($resultado2)){
					 echo " 
 <a id='Zoom-1' class='MagicZoom' title='".$fila2['gprod_nom']."'
            href='img/foto-galeria/".$fila2['gprod_foto']."'>
			
					 <img class='tamanoImg'  src='img/foto-galeria/".$fila2['gprod_foto']."?scale.height=400'>
					 </a> ";
					} 
					?>
         
        <div class="selectors">
		 <?php
					 //fila de la foto
				  $peticion2 = "SELECT * FROM gproductos WHERE gprod_prod_id = ".$fila['prod_id'];
					 $resultado2 = mysqli_query($conexion, $peticion2);
					 while($fila2 = mysqli_fetch_array($resultado2)){
					 echo " 
 <a
           style='
    width: 70px;
'    data-zoom-id='Zoom-1'
            href='img/foto-galeria/".$fila2['gprod_foto']."'
			data-image='img/".$fila2['gprod_foto']."?scale.height=400'
>
 

   <img srcset='img/foto-galeria/".$fila2['gprod_foto']."?scale.width=112 2x' src='img/foto-galeria/".$fila2['gprod_foto']."?scale.width=56'>
					 </a>
					 ";
					} 
					?>
  
           
           
          
        </div>
    </div>


</div>
</div>

<div id="code-to-copy"></div> 
             </div>
            </div>
            <div class="divisor hidden-md hidden-lg clearfix"></div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              <span class="titulos titulo-libro size15">
             <?php echo  $fila['prod_nom'] ; ?>
			  </span> 
              <div class="share">
                <!-- AddThis Button BEGIN -->
                <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-50675c94733fec69"><img src="http://s7.addthis.com/static/btn/v2/lg-share-es.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"></a>
                <script type="text/javascript" tabindex="1000">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50675c94733fec69"></script>
                <!-- AddThis Button END -->
              </div>
              <div class="det-libro"  style="
    line-height: 22px;
">
              
                <span class="size15 stl-gprod_foto">Autor:<strong>
				<a class="size15" href="#"><?php  echo  "<strong class='size15'>".$fila['prod_aut'];?></a></strong></span>
                <span  class="size15 stl-gprod_foto" >País:
				<?php echo  "<strong class='size15'>".$fila['pais_nom']."</strong>" ;?></span>  
				<span  class="size15 stl-gprod_foto" >Edición: 
				 <?php echo  "<strong class='size15'>".$fila['prod_edi']."</strong>" ;?> </span>
				 <span class="size15 stl-gprod_foto">Formato:
				<?php echo  "<strong class='size15'>".$fila['prod_format']."</strong>" ;?></span>	
				<span class="size15 stl-gprod_foto">Páginas: 
				<?php echo  "<strong class='size15'>".$fila['prod_pagi']."</strong>" ;?></span>
				 <span class="size15 stl-gprod_foto">ISBN: 
				 <?php echo  "<strong class='size15'>".$fila['prod_isbn']."</strong>" ; ?></span> 

				 <span class="size15 stl-gprod_foto">Editorial: 
				 <?php echo  "<strong class='size15'>".$fila['edito_nom']."</strong>" ; ?></span> 		

				<span class="size15 stl-gprod_foto">Año: 
				 <?php echo  "<strong class='size15'>".$fila['prod_year']."</strong>" ; ?></span> 						 
                 
                 <span class="size15 stl-gprod_foto">Stock:  <?php  echo  "<strong class='size15'>".$fila['prod_stock']."</strong>" ;?> </span> 


<?php
					  $conexiondetalle = mysqli_connect($sv,$us,$ps,$db);
					//  mysqli_set_charset($conexion, "utf8");
					  $peticiondetalle = "SELECT * FROM vis_productos WHERE prod_id = ".$fila['prod_id']."";
					  $resultadodetalle = mysqli_query($conexiondetalle, $peticiondetalle);

					/*  gprod_foto Query mysql Ultimas Publi Boque de 3 */		  
					  while($filadt = mysqli_fetch_array($resultadodetalle)){
					  $MND="S/.";	
					  $PRE_1=$filadt['prod_pre1'];	
					  $PRE_2=$filadt['prod_pre2'];	
					  if($MON=="D"){
						  if($PRE_1>=0){
							  $PRE_1=number_format($PRE_1 / $TIP_CAM,2,'.','');
						  }
						  if($PRE_2>=0){
							  $PRE_2=number_format($PRE_2 / $TIP_CAM,2,'.','');
						  }
						  $MND="$";
					  }
					  echo ' 
										 
							 ';
 
											   echo '			    
											
											';	
									echo '  
									 
										';	
								  echo '<div  style="line-height: 15px;">';
								  if($PRE_1>=0){
								  echo "<button onclick=\"F1(".$filadt['prod_id'].",".$PRE_1.",'S',".$filadt['prod_pre1'].");\" 
								  		class='btn btn-warning' style=\"font-size:12.5px;  height: 40px;width: 210px; display: block; margin-bottom: 10px;padding: 7px;\" >Precio Tapa Rustica: ".$MND." ".$PRE_1." Comprar</button>";
								  }else{ 
								  echo "<button class='btn btn-warning' style=\"font-size:12.5px;width: 210px; display: block; margin-bottom: 10px;padding: 7px; \" >Precio Tapa Rustica: NO DISPONIBLE</button>";	  
								  }
								  if($PRE_2>=0){
								  echo "<button onclick=\"F1(".$filadt['prod_id'].",".$PRE_2.",'D',".$filadt['prod_pre2'].");\" 
								  		class='btn btn-warning' style=\"font-size:12.5px;width: 210px;padding: 7px;\" >Precio Tapa Dura: ".$MND." ".$PRE_2." Comprar</button>";
								  }else{
								  echo "<button class='btn btn-warning' style=\"font-size:12.5px;width: 210px;height: 40px;padding: 7px;\" >Precio Tapa Dura:  NO DISPONIBLE</button>";	  
								  }
										
								echo '</div>
										 <button id="cmd'.$filadt['prod_id'].'"  style="display: none;" class="botoncompra" value="'.$filadt['prod_id'].'" >Añadir al carro</button>
										
 																		
	   ';
				
												echo '		
										 
							        
							</div>';		
												
					 }
					 mysqli_close($conexion);
					 /* /gprod_foto Query mysql Ultimas Publi Boque de 3*/		
					?>              
				 
              </div>
            </div>
			
        
		
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 like-libro">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<!-- fb-->
				<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://grijleimport.com/detalle-producto.php?id=59" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                <!-- /fb-->  
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 
				 <!--TWITTER-->
				 <a href="https://twitter.com/share" class="twitter-share-button" data-text="Libreria y Editora Juridica" data-via="GRIJLEIMPORT" data-related="GRIJLEIMPORT" data-hashtags="GRIJLEIMPORT">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				 <!--/TWITTER-->
                </div>
              </div>             
            </div>
           </div>
        
		
	</div>	
		
		
		 
		
        <div class="sombra clearfix">
          <div class="bg_blanco">
            <div class="">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#indice" data-toggle="tab" style="
    font-size: 15px;
">Índice</a></li>
                <li class=""><a href="#resumen" data-toggle="tab" style="
    font-size: 15px;
">Resumen</a></li>                
                <li class=""><a href="#consulta" data-toggle="tab" style="
    font-size: 15px;
">Consulta</a></li>                
              </ul>               
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="indice">
					  <div>
					 <?php echo  "<strong class='size15'>".$fila['prod_indi']."</strong>" ;?>	 
					  </div>
                </div>
                <div class="tab-pane fade" id="resumen">
                  <div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 resumen bg_blanco">  
                      
				<?php echo  "<p><strong class='size15'>".$fila['prod_resu']."</strong></p> " ;?>	 
					  </div>
                  </div>
                </div>                
                <div class="tab-pane fade" id="consulta">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 consulta">
					
                   <form class="consulta " id="consulta" action="envia-cotizacion.php" method="post">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						  <div class="img">
						 <?php echo ' <img src="img/foto-destacada/'.$fila['prod_foto'].'" alt="'.$fila['prod_foto'].'" >' ;?>	   
                          <?php $foto = $fila['prod_foto']; ?>
                          </div>
						  
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-con">	  
                            <span>Consulta por este libro</span>
                          <span class="gprod_foto">  
							<?php     echo $fila['prod_nom'];
							$gprod_foto = $fila['prod_nom'];
							$prod_id = $fila['prod_id'];
							?>
                             <input id="gprod_foto"  class="form-control" type="hidden" name="t"    value="<?php echo $gprod_foto; ?> "> 
                             <input id="foto"  class="form-control" type="hidden" name="foto"    value="<?php echo $foto; ?> "> 
                             <input id="prod_id"  class="form-control" type="hidden" name="prod_id"    value="<?php echo $prod_id; ?> "> 
						  </span>
                          </div>
						  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                           <input class="form-control" id="nombre"   type="text" name="n"   placeholder="NOMBRE" required > 
                          </div>
						  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                           <input class="form-control" id="nombre"   type="text" name="tel"   placeholder="TELEFONO" required> 
                          </div>
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <input class="form-control size15" type="email" name="e" id="e" placeholder="CORREO LECTRÓNICO" required>                            
                          </div>
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <textarea class="form-control" id="con-consulta" name="msg" placeholder="CONSULTA" required></textarea>
                          </div>
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <input type="submit" class="btn btn-form" value="ENVIAR CONSULTA">
                          </div>        
                        </div>
                      </form>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
		
     
	  
	  
	</div>  
	  
		</div>	  

   <?php } mysqli_close($conexion);?> 
   
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
				<li class="direccion size15">Direccion: Jr. Azangáro 1077 Lima Cercado</li>
				<li class="fono" style="line-height: 14px; font-size: 12px;"> TELEFONO: 321-0258 - 427-1881, Movil: 981-511-175  </li>
				<li class="mail"><a class="size15" href="mailto:mentejuridica@hotmail.com / skype: mentejuridica@hotmail.com  ">mentejuridica@hotmail.com </a></li>
			  </ul>
			</div>
		 </div>
		</div>
		<div class="creditos text-center blanco" style="font-size:11px; ">
		  © Copyright GRIJLE  -  Derechos Reservados  <?php echo date('Y'); ?> 
		</div>
    </div>
<!-- /footer -->
 

<link rel="stylesheet" type="text/css" href="magiczoomplus/prettify.min.css">
<script type="text/javascript" src="magiczoomplus/prettify.min.js"></script>
<script>try { prettyPrint(); } catch(e) {}</script>

</body>
</html>
<!--/plantilla footer -->