
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres del documento -->
    <title>Registro de Usuario</title> <!-- Título de la página que aparecerá en la pestaña del navegador -->
</head>
<body>
    <h2>Registro de Usuario</h2> <!-- Encabezado que indica el propósito del formulario -->
    <form action="registrar_usuario.php" method="post"> <!-- Formulario de registro que envía los datos a 'registrar_usuario.php' mediante el método POST -->
        Nombre: <input type="text" name="nombre" required><br> <!-- Campo de entrada para el nombre del usuario, con la etiqueta 'required' que indica que es obligatorio -->
        Apellido: <input type="text" name="apellido" required><br> <!-- Campo de entrada para el apellido del usuario, con la etiqueta 'required' que indica que es obligatorio -->
        Correo electrónico: <input type="email" name="correo" required><br> <!-- Campo de entrada para el correo electrónico del usuario, con la etiqueta 'required' que indica que es obligatorio y 'type="email"' que valida que se introduzca un formato de correo válido -->
        Contraseña: <input type="password" name="contrasena" required><br> <!-- Campo de entrada para la contraseña del usuario, con la etiqueta 'required' que indica que es obligatorio y 'type="password"' que oculta el texto ingresado -->
        <input type="submit" value="Registrarse"> <!-- Botón de envío del formulario -->
    </form>
</body>
</html>
