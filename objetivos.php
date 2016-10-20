
       

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <link REL="stylesheet" TYPE="text/css" HREF="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/tabs.css" />
        <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
         

      


       <div class="container">
       

            

        



            
            <header class="codrops-header">

               <?php
                session_start();
                if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
                  header("Location:login.php");
                  exit();

                }
             echo "<div id='cerrar'><span> Bienvenido " . ucfirst($_SESSION['usuario']) . "</span><br> <a style= 'color: grey; text-decoration: none' href='login.php'>Cerrar session</a></div>";
            ?>
                <h1>Focus on your goal <span>Crea objetivos y vinculalos a tus productos</span></h1>
            </header>

            <section id="maidContenedor">
                    <div class="tabs tabs-style-bar">
                         <nav>
                            <ul>
                               <li><a href="#section-bar-1" class="icon icon-box"><span>Crear objetivos</span></a></li>
                               <li id="refresh" ><a href="#section-bar-3" class="icon icon-display"><span>Editar objetivos</span></a></li>
                               <li id="refreshbloqueTres"><a href="#section-bar-2" class="icon icon-upload"><span>Vincular objetivos</span></a></li>
                               <!--<li><a href="#section-bar-4" class="icon icon-tools"><span>d</span></a></li>-->
                               
                            </ul>
                         </nav>
                              <div class="content-wrap">


                                  <!--crear objetivos-->
                                      <section id="section-bar-1">
                                        <div id="centrar-Columna-uno">
                                             <div id="register_form">
                                                    <form name="register" method="post" action=""  >


                                                             <!--selecionar objetivo o subobjetivos-->
                                                             <div class="linea">
                                                             <label class="celda1" id="tiporadio" for="nombre">Tipo:</label>
                                                              <div class="celda" id="seleccionar">
                                                                <input type="radio" name="tipo" id="checkobj" value="Objetivos" checked> Objetivo<br>
                                                                <input type="radio" name="tipo" id="checksub" value="Sub-objetivos"> Sub-objetivo
                                                              </div>
                                                              </div>

                                                              <!--selccionar objetivo-->
                                                              <div class="linea" id="hid2">
                                                              <label class="celda1"  for="nombre">Objetivo<br>padre</label>
                                                              <select class="celda" id="selecObjetivo"></select>
                                                              </div>
                                                         
                                                              <!--Escribir nombre de  objetivo-->
                                                              <div class="linea">
                                                              <label class="celda1" for="nombre">Nombre:</label>
                                                              <input class="celda" type="text" id="name" name="name" />
                                                              </div>

                                                               <!--Seleccionar genero-->
                                                               <div class="linea" id="ocultarGenero">
                                                              <label id="sexoInput" class="celda1" for="sexo">Genero:</label>
                                                              <div class="celda" id="bloquegenero">
                                                                <input type="radio" name="sexo" id="checkgenero" value="hm" checked> Femenino/Masculino<br>
                                                                <input type="radio" name="sexo" id="" value="m"> Femenino<br>
                                                                <input type="radio" name="sexo" id="" value="h"> Masculino
                                                              </div>
                                                              </div>


                                                               <!--Descripción-->
                                                               <div class="linea">
                                                                <label  class="celda1" for="nombre">Description:</label>
                                                                <textarea id="descripcion" class="celda"></textarea> 
                                                               </div>

                                                               <!--Imagen-->
                                                                <div class="linea">
                                                                <label class="celda1" for="nombre">Imagen:</label>                                                                
                                                               <input class="celda" type="file" name="nombreimg" id="nombreimg" value="hola"> 
                                                                </div> 
                                                                 <!--Enviar-->
                                                                 <div class="linea">
                                                                 <div class="celda1">
                                                                   <input name="submit" type="submit" value="Crear" id="enviar-btn" />
                                                                 </div>
                                                                 </div>
                                                       </form>
                                                   

                                               
                                            </div>

                                                      



                                              <!--resultados al crear objetivos-->
                                             <div id='messagesObjetivo'>

                                             </div>

                                           </div>
                                   </section>

                                   <!--editar objetivos-->

                                   <section id="section-bar-3">

                                   

                                   </section>
                                   


                                 <!--añadir objetivo a productos-->
                                   <section id="section-bar-2">


                                                <div id="buscar_form">
                                                    <table id="cabecera" >
                                                        <tr class="centrar"><td>ID</td><td>PRODUCTOS</td></tr>
                                                        <tr class="centrar"><td><input type="text" id="idBuscar" name="idBuscar"/></td><td><input type="text" id="nameBuscar" name="nameBuscar" /></td></tr>
                                                  
                                                    </table>
                                                    <table id="buscarProducto"></table>
                                                   
                                                </div>

                                            
                                                 <!--resultados -->
                                                <div id='messages'></div>

                                    </section>
                                    
                                    <section id="section-bar-4"><p>4</p></section>
                                    <section id="section-bar-5"><p>5</p></section>


                          </div><!-- /content -->
                    </div><!-- /tabs -->
            </section>
           
</div>




<script type="text/javascript" src="js/objetivos.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/cbpFWTabs.js"></script>

 <!--scrip que no funcionaban en el normal-->


       