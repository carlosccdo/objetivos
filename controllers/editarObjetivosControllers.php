
<?php
require_once('../models/editarModels.php');


$id = utf8_decode($_POST['id']);
$tipo = utf8_decode($_POST['tipo']);
$valor = utf8_decode($_POST['valor']);


/**$refrescar = new editarModels();
$refrescar->refrescar();**/

$cambiar = new editarModels($id,$tipo,$valor);
$cambiar->cambiarValores();








?>
