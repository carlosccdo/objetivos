




//estilo de tabs 

$(document).ready(function() {

 			(function() {

                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });

            })();
 });


//seleccionar objetivo o subjetivo 


            $(document).ready(function() {


                $('#seleccionar input:radio[name=tipo]').on('change', function() {
              
                var select = $("#seleccionar :radio:checked").val();
                

                     switch (select) {
                        case "Objetivos":
                        $("#selecObjetivo").css("display","none");
                        $(".hid").css("display", "none");
                        $("#hid2").css("display", "none");
                        $('#selecObjetivo').prop('selectedIndex',0);
                        break;

                        case "Sub-objetivos":
                        $("#selecObjetivo").css("display", "inline-block");
                        $(".hid").css("display", "inline-block");
                        $("#hid2").css("display", "inline-block");
                        break;
                        
                        default:
                        $("#selecObjetivo").css("display", "none");
                         $(".hid").css("display", "none");
                         $("#hid2").css("display", "none");
                        $('#selecObjetivo').prop('selectedIndex',0);
              
                    }




                });


            });



//crear objetivo


$(document).ready(function() {


	 $('#section-bar-1').on('click','#enviar-btn', function(e) {  

		var obj;
		var selectObj;
	    var selectObj = $("#seleccionar :radio:checked").val();
	    var genero = $("#bloquegenero :radio:checked").val();
	    var selectSub = $("#selecObjetivo option:selected").val();
	    var descripcion = $("#descripcion").val();
	    //nombre imagen
	    var imgObjetivo = $("#nombreimg").val();
	    imgObjetivo = imgObjetivo.substring(imgObjetivo.lastIndexOf("\\") + 1, imgObjetivo.length);
	    var objetivo = $("input#name").val();

//objetivo o sub-objetivo
        
			  if(selectObj=="Objetivos"){
			  			  		
			  	obj = "nuevoObjetivo";

			  }else if (selectObj=="Sub-objetivos"){

			  	obj = "nuevoSubObjetivo";			  	

			  }	
//si ha elegido un sub-objetivo, pero no un objetivo padre		  

				if(selectObj=="Sub-objetivos" && selectSub==1 ){

					 $('#messagesObjetivo').html('<p>Elige un objetivo padre</p>');
					 $("#selecObjetivo").focus();


					

				}

//si no hay nombre
				 else if(objetivo == ""){

					 	$('#messagesObjetivo').html('<p>Ponle nombre a tu objetivo </p>');
					 	$("input#name").focus();

					 }
				else{
					
					$.ajax({
						type: "POST",
						url: "controllers/crearControllers.php",
						data: { objetivo:objetivo,obj:obj,selectSub:selectSub,imgObjetivo:imgObjetivo,descripcion:descripcion,genero:genero },

						}).done(function(msg) {
							
			                 
			                
			                $("input#name").val('');
			                $("#descripcion").val('');
			                $("#nombreimg").val('');
			                $('#checkobj').prop("checked", true);
			                $("#checkgenero").prop("checked", true);
			                $('#selecObjetivo > option[value="1"]').prop('selected', 'selected');   
			                $('#messagesObjetivo').html(msg);
                      $("#selecObjetivo").css("display","none");
                      $(".hid").css("display", "none");
                      $("#hid2").css("display", "none");
                      


			               if(html(msg) != "<p>el nombre ya existe</p>"){
			                location.reload();
			                
			               };

			            });


			//subir fotos a directorio
						
						
						var file_data = $("#nombreimg").prop("files")[0]; // Getting the properties of file from file field
					  	var form_data = new FormData(); // Creating object of FormData class
					  	form_data.append("nombreimg", file_data); // Appending parameter named file with properties of file_field to form_data
					    form_data.append("objetivoNombre",objetivo ) // Adding extra parameters to form_data
						 // form_data.append("user_id", 123) // Adding extra parameters to form_data
					  	$.ajax({
						    url: "controllers/subirImagen.php", // Upload Script
						    contentType: false,
						    processData: false,
						    data: form_data, // Setting the data attribute of ajax with file_data
						    type: 'post'

			  			});





			};

					return false;

					

				});
			});


//actualizamos los objetivos  del bloque dos

$(document).ready(function() {


           
          $('.tabs').on('click','#refresh', function() {  

   					$.ajax({
                    type: "POST",
                    url: "controllers/refrescarObjetivos.php",
                    data: {valor:1}
                    }).done(function(msg) {                      
                        $('#section-bar-3').html(msg);

                    });
               

        });
});

//actualizamos los objetivos  del select

$(document).ready(function() {


           
          $('#seleccionar').on('click','#checksub', function() {  

   					$.ajax({
                    type: "POST",
                    url: "controllers/refrescarObjetivos.php",
                    data: {valor:2}
                    }).done(function(msg) {                
                        $('#selecObjetivo').html(msg);

                    });
               

        });
});


//oculta el bloque donde aparecen los objetivos y sub-objetivos

$(document).ready(function() {

        
          $('#buscarProducto').on('click','.ocultarBloqueObjetivos', function() {  

 
               $(this).next().toggle();

        });
});





//añadir objetivos a productos

$(document).ready(function() {

		 $('#buscarProducto').on('click','.checkobjetivo', function() { 

      var estado = $(this).prop('checked');
		 	var idobjetivo = $(this).prop('id');
		 	var tipo = $(this).prop('name');
		 	var idproducto = $(this).parent().prop('id');
		           
		             $.ajax({
                    type: "POST",
                    url: "controllers/addProductosObjetivosControllers.php",
                      data: {tipo:tipo,idobjetivo:idobjetivo,idproducto:idproducto,estado:estado}
                    }).done(function(msg) {

                        
                        console.log(msg);

                    });
                });



		});


//buscar productos por id 


   $(document).ready(function() {


          $("input#idBuscar").keyup(function () {

             $("input#nameBuscar").val("");
          
                var idBuscar = $(this).val();


                $.ajax({
                    type: "POST",
                    url: "controllers/buscarProductoControllers.php",
                      data: {idBuscar: idBuscar}
                    }).done(function(msg) {

                        
                        $('#buscarProducto').html(msg);

                    });
                });
                
            });

//buscar productos por nombre

        $(document).ready(function() {


          $("input#nameBuscar").keyup(function () {
           $("input#idBuscar").val("");
          
                var nameBuscar = $(this).val();


                $.ajax({
                    type: "POST",
                    url: "controllers/buscarProductoControllers.php",
                      data: {nameBuscar: nameBuscar}
                    }).done(function(msg) {

                        
                        $('#buscarProducto').html(msg);

                    });
                });
                
            });

 /** $(document).ready(function() {
    $('#section-bar-3').on('click','.rowobjetivo td', function() { 
    
        $(".rowsubobjetivo").slideToggle("slow");

    });
});


**/

//cambiar el nombre del objetivo


   $(document).ready(function() {

  $('#section-bar-3').on('keyup',':text', function() { 
          

             
          
                var valorr = $(this).val();
                 var id = $(this).parent().parent().prop('id');
                 var tipo = $(this).parent().parent().prop('class');
                 

                $.ajax({
                    type: "POST",
                    url: "controllers/refrescarObjetivos.php",
                      data: {valor:3,id:id,tipo:tipo,valorr:valorr}
                    }).done(function(msg) {

                        
                       

                    });
                });
                
            });

   //cambiar la descripción

  $(document).ready(function() {

  $('#section-bar-3').on('keyup','textarea', function() { 
          

             
          
                var valorr = $(this).val();
                 var id = $(this).parent().parent().prop('id');
                 var tipo = $(this).parent().parent().prop('class');
                 

                $.ajax({
                    type: "POST",
                    url: "controllers/refrescarObjetivos.php",
                      data: {valor:4,id:id,tipo:tipo,valorr:valorr}
                    }).done(function(msg) {

                        
                       

                    });
                });
                
            });
