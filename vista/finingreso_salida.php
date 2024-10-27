<?php
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'bdserviregistro';

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}


// Consulta para obtener los usuarios desde la tabla usuarios
$query = "SELECT id, nombre FROM usuarios";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registro Entrada y Salida</title>
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="dashboard_admin.php">Control de Accesos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="fingreso_salida.php">Registros de Ingresos y Salidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="listado_entrada_salida.php">Listas Usuarios</a>
                    </li>
                  
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
                <div class="dropdown ms-3">
                    <div class="logout-link">
            <p><a href="../logout.php" class="btn btn-light">Cerrar sesión</a></p>
        </div>
                </div>
            </div>
        </div>
    </nav><br><br><center>
    <div class="card" style="width: 32rem;">
  <div class="card-header">
    Registro de Enntrada y Salida
  </div>
 

<form action="../controlador/registra_ingreso_salida.php" method="POST">
<div class="mb-3">
        <label for="id_usuario" class="form-label">Usuario</label>
        <select class="form-control" style="width: 75%" id="id_usuario" name="id_usuario" required>
            <option value="">Seleccione un usuario</option>
            <?php
            // Verificar si se encontraron usuarios
            if ($resultado->num_rows > 0) {
                // Rellenar el select con los usuarios de la base de datos
                while ($usuario = $resultado->fetch_assoc()) {
                    echo "<option value='" . $usuario['id'] . "'>" . $usuario['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay usuarios disponibles</option>";
            }
            ?>
        </select>
    </div>

    

    <div class="mb-3">
        <label for="fecha_entrada"  class="form-label">Fecha y Hora de Entrada</label>
        <input type="datetime-local" style="width: 75%" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
    </div>

    <div class="mb-3">
        <label for="fecha_salida" class="form-label">Fecha y Hora de Salida</label>
        <input type="datetime-local" style="width: 75%" class="form-control" id="fecha_salida" name="fecha_salida" required>
    </div>

    <button type="submit" class="btn btn-dark">Registrar</button><br><br>
</form>

</div>
</body>
</html>