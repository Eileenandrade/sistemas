<?php
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'bdserviregistro';

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['id_usuario'];
    $fecha_hora_entrada = $_POST['fecha_entrada'];
    $fecha_hora_salida = $_POST['fecha_salida'];

    // Validar si los campos están llenos
    if (!empty($usuario_id) && !empty($fecha_hora_entrada) && !empty($fecha_hora_salida)) {
        // Consulta para insertar los datos en la tabla ingresos_salidas
        $query = "INSERT INTO ingresos_salidas (usuario_id, fecha_hora_entrada, fecha_hora_salida) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('iss', $usuario_id, $fecha_hora_entrada, $fecha_hora_salida);

        if ($stmt->execute()) {
            header("Location: ../vista/fingreso_salida.php?success=1");
            exit();
        } else {
            header("Location: ../vista/fingreso_salida.php?error=1");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: ../vista/fingreso_salida.php?error=2");
        exit();
    }
}
?>