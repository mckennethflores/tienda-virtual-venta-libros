<?php 
session_start();
 $titulo = "Pago - GRIJLEY EIRL ";

  $fpago = "active";

include('plantilla.php'); 



 ?>

<div class="container top17">

		    <div class="row">

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
				 
			</div>
			</div>


			    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

			        <div class="row">

			        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			            	<div class="cont-miga">

			              		<a href="http://grijleimport.com/">Inicio</a> &gt; Informacion Formas De Pago 1			            	</div>

			         	</div>

			        </div>

			        

			        <div style="margin-bottom: 50px;" class="sombra clearfix">

					   <div style="margin: 10px; line-height: 25px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 detalle bg_blanco">

			          	 FORMAS DE PAGO  Métodos de Pago 



Depósito o Transferencia Bancaria (Solo Perú) 



Puedes realizar tu pago mediante los servicios de banca electrónica o en cualquier oficina del Banco de Crédito del Perú (BCP), a la cuenta bancaria que te indicaremos al momento de ordenar en nuestro sitio web. Tu pedido será procesado tan pronto tengamos confirmación de tu depósito. 



Es importante que NO realices el depósito hasta que nosotros te confirmemos la disponibilidad total de tu pedido en un plazo no mayor a 2 días. 



Transferencia Vía Western Union



Los usuarios fuera de Perú, pueden realizar su pago utilizando el servicio de transferencias de dinero de Western Union. Sólo deberás indicarlo al momento de elegir tu método de pago y enviarnos el correspondiente Número de Control de Transferencia (MTCN).



Pago Contraentrega (Solo Lima Metropolitana)



Te permite cancelar en efectivo al momento de recibir tu pedido en tu domicilio			          </div>

			        </div>

			    </div>
				
				

			</div>

		</div>