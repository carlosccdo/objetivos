 	
<?php
require_once('../models/crearModels.php');
$genero = utf8_decode($_POST['genero']);
$img = utf8_decode($_POST['imgObjetivo']);
$objetivo = utf8_decode($_POST['objetivo']);
$obj = utf8_decode($_POST['obj']);
$selectSub = utf8_decode($_POST['selectSub']);
$descripcion = utf8_decode($_POST['descripcion']);

if(empty($img) && $obj=="nuevoObjetivo" ){

$nombreimg= "objetivo.jpeg";

}else if(empty($img) && $obj=="nuevoSubObjetivo" ){

$nombreimg= "subobjetivo.jpeg";

}else{

$ext = pathinfo($img, PATHINFO_EXTENSION);
$nombreimg= strtolower(str_replace(' ', '', $_POST['objetivo'])).'.'.$ext;


}


$insert = new crearModels();


$insert->crearObjetivo($objetivo,$obj,$selectSub,$nombreimg,$descripcion,$genero);

 



?>



