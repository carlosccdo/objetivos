<?php 


/**$target_path = "../img/"; 
$target_path = $target_path . basename( $_FILES['nombreimg']['name']); 

**/
$nombreImagen= $target_path . basename( $_FILES['nombreimg']['name']); 
//sacar extencion
$ext = pathinfo($nombreImagen, PATHINFO_EXTENSION);
$imagen = "../img/"; 

//quitarle los espacios y poner en minuscula
$nombre= strtolower(str_replace(' ', '', $_POST['objetivoNombre']));


$imagen .=  $nombre.'.'.$ext;



if(move_uploaded_file($_FILES['nombreimg']['tmp_name'], $imagen)) 
{ 
echo "El archivo ". basename( $_FILES['nombreimg']['name'])." ha sido subido exitosamente!"; 
} 
else
{ 
echo "Hubo un error al subir tu archivo! Por favor intenta de nuevo."; 
}