<?php
session_start();

// cerrar sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio
header("Location: index.php");
exit();
?>
