<?php
session_start(); // Asegúrate de que la sesión esté iniciada

// Conexión a la base de datos
$host = 'localhost';
$db = 'bdserviregistro';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$resultados = []; // Inicializa la variable $resultados
$error = ''; // Variable para almacenar errores


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];   

    if (isset($pdo)) {
        try {
            $sql = "SELECT 
                i.id,
                i.fecha_hora_entrada,
                i.fecha_hora_salida
            FROM 
                ingresos_salidas i
            INNER JOIN 
                usuarios u ON i.usuario_id = u.id
            WHERE 
                u.nombre = :nombre_usuario";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre_usuario', $nombre_usuario);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($resultados)) {
                $error = 'No se encontraron resultados para el nombre de usuario proporcionado.';
            }
        } catch (PDOException $e) {
            $error = "Error al ejecutar la consulta: " . $e->getMessage();
        }
    } else {
        $error = "Error: No se pudo conectar a la base de datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard Usuarios</title>
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
    </nav>

    <div class="container mt-4">
    <div class="jumbotron jumbotron-fluid">
    <h1 class="display-4">Bienvenid@, <?php echo $_SESSION['usuario']; ?>!</h1>
  <p class="lead">Tu perfil de acceso es: <?php echo $_SESSION['rol']; ?>.</p>
  <hr class="my-4">

  
</div>

        <!-- Formulario de búsqueda -->
        <form method="POST" action="">
            <input type="text" name="nombre_usuario" class="form-control" placeholder="Ingrese el nombre del usuario" required><br>
            <button class="btn btn-dark" type="submit">Buscar</button>
        </form>

        <!-- Mostrar mensajes de error -->
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger mt-4">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- Mostrar los resultados -->
        <?php if (!empty($resultados)) : ?>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Visita</th>
                        <th>Fecha y Hora de Entrada</th>
                        <th>Fecha y Hora de Salida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $row) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['fecha_hora_entrada']); ?></td>
                            <td><?php echo htmlspecialchars($row['fecha_hora_salida']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>