<?php 
session_start();
 $titulo = "Nosotros - GRIJLEY EIRL ";

 $pcontact = "active";

include('plantilla.php'); 



 ?>

 <style>

 

 .msg_ok{

	 color:#63d51f;

	  

 }

 </style>	

 <script type="text/javascript" src="js/jquery.min.1.9.1.js"></script>

 <div class="container top17">

    <div class="row">

      <div class="sombra col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="cont-miga">

          <a href="http://www.legales.pe/">Inicio</a> &gt; Contacto        </div>

		  

 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d243.8631197208316!2d-77.03451977618515!3d-12.05659597383915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c7438ceb2d%3A0x3aaddc17e6a3e1f2!2sJir%C3%B3n+Azangaro+1085%2C+Distrito+de+Lima+15001!5e0!3m2!1ses-419!2spe!4v1472748749048" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

             

    </div>

    <div class="row">

      <div class="sombra col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="form-contact bg_blanco clearfix">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <span class="titulos tit-int">FORMULARIO DE CONTACTO</span>

            <div class="row">

              <div class="divisor"></div>

            </div>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 clearfix">

            <ul class="dats">

              <li class="c-dir">

                <strong>Dirección</strong><br>

			Jr. Azángaro 1077 Lima Cercado				  

              </li>

              <li class="c-tel">

                <strong>Teléfonos</strong><br>

                 (51)(01) 321-0258 427-1881 / Rpc: 981-511-175             </li>

              <li class="c-mail">

                <strong>Correo electrónico</strong><br>

                <a href="mailto:mentejuridica@hotmail.com /  ">mentejuridica@hotmail.com </a>

              </li>

            </ul>            

          </div>

          <div class="divisor hidden-md hidden-lg clearfix"></div>

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 agotado">

              <span class="pull-left"></span>

            </div>

			<!-- FORMULARIO de Contacto -->
 
					  
			 <form class=" contacto " id="consulta" action="enviar-mail/envia-mensaje.php" method="post">		  
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bot20">
                <input name="n"  class="nombre" id="nombre" placeholder="NOMBRE*" type="text"required>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bot20">
                <input name="tel" class="telefono"id="telefono" placeholder="TELEFONO*" type="text" required>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bot20">
                <input name="e" class="email" id="e" placeholder="E-MAIL*" type="text" required>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bot20">
                <textarea name="msg"  id="mensaje" class="mensaje" placeholder="MENSAJE*" rows="8" required></textarea>
              </div>
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
              <input type="submit" class="btn btn-form" value="ENVIAR CONSULTA">
              </div>  
			  <br/>
			  <br/>			
            </form>
       <!-- FORMULARIO de Contacto -->
          </div>   

        </div>

      </div>

    </div>

  </div>