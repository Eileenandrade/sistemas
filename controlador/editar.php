<?php
include_once("../conexiones/conedit.php");

// Obtener los datos del formulario
$usuario_id = $_POST['usuario_id'];
$id = $_POST['update_id'];
$name = $_POST['name'];
$fecha_entrada = $_POST['fechaentrada'];
$fecha_salida = $_POST['fecha_salida'];

$sentenciauser = $bd->prepare("UPDATE usuarios SET  nombre = ? WHERE id = ?;");
// Preparar la consulta para actualizar los datos
$sentencia = $bd->prepare("UPDATE ingresos_salidas SET  fecha_hora_entrada = ?, fecha_hora_salida = ? WHERE id = ?;");

$resultadouser = $sentenciauser->execute([$name, $usuario_id]);

// Ejecutar la consulta con los valores correctos
$resultado = $sentencia->execute([$fecha_entrada, $fecha_salida, $id]);

// Verificar si la actualización fue exitosa
if ($resultado) {
    echo "<script>alert('Actualización Realizada'); location.href = '../vista/listado_entrada_salida.php';</script>";
} else {
    echo "Error en la actualización.";
}
?>
