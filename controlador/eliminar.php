<?php 
include_once("../conexiones/conedit.php");

$id = $_POST['id'];

$sentencia = $bd->prepare("DELETE FROM ingresos_salidas WHERE Id=:id;");
$sentencia ->bindParam(':id',$id);

if($sentencia->execute()){
	echo "<script> alert('Datos Eliminados')
		location.href = '../vista/listado_entrada_salida.php';</script>";
	
	
	 $sql = "SET @num = 0";
    $bd->query($sql);

    $sql = "UPDATE tu_tabla SET id = @num := (@num+1)";
    $bd->query($sql);

    $sql = "ALTER TABLE tu_tabla AUTO_INCREMENT = 1";
    $bd->query($sql);
	
}

else{
		echo "<script> alert('Error de Conexión')
		location.href = '../vista/listado.php';</script>";
}



?>