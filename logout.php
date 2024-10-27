<?php
// Cerrar sesión del usuario y redirigir a la página de inicio de sesión

session_start(); // Iniciar sesión
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión actual

header('Location: login.php'); // Redirigir al usuario a la página de inicio de sesión
exit(); // Finalizar el script
?>
