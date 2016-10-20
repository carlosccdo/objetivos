<?php 
require_once('conexion.php');

class addProductosObjetivosModels extends conexion {

	public function __construct() { 
      parent::__construct();
      
   } 


//buscar producto por id

	  	public  function buscarProductoId($id){

			  
			   $productosId = Db::getInstance()->executeS("SELECT p.id_product as id, name FROM ps_product p INNER JOIN ps_product_lang pl  ON p.id_product=pl.id_product   where  pl.id_lang=3 AND p.id_product   LIKE '$id%' " );
			   
			   $objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos");			   

					//id y nombre de productos

						foreach ($productosId as $producto) {						

							echo  "<tr  class='ocultarBloqueObjetivos' ><td class='centrar'>".$producto['id'] ."</td><td>".$producto['name'] ."</td></tr>";
							echo  "<tr class='esconder'><td  colspan='2'>";
											echo "<ul>";
					//lista de objetivos
												  foreach($objs as $obj){
												  	
					//comprobar que estan check los objetivo

												  	$produ=$producto['id'];
												  	$objeid=$obj['id_objetivo'];
												  	$checks = Db::getInstance()->executeS("SELECT * FROM ps_objetivo_producto where  id_subobjetivo = 0 AND id_product= '$produ' AND id_objetivo = '$objeid'" );
												  	

												  	$checkobjetivo="";

												  	 foreach($checks as $check){
										  		
												  			$checkobjetivo="checked";
												  	
												  		};
   														

													echo  "<li id='".$producto['id'] ."'>".$obj['nombre_objetivo'] ."</li>"; 

													 echo "<ul>" ;
															 $objs2 = Db::getInstance()->executeS("SELECT * FROM ps_subobjetivos WHERE id_objetivo='".$obj['id_objetivo'] ."'");
					//lista de subobjetivos										 
															
													foreach($objs2 as $obj2){


					//comprobar que estan check los objetivo

												  	
												  	$subobjeid=$obj2['id_subobjetivo'];
												  	$subchecks = Db::getInstance()->executeS("SELECT * FROM ps_objetivo_producto where  id_subobjetivo ='$subobjeid'  AND id_product= '$produ' AND id_objetivo = '$objeid'" );
												  	

												  	$checksubobjetivo="";

												  	 foreach($subchecks as $subcheck){
										  		
												  			$checksubobjetivo="checked";
												  	
												  		};

															 		echo  "<li id='".$producto['id'] ."'><input id='".$obj2['id_subobjetivo'] ."' class='checkobjetivo'  type='checkbox'  name='subobjetivo' ".$checksubobjetivo."/><label for='checkbox-1'></label>".$obj2['nombre_subobjetivo'] ."</li>"; 

															 	};
													 echo"</ul>";
							                    };
				                   			 echo"</ul>";
				             echo  "</tr></td>";
						};


	 	}


//buscar producto por nombre 
	 	
	 	public  function buscarProductoNombre($name){

			   $productosNombre = Db::getInstance()->executeS("SELECT p.id_product as id, name FROM ps_product p INNER JOIN ps_product_lang pl  ON p.id_product=pl.id_product   where pl.id_lang=3 AND name  LIKE '%$name%'");

			    $objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos");
					

					//id y nombre de productos

						foreach ($productosNombre as $producto) {

							echo  "<tr class='ocultarBloqueObjetivos'><td class='centrar'>".$producto['id'] ."</td><td>".$producto['name'] ."</td></tr>";
							echo  "<tr class='esconder'><td  colspan='2'>";
											echo "<ul>";

											//lista de objetivos
												  foreach($objs as $obj){



											//comprobar que estan check los objetivo
												  	
												  	$produ=$producto['id'];
												  	$objeid=$obj['id_objetivo'];
												  	$checks = Db::getInstance()->executeS("SELECT * FROM ps_objetivo_producto where  id_subobjetivo = 0 AND id_product= '$produ' AND id_objetivo = '$objeid'" );
												  	

												  	$checkobjetivo="";

												  	 foreach($checks as $check){
										  		
												  			$checkobjetivo="checked";
												  	
												  		};



													echo  "<li id='".$producto['id'] ."'>".$obj['nombre_objetivo'] ."</li>"; 

													 echo "<ul>" ;

											//lista de subobjetivos		
															 $objs2 = Db::getInstance()->executeS("SELECT * FROM ps_subobjetivos WHERE id_objetivo='".$obj['id_objetivo'] ."'");

															 foreach($objs2 as $obj2){


															 	//comprobar que estan check los objetivo

												  	
												  	$subobjeid=$obj2['id_subobjetivo'];
												  	$subchecks = Db::getInstance()->executeS("SELECT * FROM ps_objetivo_producto where  id_subobjetivo ='$subobjeid'  AND id_product= '$produ' AND id_objetivo = '$objeid'" );
												  	

												  	$checksubobjetivo="";

												  	 foreach($subchecks as $subcheck){
										  		
												  			$checksubobjetivo="checked";
												  	
												  		};




															 		echo  "<li id='".$producto['id'] ."'><input   id='".$obj2['id_subobjetivo'] ."' class='checkobjetivo' type='checkbox'  name='subobjetivo' ".$checksubobjetivo." /><label for='checkbox-1'></label>".$obj2['nombre_subobjetivo'] ."</li>"; 

															 	};
													 echo"</ul>";
							                    };
				                   			 echo"</ul>";
				             echo  "</tr></td>";

						};


	 	}


//vincular objetivo con productos


	 	public function updateProducto($tipo,$idobjetivo,$idproducto,$estado){


	 		if($estado=='true'){

	 			if($tipo=="objetivo"){

				 		Db::getInstance()->executeS("INSERT INTO ps_objetivo_producto (id_product,id_objetivo) VALUES ('$idproducto','$idobjetivo')");


				 	}
				 if($tipo=="subobjetivo"){

				 			 $getobjetivos = Db::getInstance()->executeS("SELECT id_objetivo FROM ps_subobjetivos  where  id_subobjetivo = $idobjetivo");
			   
			   					
				 			 foreach($getobjetivos as $getobjetivo){

								 Db::getInstance()->executeS("INSERT INTO ps_objetivo_producto (id_product,id_objetivo,id_subobjetivo) VALUES ('$idproducto','".$getobjetivo['id_objetivo']."','$idobjetivo')");
                  
		                    };


				 		

				 	}

				 	

					}else if($estado=='false'){




						if($tipo=="objetivo"){

				 		Db::getInstance()->executeS("DELETE FROM ps_objetivo_producto WHERE id_objetivo='$idobjetivo' AND id_subobjetivo=0");


				 		}
						 if($tipo=="subobjetivo"){
				 			 
			   			Db::getInstance()->executeS("DELETE FROM ps_objetivo_producto WHERE id_subobjetivo='$idobjetivo' AND id_product='$idproducto'");
                  
		                    


				 		

				 	}





					}




	 	}


}


?>