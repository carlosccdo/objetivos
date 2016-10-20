
<?php
 require_once('../models/editarModels.php');



 $valor = $_POST['valor'];


 if($valor==1){

		$refreshBloqueDos= new editarModels();
		echo $refreshBloqueDos->refrescarObjetivosBloqueDos($valor);

}else if($valor==3){

		$id = utf8_decode($_POST['id']);
		$tipo = utf8_decode($_POST['tipo']);
		$valorr = utf8_decode($_POST['valorr']);

		$changeName= new editarModels();

		 echo $changeName->cambiarNombreObjetivos($id,$tipo,$valorr);

}else if($valor==4){


		$id = utf8_decode($_POST['id']);
		$tipo = utf8_decode($_POST['tipo']);
		$valorr = utf8_decode($_POST['valorr']);

		$changeDescription= new editarModels();

		 echo $changeDescription->cambiarDescripcionObjetivos($id,$tipo,$valorr);

}else if($valor==6){


		$id = utf8_decode($_POST['id']);
		$img = utf8_decode($_POST['img']);
		$tipo = utf8_decode($_POST['tipo']);


		$updateImage= new editarModels();

		 echo  $updateImage->actualizarImagen($id,$img,$tipo);

}else if($valor==7){


		$id = utf8_decode($_POST['id']);
		$tipo = utf8_decode($_POST['tipo']);
		$valorr = utf8_decode($_POST['valorr']);

		$changeGender= new editarModels();

		echo $changeGender->cambiarGeneroObjetivos($id,$tipo,$valorr);

}else if($valor==5){


		$id = utf8_decode($_POST['id']);
		$tipo = utf8_decode($_POST['tipo']);

		$deleteObjetive= new editarModels();


		 echo  $deleteObjetive->borrarVinculoObjetivoProducto($id,$tipo);

}






?>
