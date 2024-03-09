<?php
session_start();
include_once 'includes/validacion.php';
include_once 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Procesar el formulario de inicio de sesión
  // Validar los campos
  $correo = validar_datos($_POST['correo']);
  $contrasena = validar_datos($_POST['contrasena']);

  // Verificar las credenciales en la base de datos
  $consulta = "SELECT id, correo, contrasena FROM usuarios WHERE correo = '$correo'";
  $usuario = $conexion->query($consulta);

  if ($usuario->num_rows > 0) {
    // Usuario encontrado, verificar la contraseña
    $usuario = $usuario->fetch_assoc();
    if (password_verify($contrasena, $usuario['contrasena'])) {
      // Contraseña correcta, iniciar sesión
      $_SESSION['usuario_id'] = $usuario['id'];
      header("Location: inicio.php");
      exit();
    } else {
      // Contraseña incorrecta, mostrar mensaje de error
      echo "La contraseña ingresada es incorrecta.";
    }
  } else {
    // Usuario no encontrado, mostrar mensaje de error
    echo "El correo electrónico ingresado no está registrado.";
  }
}
?>

