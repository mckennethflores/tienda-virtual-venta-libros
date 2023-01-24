with(document.confirmar){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		
 alert("hola ");
		if(ok && reg_nombre.value==""){
			ok=false;
			alert("Debe escribir un nombre de usuario");
			reg_nombre.focus();
		}
		if(ok &&reg_apellidos.value==""){
			ok=false;
			alert("Debe escribir su nombre");
			reg_apellidos.focus();
		}
		if(ok && reg_email.value==""){
			ok=false;
			alert("Debe escribir su email");
			reg_email.focus();
		}
		if(ok &&reg_usuario.value==""){
			ok=false;
			alert("Debe escribir su reg_usuario");
			reg_usuario.focus();
		}
		if(ok && reg_contrasena.value==""){
			ok=false;
			alert("Debe escribir su password");
			reg_contrasena.focus();
		}
		if(ok && reg_rcontrasena.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_rcontrasena.focus();
		}
		if(ok && reg_celular1.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_celular1.focus();
		}
		if(ok && reg_celular2.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_celular2.focus();
		}	
		if(ok && reg_telefono.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_telefono.focus();
		}	
		if(ok && reg_pais.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_pais.focus();
		}	
		if(ok && reg_direccion.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_direccion.focus();
		}	
		if(ok && reg_referencia.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			reg_referencia.focus();
		}	
 
	 

		if(ok && reg_contrasena.value!= reg_rcontrasena.value){
			ok=false;
			alert("Los passwords no coinciden");
			reg_rcontrasena.focus();
		}


		if(ok){ submit(); }
	}
}
