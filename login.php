<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'bdserviregistro');

    if (isset($_POST['iniciar_sesion'])) {
        $correo_electronico = $_POST['email'];
        $contraseña = $_POST['password'];


        
        // Verificar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('ss', $correo_electronico, $contraseña);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION['ID_Usuario'] = $usuario['id'];
            $_SESSION['Usuario'] = $usuario['nombre'];
            $_SESSION['Rol'] = $usuario['rol'];
    
            // Redirigir al dashboard correcto
            if ($_SESSION['Rol'] == 'admin') {
                header('Location: vista/dashboard_admin.php');
            } elseif ($_SESSION['Rol'] == 'user') {
                header('Location: vista/dashboard_usuario.php');
            }
            exit();
        } else {
            echo "<script> Swal.fire('Correo electrónico o contraseña incorrectos') </script>";
        }
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Login</title>
</head>
<body>
<br><br>
<center>
<div class="card" style="width: 35rem;">
  <div class="card-header">
    Login
</div><br>
<form method="post">
    <input type="email" style="width: 75%" class="form-control" name="email" placeholder="Email" autocomplete="new-email" required><br>
    <input type="password" style="width: 75%" class="form-control" name="password" placeholder="Contraseña" autocomplete="new-password" required><br>
    <input type="submit" class="btn btn-dark" name="iniciar_sesion" value="Login">
    <p>No Tienes Cuenta? - <span><a href="registro.php">Registrate</a></p>
</form><br>
</div>
</center>
</body>
</html>

