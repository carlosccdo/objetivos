
<?php 

require_once('../models/conexion.php');

class objetivoClass extends conexion {

	public function __construct() { 
      parent::__construct();
      
    } 

		


		public static function editarObjetivosVer(){
			
			$objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos");
				 						 				
						$add.= "<table><tr><th>ID</th><th class='nocentrar'>TIPO</th><th class='nocentrar'>NOMBRE OBJETIVO</th><th>DESCRIPCIÓN</th><th>IMAGEN</th><th>GENERO</th><th>BORRAR</th></tr>";

						    foreach($objs as $obj){
						    		$h=$obj['hombre'];
						    		$m=$obj['mujer'];
						    		$men='';
						    		$women='';
						    		$fm='';

						    	if(($h =='TRUE') && ($m=='FALSE')){
						    		$men='checked';
						    	}else if(($h =='FALSE') && ($m=='TRUE')){
						    		$women='checked';
						    	}else if(($h =='TRUE') && ($m=='TRUE')){
						    		$fm='checked';
						    	}



						$add.=  "<tr id='".$obj['id_objetivo'] ."' class='rowobjetivo'><td class='centrar'>".$obj['id_objetivo'] ."</td><td>Objetivo</td><td><input class='nombreObjetivo'  type=text value='".$obj['nombre_objetivo'] ."'></td><td><textarea rows='2' cols='35'> ".$obj['descripcion'] ."</textarea></td><td><div id='imagenobjetivo'><img  src='" . $obj['img'] . "'><input type='file' class='my_file' style='display: none;'/></div></td><td class='centrar'>  </td><td class='centrar'><a  class='deleted' href='#'><img src='img/delete.png' /></a></td></tr>";   
						
			$objss = Db::getInstance()->executeS("SELECT * FROM ps_subobjetivos WHERE id_objetivo='".$obj['id_objetivo'] ."'");


						  foreach($objss as $obj2){

						  			$hs=$obj2['hombre'];
						    		$ms=$obj2['mujer'];
						    		$generosubobjetivo;

						    		$smen='';
						    		$swomen='';
						    		$sfm='';

						    	if(($hs =='TRUE') && ($ms=='FALSE')){
						    		$smen='checked';
						    	}else if(($hs =='FALSE') && ($ms=='TRUE')){
						    		$swomen='checked';
						    	}else if(($hs =='TRUE') && ($ms=='TRUE')){
						    		$sfm='checked';
						    	}


						  	$add.=  "<tr id='".$obj2['id_subobjetivo'] ."' class='rowsubobjetivo'><td class='centrar'>".$obj2['id_subobjetivo'] ."</td><td>Sub-objetivo</td><td><input class='nombreObjetivo'  type=text value='".$obj2['nombre_subobjetivo'] ."'></td><td><textarea rows='2' cols='35'> ".$obj2['descripcion'] ."</textarea></td><td><div id='imagenobjetivo'><img  src='" . $obj2['img'] . "'><input type='file' class='my_file' style='display: none;' /></div></td><td ><input type='radio' name='".$obj2['id_subobjetivo']."' value='m' $smen>M<br><input type='radio' name='".$obj2['id_subobjetivo']."' value='f' $swomen> F<br><input type='radio' name='".$obj2['id_subobjetivo']."' value='fm' $sfm> F/M </td><td class='centrar'><a class='deleted'href='#'><img src='img/delete.png' /></a></td></tr>";   

						  }


		                    };

						$add .= "</table>";

						return $add;

		}




}




?> 