 	
<?php
 require_once('../../../config/config.inc.php');
 require_once('../models/query.php');




 $valor = $_POST['valor'];



 if($valor==1){


function refrescarObjetivosBloqueDos($val){





	$objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos");
				 						 				
						$add.= "<table><tr><th>ID</th><th>TIPO</th><th>NOMBRE OBJETIVO</th><th>DESCRIPCIÓN</th><th>IMAGEN</th><th>GENERO</th></tr>";

						    foreach($objs as $obj){
						    		$h=$obj['hombre'];
						    		$m=$obj['mujer'];
						    		$generoobjetivo;

						    	if(($h =='TRUE') && ($m=='FALSE')){
						    		$generoobjetivo='HOMBRE';
						    	}else if(($h =='FALSE') && ($m=='TRUE')){
						    		$generoobjetivo='MUJER';
						    	}else{
						    		$generoobjetivo='MUJER / HOMBRE';
						    	}



						$add.=  "<tr id='".$obj['id_objetivo'] ."' class='rowobjetivo zoom'><td>".$obj['id_objetivo'] ."</td><td>Objetivo</td><td><input  type=text value='".$obj['nombre_objetivo'] ."'></td><td><textarea rows='2' cols='35'> ".$obj['descripcion'] ."</textarea></td><td><div id='imagenobjetivo'><img  src='" . $obj['img'] . "'></div></td><td>$generoobjetivo</td></tr>";   
						
	$objss = Db::getInstance()->executeS("SELECT * FROM ps_subobjetivos WHERE id_objetivo='".$obj['id_objetivo'] ."'");


						  foreach($objss as $obj2){

						  			$hs=$obj2['hombre'];
						    		$ms=$obj2['mujer'];
						    		$generosubobjetivo;

						    	if(($hs =='TRUE') && ($ms=='FALSE')){
						    		$generosubobjetivo='HOMBRE';
						    	}else if(($hs =='FALSE') && ($ms=='TRUE')){
						    		$generosubobjetivo='MUJER';
						    	}else{
						    		$generosubobjetivo='MUJER / HOMBRE';
						    	}


						  	$add.=  "<tr id='".$obj2['id_subobjetivo'] ."' class='rowsubobjetivo zoom'><td>".$obj2['id_subobjetivo'] ."</td><td>Sub-objetivo</td><td><input type=text value='".$obj2['nombre_subobjetivo'] ."'></td><td><textarea rows='2' cols='35'> ".$obj2['descripcion'] ."</textarea></td><td><div id='imagenobjetivo'><img  src='" . $obj2['img'] . "'></div></td><td>$generosubobjetivo</td></tr>";   

						  }


		                    };

						$add .= "</table>";

						return $add;

}

echo refrescarObjetivosBloqueDos($valor);

}else if($valor==2){

function refrescarObjetivosDesplegable($val){


	 $objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos");

	  					$add .= " <option value='1'>seleccionar...</option>";
                                                               
  
                       foreach($objs as $obj){

                        $add .=  "<option>".$obj['nombre_objetivo'] ."</option>"; 

                         };

                         return $add;
                                                                

}

echo refrescarObjetivosDesplegable($valor);

}else if($valor==3){


$id = utf8_decode($_POST['id']);
$tipo = utf8_decode($_POST['tipo']);
$valorr = utf8_decode($_POST['valorr']);

function cambiarNombreObjetivos($id,$tipo,$valorr){


				if($tipo=='rowobjetivo'){

						Db::getInstance()->executeS("UPDATE ps_objetivos SET nombre_objetivo='$valorr' WHERE id_objetivo = '$id' ");

		          };
		          if($tipo=='rowsubobjetivo'){

						Db::getInstance()->executeS("UPDATE ps_subobjetivos SET nombre_subobjetivo='$valorr' WHERE id_subobjetivo = '$id' ");

		          };




	}

 echo cambiarNombreObjetivos($id,$tipo,$valorr);

}else if($valor==4){


$id = utf8_decode($_POST['id']);
$tipo = utf8_decode($_POST['tipo']);
$valorr = utf8_decode($_POST['valorr']);

function cambiarDescripcionObjetivos($id,$tipo,$valorr){


				if($tipo=='rowobjetivo'){

						Db::getInstance()->executeS("UPDATE ps_objetivos SET descripcion='$valorr' WHERE id_objetivo = '$id' ");

		          };
		          if($tipo=='rowsubobjetivo'){

						Db::getInstance()->executeS("UPDATE ps_subobjetivos SET descripcion='$valorr' WHERE id_subobjetivo = '$id' ");

		          };




	}

 echo cambiarDescripcionObjetivos($id,$tipo,$valorr);

}

 


?>

