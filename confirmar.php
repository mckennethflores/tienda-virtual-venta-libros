<?php 
session_start();
if(!isset($_SESSION['usuario_activo'])){$_SESSION['usuario_activo'] = "";}
if(!isset($_SESSION['usuario_activo_id'])){$_SESSION['usuario_activo_id'] = 0;}
if(!isset($_SESSION['ss_ini'])){
	echo "<script language='javascript'>"; 				
	echo "location.href='index.php';";
	echo "</script>";
	return;
}
if(strlen($_SESSION['usuario_activo'])>0){
	echo "<script language='javascript'>"; 				
	echo "location.href='logcliente.php';";
	echo "</script>";
	return;
}
include "plantilla.php";
?>
<br>

 <div class="container top17">
 
			<div class="row">
				<div class="sombra clearfix col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="bg_blanco clearfix">
						<div class="titlog clearfix col-xs-12 col-sm-12 col-md-12 col-lg-12 bot17"><span>ACCESO</span></div>
						<div class="clearfix col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="bot20 col-xs-12 col-sm-12 col-md-12 col-lg-12">Introduzca su nombre de usuario y contraseña.</div>
						
                            		<form id="login" method="POST" action="logcliente.php" >
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="usuario" id="usmail" placeholder="EMAIL" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="password" name="contrasena" id="uscontrasena" placeholder="CONTRASEÑA" required>
				  				</div>
                  <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 agotado">
                    <span class="pull-left">Para comprar debe inicar sesión</span>
                  </div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<div id="nivo-lightbox-demo">
				  						<!--<a href="olvido.php" data-lightbox-type="iframe" class="turq popup-indice">¿Olvidó su contraseña?</a>-->
				  					</div>
				  				</div>
				  				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center bot20">
			                		<button type="submit" class="btn btn-form navbar-btn">INGRESAR</button>
			              		</div>			              		
				  			</form>
				  		</div>
					</div>
				</div>
				<div class="sombra clearfix col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="bg_blanco clearfix">
						<div class="titlog clearfix col-xs-12 col-sm-12 col-md-12 col-lg-12 bot17"><span>REGISTRO</span></div>
						<div class="clearfix col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<form name="registra" id="registra" method="post" action="registro.php" >
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input  type="text" name="reg_nombre" id="reg_nombre" placeholder="NOMBRE*" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input  type="text" name="reg_apellidos" id="reg_apellidos" placeholder="APELLIDOS" >
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_email" id="reg_email" placeholder="EMAIL*" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_usuario" id="reg_usuario" placeholder="USUARIO*" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="password" name="reg_contrasena" id="reg_contrasena" placeholder="CONTRASEÑA*" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="password" name="reg_rcontrasena" id="reg_rcontrasena" placeholder="REPETIR CONTRASEÑA*" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_celular1" id="reg_celular1" placeholder="CELULAR 1*" required>
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_celular2" id="reg_celular2" placeholder="CELULAR 2" >
				  				</div>                                                                
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_telefono" id="reg_telefono" placeholder="TELÉFONO" >
				  				</div>
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_pais" id="reg_pais" placeholder="PAÍS*" required>
				  				</div>    
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_direccion" id="reg_direccion" placeholder="DIRECCIÓN*" required>
				  				</div>    
				  				<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 form-group">
				  					<input type="text" name="reg_referencia" id="reg_referencia" placeholder="REFERENCIA" >
				  				</div>    
                                                                                                                                
				  				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				                    <input type="hidden" name="nid" id="nid">
			                        <input type="hidden" name="nnivel" id="nnivel">
			                		<button type="submit" class="btn btn-form navbar-btn">REGISTRARSE</button>
			              		</div>
				  			</form>
				  		</div>
					</div>
				</div>
			</div>
		</div>
        
 

	<script src="js/valida_registro.js"></script>
 
