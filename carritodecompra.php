<?php 
session_start();
 $titulo = "Nosotros - GRIJLEY EIRL ";

 

include('plantilla.php'); 



 ?>

  <!-- Buscar -->

 <div class="container">

           <form style="text-align: center;" class="navbar-form">

            <div class="form-group">

              

			  <input placeholder="Titulo" class="form-control" type="text" style="

			  font-size: 17px;">

            </div>

            <div class="form-group">

              <input placeholder="Editorial" class="form-control" type="text" style="

			  font-size: 17px;">

            </div>

			

            <div class="form-group">

              <input placeholder="Autor" class="form-control" type="text" style="

			  font-size: 17px;">

            </div>



 

            <button style="

			  font-size: 17px;" type="submit" class="btn btn-success">Buscar en GRIJLE</button>

          </form>

</div>

 <!-- /Buscar -->

<br/>



 <div class="container top17">

      <div class="row">





       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

       <a href="index.php" class="btn btn-success" title="Seguir comprando">SEGUIR COMPRANDO</a>

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

                        <th width="20%" height="45" align="center" valign="middle" scope="col">Imagen</th>

                        <th width="35%" height="45" align="center" valign="middle" scope="col">Título</th>

                        <th width="10%" height="45" align="center" valign="middle" scope="col">Precio</th>

                        <th width="10%" height="45" align="center" valign="middle" scope="col">Cantidad</th>

                        <th width="10%" height="45" align="center" valign="middle" scope="col">Subtotal</th>

                        <th width="15%" height="45" align="center" valign="middle" scope="col">&nbsp;</th>

                      </tr>

                    </thead>

                    <tbody>

                                        <form id="form3" name="form3" method="post" action="agregarproductocarrito.php"></form>

                      <tr>                      

                        <td width="20%" align="center" valign="middle"><div class="img imgcar"><img src="../images/productos/derecho-penal-parte-general-legales-ediciones.jpg" alt="TRATADO DE DERECHO PENAL - Parte General (3 Vol.)"></div></td>

                        <td width="35%" align="center" valign="middle">TRATADO DE DERECHO PENAL - Parte General (3 Vol.)</td>

                        <td width="10%" align="center" valign="middle">S/. 399.00</td>

                        <td width="10%" align="center" valign="middle">

                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">

                            <input name="cantidad" type="text" class="form-control" id="cantidad" value="1" maxlength="4">

                          </div>

                        </td>

                        <td width="10%" align="center" valign="middle">S/. 399.00</td>

                        <td width="15%" align="center" valign="middle">

                          <div class="acciones">

                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">

                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                <a href="borrarproductocarrito.php?codigoproducto=2272" onclick="if(confirm('Seguro Desea Eliminar?') == false){return false;}" title="Eliminar Item">

								del</a>

                              </div>

                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                <a href="borrarproductocarrito.php?codigoproducto=2272" onclick="if(confirm('Seguro Desea Eliminar?') == false){return false;}" title="Eliminar Item">

								upd</a>

                              </div>

                            </div>

                          </div>                          

                        </td>

                      </tr>

                      <input name="codigoproducto" type="hidden" value="2272">

                      <input name="foto" type="hidden" id="foto" value="../images/productos/derecho-penal-parte-general-legales-ediciones.jpg" size="3">

                      <input name="precio" type="hidden" id="precio" value="399" size="3">

                      <input name="origenlistaproductos" type="hidden" id="origenlistaproductos" value="2">

                    

                                        </tbody>

                    <tfoot>

                      <tr>

                        <!-- <td height="75" colspan="6" align="right" valign="middle">

                        </td>

                        -->

                      </tr>

                    </tfoot>

                  </table>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-8 col-lg-offset-8 bot1 btncomprar">

                  <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">SUBTOTAL: 1 ARTICULOS</div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top5">TOTAL: S/. 399.00</div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top10">

                      <a href="confirmapedido.php" class="btn btn-success">FINALIZAR COMPRA</a>

                    </div>

                  </div>

                </div>

                              </div>

            </div>

          </div>

        </div>



                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <a href="index.php" class="btn btn-success" title="Seguir comprando">SEGUIR COMPRANDO</a>

                          </div>



      </div>

    </div>