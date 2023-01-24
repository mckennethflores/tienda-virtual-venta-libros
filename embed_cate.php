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