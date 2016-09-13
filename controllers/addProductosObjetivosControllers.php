<?php
require_once('../models/addProductosObjetivosModels.php');
$tipo = utf8_decode($_POST['tipo']);
$idobjetivo = utf8_decode($_POST['idobjetivo']);
$idproducto= utf8_decode($_POST['idproducto']);
$estado= utf8_decode($_POST['estado']);

$update = new addProductosObjetivosModels();
$update->updateProducto($tipo,$idobjetivo,$idproducto,$estado);

 



?>
