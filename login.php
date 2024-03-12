



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión Zapatos3000</h2>
    <form action="login.php" method="post">
        Correo electrónico: <input type="email" name="correo" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>

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
        $stmt = $conexion->prepare("SELECT id, correo, contrasena FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado) {
            // La consulta se ejecutó correctamente
            if ($resultado->num_rows > 0) {
                // Usuario encontrado, verificar la contraseña
                $usuario = $resultado->fetch_assoc();
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
        } else {
            // La consulta falló, mostrar mensaje de error
            echo "Error al ejecutar la consulta a la base de datos: " . $conexion->error;
        }
    }
    ?>
</body>
</html>




