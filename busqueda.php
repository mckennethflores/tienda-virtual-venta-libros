<?php 
include('conexion.php'); 
 $titulo = "busqueda - GRIJLEY EIRL ";
 $nosotros = "active";
include('plantilla.php'); 

$conexion = mysqli_connect($sv,$us,$ps,$db);
// mysqli_set_charset($conexion, "utf8");
//INI
$TIT=$_GET[T];
$AUT=$_GET[A];
$EDI=$_GET[E];
$PAG=$_GET[P];
if($TIT==null)$TIT="";
if($AUT==null)$AUT="";
if($EDI==null)$EDI="";
if($PAG==null)$PAG=1;
//
//$peticion  = "SELECT * FROM slider order by id desc limit 6";

$peticion  = "select * from vis_productos LIMIT 6";

$resultado    = mysqli_query($conexion,$peticion);

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

// mysqli_close($conexion);	
 ?>
 <div class="container top17">
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="row">

          <div class="col-xs-12 col-sm-12 ofertas">
            <div class="col-md-12 col-lg-12 altura10 blanco fondo1">
  
    <a href="#" style="
    color: white;
    font-weight: bold;
">
    LOS MÁS VENDIDOS
    <i class="fa fa-tag pull-right"></i>
  </a>
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
    </script>          </div>        

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sombra clearfix login">
            
 
 

        </div>
        </div>        
      </div>
      <aside class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="cont-miga">
              <a href="index.php">Inicio</a> &gt; Busqueda            </div>
          </div>
        </div>
        <div class="row">
            <div class="sombra clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subtitulos headint">
                    <h2>Resultados de la búsqueda</h2>
                </div>
            </div>
        </div>
        
        <div class="row">            
            <div class="clearfix">
            <?php
			$TIP_CAM=3.0;
				$StrTit="%".trim($TIT)."%";
				$StrAut="%".trim($AUT)."%";
				$StrEdi="%".trim($EDI)."%";
				$StrPag=($PAG * 12)-12;
				
				//
				
				$s="SELECT *
					FROM vis_productos
					WHERE prod_nom LIKE '$StrTit' AND prod_aut LIKE '$StrAut' AND edito_nom LIKE '$StrEdi' 
					ORDER BY prod_nom";				
				$rs=mysqli_query($conexion,$s);
				$count=mysqli_num_rows($rs);
				$StrNP= ceil($count / 12);
				//
				$s="SELECT *
					FROM vis_productos 
					WHERE prod_nom LIKE '$StrTit' AND prod_aut LIKE '$StrAut' AND edito_nom LIKE '$StrEdi' 
					ORDER BY prod_nom LIMIT $StrPag,12";				
				$rs=mysqli_query($conexion,$s);
				while($r=mysqli_fetch_array($rs)){
					$_I=$r['prod_id'];
					 
					$_T=substr($r['prod_nom'],0,80).' ...';
					
					$_A=substr($r['prod_aut'],0,80).' ...';
					 
					//Busqueda ramdom de la imagen del libro.
					$_IMG="";
					$ss="SELECT prod_foto FROM vis_productos WHERE prod_id = $_I ORDER BY RAND()";
					$rss=mysqli_query($conexion,$ss);
					while($rr=mysqli_fetch_array($rss)){
						$_IMG=$rr['prod_foto'];
					}
					if(strlen($_IMG)>0){
						$_IMG="img/foto-destacada/$_IMG";
					}
					if(strlen($_IMG)==0){
						$_IMG="img/nofoto.jpg";
					}
			?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 item clearfix bot20">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 libro-item">
                        <div class="row">                        
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="libro-img img">
                            <a href="<?php echo  "detalle-producto.php?id=".$_I;?>">
                            <img src="<?php echo $_IMG;?>" alt="">
                            </a>
                            </div>                    
                            </div>
                                                        
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 link-libro">
                            <span class="tit-libro clearfix">
							<a href="<?php echo  "detalle-producto.php?id=".$_I;?>"><h3><?php echo $_T;?></h3></a>
                          
                            </span>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 link-autor">
                            <span class="tit-libro">
                              <a href="<?php echo  "detalle-producto.php?id=".$_I;?>"><h4><?php echo $_A;?></h4></a>
                            </span>
                            </div>
                            
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 foot-item clearfix">

                                <div class=" ">

                                <!--BOTOÓN AÑADIR AL CARRO-->

                                <?php

                                if($PRE_1>=0){

								  echo "<button onclick=\"F1(".$r['prod_id'].",".$PRE_1.",'S',".$r['prod_pre1'].");\" 

								  		style=\"font-size:12.5px;width:100%;\" >Precio Tapa simple: ".$MND." ".$PRE_1." Comprar</button>";

								  }else{

								  echo "<button style=\"font-size:12.5px;width:100%;\" >Precio Tapa simple: AGOTADO Comprar</button>";	  

								  }

								  if($PRE_2>=0){

								  echo "<button onclick=\"F1(".$r['prod_id'].",".$PRE_2.",'D',".$r['prod_pre2'].");\" 

								  		style=\"font-size:12.5px;width:100%;\" >Precio Tapa Doble: ".$MND." ".$PRE_2." Comprar</button>";

								  }else{

								  echo "<button style=\"font-size:12.5px;width:100%;\" >Precio Tapa Doble: AGOTADO Comprar</button>";	  

								  }

                               ?> 

                                <!--FIN BOTOÓN AÑADIR AL CARRO-->

                                </div>

                                

                                                                 

<?php

echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 foot-item clearfix">					 

	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">						

	  <div id="nivo-lightbox-demo">		

	  <input style=" width: 100%; margin-top: 10px;" class="btn btn-primary popup-indice"  type="button" value="Indice" ';

echo "onclick=\"mostrar(".$r['prod_id'].")\" >";

echo "<div id=\"DL".$r['prod_id']."\" style=\"visibility:hidden;display:none\">".$r['prod_indi']."</div>";

echo '</div></div></div>';

?>                                 

                                 

                                 

                            </div>                              
                        </div>
                    </div>        
                    </div>
            	<?php
					}
				?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix bot20">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix paginacion text-right">

                    <ul class="pagination" style="background:black;color:white;">
					<li class="details">Página 1 de <?php echo $StrNP;?></li>
                    <?php
						for($i=1;$i<=$StrNP;$i++){
							if($PAG==$i){
					?>
                    		<li><a class="current"><?php echo $i;?></a></li>
                    <?php
							}else{
								$L="busqueda.php?T=$TIT&A=$AUT&E=$EDI&P=$i";
					?>
                    		<li><a href="<?php echo $L;?>"><?php echo $i;?></a></li>
                    <?php			
							}
						}
					?>                   
					
					</ul>
                </div>                
            </div>
                    </div>
      </aside>
    </div>
  </div>