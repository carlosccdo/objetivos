
<?php
require_once('../models/addProductosObjetivosModels.php');

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






?>
