<?php
 require_once('../../../config/config.inc.php');
require_once('../models/query.php');


$usuario = utf8_decode($_POST['usuario']);
$clave = utf8_decode($_POST['clave']);
$us;
$pw;

	$logings = Db::getInstance()->executeS("SELECT * FROM ps_objetivo_loging where usuario = '$usuario' AND clave = '$clave'");
				 						 				
					
						    foreach($logings as $loging){


						    	$us=$loging['usuario'];
						    	$pw=$loging['clave'];


						    }

						    if($us == $usuario && $pw == $clave){

						    		session_start();
								$_SESSION['usuario'] = $usuario;
								$_SESSION['clave'] = $clave;
								header("Location: ../objetivos.php");
						    }else{

						    	header("Location: ../loging.php");
						    	exit();
						    }

						

					


?>