<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body><br><br>
<center>
<div class="card" style="width: 40rem;">
  <div class="card-header">
    Formulario de Registro
  </div><br>
<form method="post">
    <label>Datos Usuarios</label>
    <input type="text" style="width: 75%" class="form-control" name="nombre" placeholder="Nombre" autocomplete="new-nombre" required><br>
    <label>Datos Email</label>
    <input type="email" style="width: 75%" class="form-control" name="email" placeholder="Email" autocomplete="new-emial" required><br>
    <label>Password</label>
    <input type="password" style="width: 75%" class="form-control" name="password" placeholder="Contraseña" autocomplete="new-password" required><br>
    <input type="submit" class="btn btn-dark" value="Registrar"><br>
</form><br>
</div>
</center>
</body>
</html> 