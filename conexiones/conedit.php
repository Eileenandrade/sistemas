<?php
$clave = "";
$usuario = "root";
$nombrebd = "bdserviregistro";
try{
	$bd = new PDO('mysql:host=localhost;dbname='.$nombrebd, $usuario, $clave);
	
}catch(Exception $e){
	
	echo "<script> alert('Error de Conexion a bd');</script>".$e->getMessage();
}

?>