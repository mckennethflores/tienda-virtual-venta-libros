<?php 

session_start();
error_reporting(0);
$sumaproducto = 0;
if(isset($_GET['p'])){
	$PR=$_GET['pr'];
	$MO=$_GET['mo'];
	$TI=$_GET['tt'];
	$PO=$_GET['po'];
	if($PR==null)$PR=0;
	if($PO==null)$PO=0;
	if($MO==null)$MO="S";
	if($TI==null)$TI="S";
	//
	$EXISTE=-1;
	for($i =0; $i< $_SESSION['contador'];$i++){
		if($_SESSION['eliminado'][$i]=="N"){
			if($_SESSION['producto'][$i]==$_GET['p']  && $_SESSION['tapa'][$i]==$TI){
				$EXISTE=$i;
				break;
			}
		}
	} 	
	if($EXISTE==-1){
		$_SESSION['item'][$_SESSION['contador']]=$_SESSION['contador'];
		$_SESSION['producto'][$_SESSION['contador']] = $_GET['p'];
		$_SESSION['cantidad'][$_SESSION['contador']] = "1";
		$_SESSION['eliminado'][$_SESSION['contador']] = "N";
		$_SESSION['tapa'][$_SESSION['contador']] = $TI;
		$_SESSION['precio'][$_SESSION['contador']] = $PR;
		$_SESSION['pre_o'][$_SESSION['contador']] = $PO;
		$_SESSION['contador']++; 	
		echo "<script>
		window.location.href = './php/parrillaproducto.php';
		</script>";
	}else{
		$_SESSION['cantidad'][$EXISTE] = $_SESSION['cantidad'][$EXISTE] + 1;
	}
}
//

//
$C=0;
 
for($i =0; $i< $_SESSION['contador'];$i++){	
	if($_SESSION['eliminado'][$i]=="N"){
		$C=$C + $_SESSION['cantidad'][$i];		
	 	$sumaproducto =$sumaproducto + ($_SESSION['precio'][$i] * $_SESSION['cantidad'][$i]) ;
	}
 }
//
$cantproducto =$C;
if($cantproducto == 1){
	echo $cantproducto. " Producto ";
}else{
	echo $cantproducto. " Productos ";
}
$_M="S/.";
if($_SESSION['moneda']=="D"){
	$_M="$";
}
echo "| Total: $_M ".number_format($sumaproducto,2);
echo"<a href='php/parrillaproducto.php'>casa</a>";
?>

 
 


