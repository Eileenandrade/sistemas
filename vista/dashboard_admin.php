<?php
session_start();
if (!isset($_SESSION['ID_Usuario']) || $_SESSION['Rol'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
$perfil = $_SESSION['Rol'];
// Aquí va el código para obtener y mostrar datos específicos del docente
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard Administrador</title>
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
                        <a class="nav-link active text-white" aria-current="page" href="Listado_ingreso_salida.php">Listas Usuarios</a>
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

    <!-- Contenido Principal -->
    <div class="container mt-4">
    <div class="jumbotron jumbotron-fluid">
  <h1 class="display-4">Bienvenid@, <?php echo $_SESSION['Usuario']; ?>!</h1>
  <p class="lead">Tu perfil de acceso es: <?php echo $perfil; ?>.</p>
  <hr class="my-4">
</div>
    <div class="container mt-4">
        
        <div class="row mt-5">
            <!-- Panel de Estadísticas -->
            <div class="col-md-3">
                <div class="card text-center bg-light mb-3">
                    <div class="card-header">Usuarios Registrados</div>
                    <div class="card-body">
                        <h5 class="card-title">120</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-light mb-3">
                    <div class="card-header">Ingresos Hoy</div>
                    <div class="card-body">
                        <h5 class="card-title">30</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-light mb-3">
                    <div class="card-header">Salidas Hoy</div>
                    <div class="card-body">
                        <h5 class="card-title">25</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-light mb-3">
                    <div class="card-header">Usuarios Activos</div>
                    <div class="card-body">
                        <h5 class="card-title">10</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos e Informes -->
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gráfico de Ingresos y Salidas</div>
                    <div class="card-body">
                        <!-- Aquí iría un gráfico integrado, por ejemplo, usando Chart.js -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Últimos Registros</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Juan Pérez - Ingreso: 08:00 AM</li>
                            <li class="list-group-item">María López - Salida: 05:00 PM</li>
                            <!-- Más registros -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accesos Rápidos -->
        <div class="row mt-5">
            <div class="col-md-4">
                <button class="btn btn-success w-100 mb-3">Añadir Nuevo Usuario</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary w-100 mb-3">Ver Todos los Registros</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-secondary w-100 mb-3">Generar Reporte</button>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Control de Accesos. Todos los derechos reservados.</p>
        <a href="#" class="text-white">Documentación</a> | <a href="#" class="text-white">Soporte</a>
    </footer>
</body>
</html>