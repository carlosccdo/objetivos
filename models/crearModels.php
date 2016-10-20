<?php 
require_once('conexion.php');

class crearModels extends conexion {

	public function __construct() { 
      parent::__construct();
      
   } 



public  function crearObjetivo($objetivo,$obj,$selectSub,$nombreimg,$descripcion,$genero){


//saber si el el nombre existe en la base de datos

	
			$existe;

			if($obj=="nuevoObjetivo"){
				$exist = Db::getInstance()->executeS("SELECT * FROM ps_objetivos where nombre_objetivo='$objetivo'");
		 			  foreach($exist as $ex){

								     $existe= $ex['nombre_objetivo'];           
		                    };
		 	}

		 	else if($obj=="nuevoSubObjetivo"){	
		 			$exist = Db::getInstance()->executeS("SELECT * FROM ps_subobjetivos where nombre_subobjetivo='$objetivo'");
		 			  foreach($exist as $ex){

								$existe= $ex['nombre_subobjetivo'];               
		                    };
			}

			if($existe==$objetivo){

				echo "<p>el nombre ya existe</p>";

			}else{


			$directorioimg= 'img/';
			$ruta=$directorioimg.$nombreimg;



//saber si es un objetivo para hombre mujer o para los dos
			$mujer;
			$hombre;
			if($genero=="h"){
				$hombre="TRUE";
				$mujer="FALSE";

			}else if($genero=="m"){
				$hombre="FALSE";
				$mujer="TRUE";

			}else{

				$hombre="TRUE";
				$mujer="TRUE";
			};

//recoge si es objetivo o subobjetivo

	
		 	if($obj=="nuevoObjetivo"){
		 		Db::getInstance()->executeS("INSERT INTO ps_objetivos (nombre_objetivo,descripcion,img,hombre,mujer) VALUES ('$objetivo','$descripcion','$ruta','$hombre','$mujer')");
		 	}

		 	if($obj=="nuevoSubObjetivo"){		
		 			$objsS = Db::getInstance()->executeS("SELECT id_objetivo FROM ps_objetivos where nombre_objetivo='$selectSub'");
		 			  foreach($objsS as $ob){
								 Db::getInstance()->executeS("INSERT INTO  ps_subobjetivos (nombre_subobjetivo,id_objetivo,descripcion,img,hombre,mujer) VALUES ('$objetivo','".$ob['id_objetivo']."','$descripcion','$ruta','$hombre','$mujer')");                   
		                    };

			}

//muestra los resultados
				 
			 $objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos where nombre_objetivo = '$objetivo' ");
				 						 									
					  foreach($objs as $obj){

						//echo  "<div> nombre:".$obj['nombre_objetivo'] ."</div><div>descrpción:".$obj['descripcion'] ."</div><div id='imagenobjetivo'>imagen:<img  src='" . $obj['img'] . "'></div>";   
						    	
		                    };
					
		                    echo  "<p>Objetivo creado </p>";
	 			}

}



public function refrescarObjetivosDesplegable($val){


	 		$objs = Db::getInstance()->executeS("SELECT * FROM ps_objetivos");

	  					$add .= " <option value='1'>seleccionar...</option>";
                                                               
  
                       foreach($objs as $obj){

                        $add .=  "<option>".$obj['nombre_objetivo'] ."</option>"; 

                         };

                         return $add;
                                                                
}


}


?>
