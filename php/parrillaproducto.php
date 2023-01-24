<?php 

session_start();
error_reporting(0);
include('../conexion.php'); 
/*if(!isset($_SESSION['ss_ini'])){$_SESSION['ss_ini'] = 1;}
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}
*/
if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}
if(!isset($_SESSION['moneda'])){$_SESSION['moneda'] = "S";}

// mensaje de no hay productos

if($_SESSION['contador'] == 0){
	
	
	
	$noproducto = "Su carrito está vacío.";
	

}

$_M="S/.";
if($_SESSION['moneda']=="D"){
	$_M="$";
}
$_IP=$_GET['IP'];
$_CA=$_GET['CA'];
$_CM=$_GET['CM'];
if($_IP==null)$_IP=0;
if($_CA==null)$_CA=0;
if($_CM==null)$_CM="";
//
if($_CM=="A"){	
	$_SESSION['cantidad'][$_IP] = $_CA;
	/*
	for($i =0; $i< $_SESSION['contador'];$i++){
		if($_SESSION['producto'][$i]==$_IP){
			$_SESSION['cantidad'][$i] = $_CA;
			break;
		}
	} 
	*/	
}
if($_CM=="E"){
	$_SESSION['eliminado'][$_IP]="S";
	$_SESSION['producto'][$_IP]=-1;
	/*
	for($i =0; $i< $_SESSION['contador'];$i++){
		if($_SESSION['producto'][$i]==$_IP){
			$_SESSION['eliminado'][$i] = "S";
			$_SESSION['producto'][$i]=-1;
			break;
		}
	} 
	*/	
}
?>
<script>
	function  enviar(id,ca){
		window.location.href="parrillaproducto.php?IP="+id+"&CA="+ca+"&CM=A";
	}
	function  eliminar(id){
		
		window.location.href="parrillaproducto.php?IP="+id+"&CM=E";
	}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?> </title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="icon" 
      type="image/png" 
      href="../img/icono.png">
	  
<!-- Carrito de Compras-->	  
 
<!-- /Carrito de Compras-->	  
	  
<!-- Fuente -->
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!-- /Fuente -->

<!--  icomoon -->
<link rel="stylesheet" href="../css/icomoon.css">
<!-- / icomoon -->

  <!-- Codigo acordeon-->

  <link rel="stylesheet" type="text/css" href="../acordeon/jquery-ui-1.8.23.custom.css" />
  <link rel="stylesheet" type="text/css" href="../acordeon/estilosacordeon.css" />
  <!-- /Codigo acordeon-->

  <!-- Codigo carrusel-->
  <link href="../carrusel/estilo-carousel.css"   type="text/css"rel="stylesheet" />
  <link rel="stylesheet" href="../carrusel/feature-carousel.css"  />
  <script type="text/javascript" src="../carrusel/jquery-1.8.2.js"  ></script>


 <script type="text/javascript" src="../js/jquery.min.1.9.1.js"></script>
 
  <script src="../js/bootstrap.min.js"> </script>
 


   <!-- /Codigo carrusel-->

  

<!--  estile slt producto -->
<link rel="stylesheet" href="../css/estile-stl.css">
<!-- / estile slt producto -->
<link rel="stylesheet" href="../css/custom.css">
</head>
 <body>

<!--header-->
<div class="container">
       
     <div class="row">
            <div class=" col-xs-12 col-xs13 col-md-6  ">
            <div class="logo-header">
              <img src="../img/logo-grijle.png" width="100%" height="95" alt="GRIJLEY "  usemap="#Map">
                <map name="Map">
                <area shape="rect" coords="21,-1,216,87" href="../index.php" alt="GRIJLEY DERECHO">
              </map>
<div>
<?php /*if(strlen($_SESSION['usuario_activo'])>0){
		echo "Bienvenido: ".$_SESSION['usuario_activo'] ."<br/>";	
		}*/
	?>
</div>
            </div>
            </div>
      
        <div style="font-size: 12px;  padding-top: 14px;" 
        class="col-xs-6  col-md-3 ">       
            <div class="direccion-header">
              Informes y consultas:

   
              <div style="color: rgb(219, 82, 37); letter-spacing: 1px;" class="telefonos">(511) 321-0258 / (511)  427-1881 </div>
              <div class="direccion_responsive" style="
    letter-spacing: .5px;
">

              Plaza de la Bandera 125 - Pueblo Libre

              mentejuridica@hotmail.com 
              </div>
            </div>
        </div>

      

        <div class="col-xs-6 col-md-3  ">


            <div class="carrito-header" style="font-size: 12px;  padding-top: 14px;" >
              <div class="tittle-carrito">
             <a href="php/parrillaproducto.php">   <div style="
    font-size: 20px;
    margin-bottom: 3%;
"> Carrito de Compras</div></a>   
               
                <div id="carritoarriba"  >
	<?php
 
 
 
$sumaproducto = 0;
/*
if(isset($_GET['p'])){
	$_SESSION['producto'][$_SESSION['contador']] = $_GET['p']; 
	//$_SESSION['contador']++;	

}
*/


 
 


  $conexion = mysqli_connect($sv,$us,$ps,$db);
 
// mysqli_set_charset($conexion, "utf8");
 
 // PRECIO ARRIBA
 $CANT_PROD=0;
 for($i =0; $i< $_SESSION['contador'];$i++){
	if($_SESSION['eliminado'][$i]=="N"){
		$CANT_PROD=$CANT_PROD + $_SESSION['cantidad'][$i];	
		$sumaproducto =$sumaproducto + ($_SESSION['precio'][$i] * $_SESSION['cantidad'][$i]); 
		
		$peticion = "SELECT * FROM vis_productos WHERE prod_id=".$_SESSION['producto'][$i]."";
	 	$resultado = mysqli_query($conexion, $peticion);
	 	while($fila = mysqli_fetch_array($resultado)){
			$peticion2 = "SELECT * FROM vis_productos WHERE prod_id = ".$fila['prod_id']." LIMIT 1";
			$resultado2 = mysqli_query($conexion, $peticion2);
			while($fila2 = mysqli_fetch_array($resultado2)){	 
			}
	 	}	
	 }
 }
 
 $cantproducto = $CANT_PROD;

if($cantproducto == 1){
	
	echo " ".$cantproducto. " Producto ";
	
}else{

	echo " ".$cantproducto. " Productos ";
} 
 
 echo "| Total: $_M ".$sumaproducto." ";
 
 
 
	
	?>		   
              
            		 
                </div>
               </div>

              <div class="description"> 
              </div>
            </div>

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
        <li class="<?php echo $inicio; ?>"><a href="../index.php">INICIO <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $nosotros; ?>"><a href="../nosotros.php">QUIENES SOMOS</a></li>
        <li class="<?php echo $fpago; ?>"><a href="../formasdepago.php">FORMAS DE PAGO</a></li>

        <li class="<?php echo $pgrijley; ?><?php echo $pcatotros; ?>"  class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            TODOS LOS LIBROS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="<?php echo $pgrijley; ?>"   > <a href="../productos-grijle.php">GRIJLE IMPORT S.A.</a></li>
           
 
            <li class="divider"></li>
            <li class="<?php echo $pcatotros; ?>"><a href="../catalogo-otros.php">OTRAS EDITORIALES</a></li>
          </ul>
        </li>
		<li class=" <?php echo $pcontact; ?>   " ><a href="../contacto.php">CONTACTENOS</a></li>
      </ul>
    
    </div>
  </div>
</nav>
<!--/nav-->
<div class="container top17">
      <div class="row">


       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <a href='../index.php' class='btn btn-warning' title='Seguir comprando'>SEGUIR COMPRANDO</a>
       </div>

        <div class="sombra col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="bg_blanco clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <span class="titulos tit-int">CARRITO DE COMPRAS</span>
              <div class="row">
                <div class="divisor"></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bot17">
                              <div class="table-responsive">
                  
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
<thead>
<tr>  
<th width="20%" height="45" align="center" valign="middle" scope="col">Imagen  </th>
<th width="35%" height="45" align="center" valign="middle" scope="col">Título</th>
<th width="10%" height="45" align="center" valign="middle" scope="col">Precio</th>
<th width="10%" height="45" align="center" valign="middle" scope="col">Tapa</th>
<th width="10%" height="45" align="center" valign="middle" scope="col">Cantidad</th>
<th width="10%" height="45" align="center" valign="middle" scope="col">Subtotal</th>
<th width="15%" height="45" align="center" valign="middle" scope="col">&nbsp;</th>
<th width="15%" height="45" align="center" valign="middle" scope="col">&nbsp;</th> 
</tr>
</thead>


<tbody>
 

<form id="form3" name="form3" method="post" action="agregarproductocarrito.php"></form>
<?php 
$sumaproducto=0;
$CANT_PROD=0;
echo "<table>  "; 
  echo "<h1 style='
    
    color: red;
	text-align:center;
    
'>".$noproducto."</h1>  ";  
for($i =0; $i< $_SESSION['contador'];$i++){	
	if($_SESSION['eliminado'][$i]=="N"){
	 $CANT_PROD=$CANT_PROD + $_SESSION['cantidad'][$i];	
	 $TAPA="Simple";
	 if($_SESSION['tapa'][$i]=="D"){
		 $TAPA="Doble";
	 }
	 $peticion = "SELECT * FROM vis_productos WHERE prod_id=".$_SESSION['producto'][$i]."";
	 $resultado = mysqli_query($conexion, $peticion);
	 while($fila = mysqli_fetch_array($resultado)){		
		echo "<tr> ";
		$IMG=0;
		$peticion2 = "SELECT * FROM vis_productos WHERE prod_id = ".$fila['prod_id']." LIMIT 1";
		$resultado2 = mysqli_query($conexion, $peticion2);
		while($fila2 = mysqli_fetch_array($resultado2)){
			echo " <td width='20%' align='center' valign='middle'>
			<div class='img imgcar'>
			<img width='70px' src='../img/foto-destacada/".$fila2['prod_foto']."'>
			</div></td>";
			$IMG=1;
 
		}
		if($IMG==0){
			echo " <td width='20%' align='center' valign='middle'>
			<div class='img imgcar'>
			<img width='70px' src='../img/vacio.jpg'>
			</div></td>";
		}
		$Txt="txt".$fila['idlibro'];
		echo "  
		  <td width='35%' align='center' valign='middle'>".$fila['prod_nom']."</td>
		  <td width='10%'align='center' valign='middle'>$_M ".$_SESSION['precio'][$i]." </td>
		  <td width='10%'align='center' valign='middle'>".$TAPA."</td>
		  <td width='10%' align='center' valign='middle'>
			  <div class='col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1'>
			  <input type='number' name='cantidad' class='form-control' maxlength='4' step='1' min='1'  size='4'
				id='$Txt' value='".$_SESSION['cantidad'][$i]."' maxlength='4'>	
		
			  </div>
		  </td>
		";
		
		echo "<td width='10%' align='center' valign='middle'>$_M ".$_SESSION['precio'][$i] * $_SESSION['cantidad'][$i] ."</td>
				<td width='10%' align='center' valign='middle'>
				 
				 
			 
				<a href='#' onclick=\"enviar(".$_SESSION['item'][$i].",document.getElementById('$Txt').value)\">  <img src='../img/update.png' width='16'  >
             </a>
				 
				 
			                          
				</td>
				<td width='10%' align='center' valign='middle'>
				 
				<a href='#' onclick=\"eliminar(".$_SESSION['item'][$i].")\"><img src='../img/trash.png' width='16'  ></a>
				 
				</td>
				</tr>	

 
					  
					  
                    
                   </tbody>

		"; 
		
 
		$sumaproducto =$sumaproducto+ ($_SESSION['precio'][$i] * $_SESSION['cantidad'][$i]);
	  }	
	 }
	 
 }
echo "	</table>";
echo " </div>
                <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-8 col-lg-offset-8 bot1 btncomprar'>
                  <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>SUBTOTAL: $CANT_PROD ARTICULOS</div>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 top5'>TOTAL: ".$sumaproducto."</div>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 top10'>
                      <a href='../confirmar.php' class='btn btn-warning'>FINALIZAR COMPRA</a>
                    </div>
                  </div>
                </div>
                              </div>
            </div>
          </div>
        </div>

                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <a href='../index.php' class='btn btn-warning' title='Seguir comprando'>SEGUIR COMPRANDO</a>
							 
                          </div>

      </div>
    </div> 			";


 
 mysqli_close($conexion);
?>

<!-- footer -->
</div>
 <div class="footer ">
  <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center">
          <a href="index.php"><img src="../img/logo-footer.png" alt="Legales Ediciones"></a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
            <h3 class="blanco">INFORMACIÓN</h3>
            <div class="menu-footer">
              <ul>
                                <li>
                  <a href="informacion-formas_de_pago-1.html" target="_self">
                    Formas de pago                  </a>                  
                </li>
                              
                               
                                
                                
              </ul>
            </div>
            <div class="tarjetas">
              <ul>
                <li>
                  <a href="https://www.paypal.com/pe/home" target="_blank"><img src="../img/paypal.png" alt="PayPal"></a>
                </li>
                
                <li>
                  <a href="https://www.multimerchantvisanet.com/formularioweb/formulariopago.asp?codtienda=523085302" target="_blank"><img src="../img/visa.png" alt="Visa"></a>    
                </li>
               <li>
                  <a href="https://www.visanet.com.pe/promovbv/bancos.html"><img src="../img/by-visa.png"></a>    
                </li>
                <li>
                  <a href="#"><img src="../img/mastercard.png" alt="mastercard"></a>
                </li>
                <li>
                  <a href="https://www.westernunion.com.pe/WUCOMWEB/countryHomeAction.do?method=load" target="_blank"><img src="../img/wenster-union.png" alt="mastercard"></a>
                </li>
              </ul>              
            </div>
<br>
<br>
Agréganos a:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/pages/editora-juridica-grijle-import-sa/111843135553405?sk=wall" target="_blank"><img src="img/icono-facebook.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../img/you-tube-logo.png">
        </div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <h3 class="blanco">VENTAS</h3>
          <ul class="datos">
            <li class="direccion">Jr. Azángaro  Lima - Perú</li>
           <li class="fono" style="
    line-height: 14px;
    font-size: 12px;
">    Cel: 111-111-111  </li>
            <li class="mail"><a href="mailto:ventas@grijley.com / skype: grijley.com.pe  ">ventas@grijley.com </a></li>
          </ul>
        </div>


 


               
      </div>
    </div>
    <div class="creditos text-center blanco">
      © Copyright GRIJLE  -  Derechos Reservados 2016 
	</div>
   </div>
<!-- /footer -->



</body>
</html>
                     
                     


 
 