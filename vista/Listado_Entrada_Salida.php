<?php
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'bdserviregistro';

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}


// Consulta para obtener todos los registros de ingresos y salidas
$query = "SELECT 
    i.id,
    u.nombre AS Usuario,
    i.fecha_hora_entrada,
    i.fecha_hora_salida
FROM 
    ingresos_salidas i
INNER JOIN 
    usuarios u ON i.usuario_id = u.id";

$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ingresos y Salidas</title>
<!--Datable -->
<link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
	
	<link rel="stylesheet" type="text/css" href="../datatables/css/dataTables.bootstrap4.min.css">
	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
</head>
<body>
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
                        <a class="nav-link active text-white" aria-current="page" href="Listado_Entrada_Salida.php">Listas Usuarios</a>
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
        <h2>Listado de Ingresos y Salidas</h2>
        <table id="tablaUsuarios" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha y Hora de Entrada</th>
                    <th>Fecha y Hora de Salida</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['Usuario']); ?></td>
                        <td><?php echo htmlspecialchars($row['fecha_hora_entrada']); ?></td>
                        <td><?php echo htmlspecialchars($row['fecha_hora_salida']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script> 


<!-- Libreria js datable -->

<script type="text/javascript" src="../datatables/datatables.min.js"></script> 

<!--- js datable --->
<script src="../datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script> 
<script src="../datatables/JSZip-2.5.0/jszip.min.js"></script> 
<script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script> 
<script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script> 
<script src="../datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script> 


 <script type="text/javascript" src="../js/main.js"></script>  
 <script>

$('.deletebtn').on('click',function(){
 
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
		return $(this).text();
	});
	$('#delete_id').val(datos[0]);
	});
    </script>

<script>
   $(document).ready(function(){
	$('#tablaUsuarios').DataTable();	
});

</script>
</body>
</html>