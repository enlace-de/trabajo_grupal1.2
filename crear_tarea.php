<?php
session_start();
include_once 'includes/validacion.php';
include_once 'includes/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
  // Si el usuario no ha iniciado sesión, redirigir al inicio de sesión
  header("Location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener datos del formulario
  $descripcion = validar_datos($_POST['descripcion']);
  $usuario_id = $_SESSION['usuario_id']; // Obtener el ID del usuario de la sesión

  // Realizar la inserción de la nueva tarea en la base de datos
  $consulta = "INSERT INTO tareas (usuario_id, tarea_descripcion) VALUES ('$usuario_id', '$descripcion')";
  if ($conexion->query($consulta) === TRUE) {
    // Tarea creada con éxito, redirigir al usuario a la página principal
    header("Location: inicio.php");
    exit();
  } else {
    // Error al crear la tarea, mostrar mensaje de error
    echo "Error al crear la tarea: " . $conexion->error;
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Tarea</title>
</head>
<body>
  <h2>Crear Nueva Tarea</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Descripción de la tarea: <textarea name="descripcion" required></textarea><br> <!-- Añadido 'name="descripcion"' y 'required' -->
    <input type="submit" value="Crear Tarea">
  </form>
</body>
</html>
