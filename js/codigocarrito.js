$(document).ready(iniciando)
function iniciando(){
 $(".botoncompra").click(aniade)
 $("#carritoarriba").load("php/poncarrito.php");
}
function aniade(){
	var pr=document.getElementById("T_PRE").value;	
	var mo=document.getElementById("T_MON").value;	
	var tt=document.getElementById("T_TIP").value;
	var po=document.getElementById("T_PRO").value;	
	var ur="php/poncarrito.php?p="+$(this).val()+"&mo="+mo+"&tt="+tt+"&pr="+pr+"&po="+po;
	//alert(ur);
	$("#carritoarriba").load(ur);
}


 