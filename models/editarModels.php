<?php 
require_once('query.php');

class editarModels extends query {

	public function __construct() { 
      parent::__construct();
      
   } 





  function cambiarNombreObjetivos($id,$tipo,$valor){


				if($tipo=='rowobjetivo'){

						Db::getInstance()->executeS("UPDATE ps_objetivos SET nombre_objetivo='$valor' WHERE id_objetivo = '$id' ");

		          };



	}



	













}

?>

