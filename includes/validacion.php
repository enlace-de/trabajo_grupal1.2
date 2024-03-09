<?php
// Función para validar datos ingresados por el usuario
function validar_datos($dato) {
    // Eliminar espacios en blanco al principio y al final
    $dato = trim($dato);
    // Eliminar barras invertidas
    $dato = stripslashes($dato);
    // Convertir caracteres especiales a entidades HTML
    $dato = htmlspecialchars($dato);
    return $dato;
}
?>
