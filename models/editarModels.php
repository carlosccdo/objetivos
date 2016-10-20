<?php 

require_once('../class/objetivoClass.php');

	class editarModels extends conexion {

	public function __construct() { 
      parent::__construct();
      
    } 


   public function refrescarObjetivosBloqueDos($val){

	echo objetivoClass::editarObjetivosVer();

   }

	public function cambiarNombreObjetivos($id,$tipo,$valorr){

					if($tipo=='rowobjetivo'){

							Db::getInstance()->executeS("UPDATE ps_objetivos SET nombre_objetivo='$valorr' WHERE id_objetivo = '$id' ");

			          };
			          if($tipo=='rowsubobjetivo'){

							Db::getInstance()->executeS("UPDATE ps_subobjetivos SET nombre_subobjetivo='$valorr' WHERE id_subobjetivo = '$id' ");

			          };

		}


	public function cambiarDescripcionObjetivos($id,$tipo,$valorr){

					if($tipo=='rowobjetivo'){

							Db::getInstance()->executeS("UPDATE ps_objetivos SET descripcion='$valorr' WHERE id_objetivo = '$id' ");

			          };
			          if($tipo=='rowsubobjetivo'){

							Db::getInstance()->executeS("UPDATE ps_subobjetivos SET descripcion='$valorr' WHERE id_subobjetivo = '$id' ");

			          };


		}


	public function  actualizarImagen($id,$img,$tipo){

			$directorioimg= 'img/';
		   	$ext = pathinfo($img, PATHINFO_EXTENSION);
			$nombreimg;
				
						

					if($tipo=='rowobjetivo'){

						
					   

										$objs2 = Db::getInstance()->executeS("SELECT nombre_objetivo FROM ps_objetivos WHERE id_objetivo=$id");
										
										foreach($objs2 as $obj){
													$nombreimg= strtolower(str_replace(' ', '', $obj['nombre_objetivo'])).'.'.$ext;
													$ruta=$directorioimg.$nombreimg;
										    		Db::getInstance()->executeS("UPDATE ps_objetivos SET img='$ruta' WHERE id_objetivo = '$id'");
										    };					
						          };
					if($tipo=='rowsubobjetivo'){

										$objs2 = Db::getInstance()->executeS("SELECT nombre_subobjetivo FROM ps_subobjetivos WHERE id_subobjetivo=$id");


										foreach($objs2 as $obj){
													$nombreimg= strtolower(str_replace(' ', '', $obj['nombre_subobjetivo'])).'.'.$ext;
													$ruta=$directorioimg.$nombreimg;
										Db::getInstance()->executeS("UPDATE ps_subobjetivos SET img='$ruta' WHERE id_subobjetivo = '$id'");

						          };

						          };



					echo objetivoClass::editarObjetivosVer();






		}

		public function cambiarGeneroObjetivos($id,$tipo,$valorr){

					if($tipo=='rowobjetivo'){

						if($valorr=='m'){
							Db::getInstance()->executeS("UPDATE ps_objetivos SET hombre='TRUE', mujer= 'FALSE' WHERE id_objetivo = '$id' ");

						}else if($valorr=='f'){
							Db::getInstance()->executeS("UPDATE ps_objetivos SET hombre='FALSE', mujer= 'TRUE' WHERE id_objetivo = '$id' ");

						}else if($valorr=='fm'){
							Db::getInstance()->executeS("UPDATE ps_objetivos SET hombre='TRUE', mujer= 'TRUE' WHERE id_objetivo = '$id' ");

						}

							

			          };
			          if($tipo=='rowsubobjetivo'){

								if($valorr=='m'){
							Db::getInstance()->executeS("UPDATE ps_subobjetivos SET hombre='TRUE', mujer= 'FALSE' WHERE id_subobjetivo = '$id' ");

						}else if($valorr=='f'){
							Db::getInstance()->executeS("UPDATE ps_subobjetivos SET hombre='FALSE', mujer= 'TRUE' WHERE id_subobjetivo = '$id' ");

						}else if($valorr=='fm'){
							Db::getInstance()->executeS("UPDATE ps_subobjetivos SET hombre='TRUE', mujer= 'TRUE' WHERE id_subobjetivo = '$id' ");

						}

			          };




		}

	public function borrarVinculoObjetivoProducto($id,$tipo){

					$existe='';
					if($tipo=='rowobjetivo'){

							$verificar = Db::getInstance()->executeS("SELECT * FROM ps_subobjetivos WHERE id_objetivo ='$id'");

								
								foreach($verificar as $check){
							    		$existe=$check['id_subobjetivo'];
							    };
								    if($existe != ''){
								    	echo "<script language='javascript'> alert('Debes borrar primero los sub-objetivos de este objetivo')</script>";
								    }else{
								    	Db::getInstance()->executeS("DELETE FROM ps_objetivos  WHERE id_objetivo = '$id' ");
								    }	


				        		    }else if($tipo=='rowsubobjetivo'){
										Db::getInstance()->executeS("DELETE FROM ps_subobjetivos WHERE id_subobjetivo = '$id' ");
						            };


							echo objetivoClass::editarObjetivosVer();

		}




}

?>

