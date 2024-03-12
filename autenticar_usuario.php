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
      echo "<p style='color: red'>La contraseña ingresada es incorrecta.</p>";
    }
  } else {
    // Usuario no encontrado, mostrar mensaje de error
    echo "<p style='color: red'>El correo electrónico ingresado no está registrado.</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
</head>
<body>
  <h2>Iniciar Sesión</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Correo electrónico: <input type="email" name="correo" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" value="Iniciar Sesión">
  </form>
</body>
</html>


