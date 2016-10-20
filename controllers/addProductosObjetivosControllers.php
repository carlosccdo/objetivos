<?php
require_once('../models/addProductosObjetivosModels.php');




$valor = $_POST['valor'];


	if($valor==1){

		$tipo = utf8_decode($_POST['tipo']);
		$idobjetivo = utf8_decode($_POST['idobjetivo']);
		$idproducto= utf8_decode($_POST['idproducto']);
		$estado= utf8_decode($_POST['estado']);
		$update = new addProductosObjetivosModels();
		$update->updateProducto($tipo,$idobjetivo,$idproducto,$estado);

	 
	}else if($valor==2){

		
		$idBuscar = utf8_decode($_POST['idBuscar']);
		$nombreBuscar = utf8_decode($_POST['nameBuscar']);


		if (!empty($_POST['idBuscar'])) {
		$idProducto = new addProductosObjetivosModels();
		$idProducto->buscarProductoId($idBuscar);

		};


		if (!empty($_POST['nameBuscar'])) {
			$nombreProducto = new addProductosObjetivosModels();
		$nombreProducto->buscarProductoNombre($nombreBuscar);
		};


	}


?>
