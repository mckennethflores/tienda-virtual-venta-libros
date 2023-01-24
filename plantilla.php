<?php 

if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}
//inicializas la secion moneda = s

if(!isset($_SESSION['moneda'])){$_SESSION['moneda'] = "S";}

include('conexion.php'); 

 $titulo = "Inicio - GRIJLEY EIRL";

 $inicio = "active"; 

//chapas el value del combo

$NM=$_GET[sel_tcam];

if($NM==null){

	$NM=$_SESSION['moneda'];

}

$MON=$NM;

$cn = mysqli_connect($sv,$us,$ps,$db);
mysqli_set_charset($cn, "utf8");
$pt  = "SELECT valor, dato FROM   valores WHERE dato = 'tipo_cambio' ";
$rs = mysqli_query($cn, $pt);
while($fila = mysqli_fetch_array($rs)){
	$TIP_CAM = $fila['valor'];
}
mysqli_close($conexion);	
//VERIFICAR SI SE CAMBIO DE MONEDA

if($_SESSION['contador']>0){

	if($_SESSION['moneda']!=$MON){

		for($i =0; $i< $_SESSION['contador'];$i++){	

			if($MON=="S"){

				//pre_o precio original

				$_SESSION['precio'][$i] = $_SESSION['pre_o'][$i];		

			}else{

				$_SESSION['precio'][$i] = number_format($_SESSION['pre_o'][$i] / $TIP_CAM,2,'.','');						

			}

		}

	}		

}

$_SESSION['moneda']=$MON;	





 $conexion = mysqli_connect($sv,$us,$ps,$db);
  // // // mysqli_set_charset($conexion, "utf8");
  
    $peticion  = "select * from  vis_productos  LIMIT 6 ";
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
	
	
	
?>

<?php



if(!isset($titulo)){

	$titulo = "";

}

if(!isset($inicio)){

	$inicio = "";

}

if(!isset($nosotros)){

	$nosotros = "";

}

if(!isset($fpago)){

	$fpago = "";

}

if(!isset($pcontact)){

	$pcontact = "";

}

if(!isset($pgrijley)){

	$pgrijley = "";

} 

if(!isset($pcatotros)){

	$pcatotros = "";

}

$objPlantilla = new plantilla($titulo,$inicio,$nosotros,$fpago,$pcontact,$pgrijley,$pcatotros,$TIP_CAM,$_SESSION['usuario_activo']);

 class plantilla{

	function __construct($titulo = "",$inicio = "",$nosotros = "",$fpago = "",$pcontact = "",$pgrijley = "",$pcatotros = "",$TIP_CAM=0,$USUARIO="" )
	{
		?>

 <!--de la plantilla-->

 <!DOCTYPE html>

 <html lang="en">

 <head>

	<meta charset="UTF-8">

	<title><?php echo $titulo; ?> </title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" href="css/bootstrap.min.css">

	 <link rel="shortcut icon" href="img/favicon.ico">

	 

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



<input name="T_PRE" id="T_PRE" type="hidden" value="">

<input name="T_PRO" id="T_PRO" type="hidden" value="">

<input name="T_TIP" id="T_TIP" type="hidden" value="">

<input name="T_MON" id="T_MON" type="hidden" value="<?php echo $MON;?>">

<div  id="ver" style="width: 75%; height: 506px; background:black; position: fixed;

    top: 25%; left: 25%; margin-left: -100px; margin-top: -100px; z-index:99999; display: block; visibility:hidden" >

	<input type="button" value="Cerrar" onclick="ocultar()" style=" float: right;" >

	<div class="lightcaja col-xs-12 col-sm-12 col-md-12 col-lg-8 bg_blanco clearfix indice">

		<div id="LIBRO" class="">

		</div>

	</div>

</div>

 <!--header-->

 <div class="container"> 

     <div class="row">

            <div class=" col-xs-12 col-xs13 col-md-6  ">

            <div class="logo-header">

              <img class="foto-logo" src="img/logo-grijle.png" width="100%" height="95" alt="GRIJLEY "  usemap="#Map">

                <map name="Map">

                <area shape="rect" coords="13,-2,163,91" href="index.php" alt="GRIJLEY DERECHO">

              </map>
              <div>
  
	
</div>

            </div>

            </div>

        <div style="font-size: 12px;  padding-top: 14px;" class="col-xs-6  col-md-3 ">       

            <div class="direccion-header">
              Informes y consultas:
         <div style="color: rgb(219, 82, 37); letter-spacing: 1px;" class="telefonos">(511) 3210258 / (511)  4271881 </div>
               <div class="direccion_responsive" style="
    letter-spacing: .5px;
">

              Direccion: Jr. Azangáro 1077 Lima Cercado
             <!--mentejuridica@hotmail.com --> info@grijleimport.com
		 
              </div>

            </div>

        </div>

        <div class="col-xs-6 col-md-3  ">

            <div class="carrito-header" style="font-size: 12px;  padding-top: 14px;" >

              <div class="tittle-carrito">

                

            

            <a href='php/parrillaproducto.php'>   
<div style="
font-size: 15px;
font-weight: bold;
color: #f39c12;
"> Carrito de Compras</div></a>   

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
			echo "Bienvenido: ".$_SESSION['usuario_activo'] ."<br/>";	
		}else{
			echo "";
		} 
	}
}else{
	if(strlen($_SESSION['usuario_activo'])>0){
		echo "Bienvenido: ".$_SESSION['usuario_activo'];	
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

        <li <?php echo $inicio; ?> ><a href="index.php">INICIO <span class="sr-only">(current)</span></a></li>

        <li class="<?php echo $nosotros; ?>"><a href="nosotros.php">QUIENES SOMOS</a></li>

        <li class="<?php echo $fpago; ?>"><a href="formasdepago.php">FORMAS DE PAGO</a></li>



        <li class="<?php /*echo $pgrijley;*/ ?><?php/* echo $pcatotros;*/ ?>"  class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

            CATÁLOGO <span class="caret"></span></a>

          <ul class="dropdown-menu" role="menu">

            <li class="<?php/* echo $pgrijley;*/ ?>"   > <a href="libros-grijle-import.php">GRIJLE IMPORT S.A.</a></li>

            <li class="divider"></li>

            <li class="<?php/* echo $pcatotros;*/ ?>"><a href="libros-otras-editoriales.php">OTRAS EDITORIALES</a></li>

          </ul>

        </li>

		<li class=" <?php echo $pcontact; ?>   " ><a href="contacto.php">CONTACTENOS</a></li>

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

 <!-- /de la plantilla-->

 

  <div class="container">

	<?php

	}

	function __destruct(){

	?>

<!-- Codigo acordeon-->

  <script type="text/javascript" src="acordeon/jquery-1.8.2.js" ></script>

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

<!-- footer -->

</div>
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
				<li class="fono" style="line-height: 14px; font-size: 12px;"> TELEFONO: 321-0258 - 427-1881, Movil: 981-511-175  </li>
				<li class="mail"><a href="mailto:mentejuridica@hotmail.com / skype: mentejuridica@hotmail.com  ">mentejuridica@hotmail.com </a></li>
			  </ul>
			</div>
		 </div>
		</div>
		<div class="creditos text-center blanco">
		  © Copyright GRIJLE  -  Derechos Reservados <?php echo date('Y'); ?>  
		</div>
    </div>

<!-- /footer -->
</body>

</html>



	<?php	

	}

}











































	

