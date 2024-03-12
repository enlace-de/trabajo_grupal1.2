<?php
session_start();

// Si el usuario ya ha iniciado sesión, redirigirlo a la página principal
if (isset($_SESSION['usuario_id'])) {
  header("Location: inicio.php");
  exit();
}

// Si el usuario no ha iniciado sesión, mostrar opciones
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
</head>
<body>
  <h1>Bienvenido al sistema de gestión de tareas de Zapatos3000</h1>

  <p>¿Aún no tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
  <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>

