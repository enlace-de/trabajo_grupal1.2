<?php
$servername = "localhost"; //lmacena el nombre del servidor de la base de datos (localhost en este caso).
$username = "usuario_bd"; // Almacena el nombre de usuario para acceder a la base de datos.
$password = "contraseña_bd"; // Almacena la contraseña del usuario para acceder a la base de datos.
$db_name = "nombre_bd"; // Almacena el nombre de la base de datos a la que se desea conectar.

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $db_name);

// Comprobar conexión
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}
?>



