<?php
// Antonio Garcia Barrera
/* Añade un vínculo para borrar la cookie del ejemplo del libro: "contador_visitas.php" */

// Comprobar si la cookie 'visitas' no existe
if (!isset($_COOKIE['visitas'])) {
    // Si no existe crear la cookie
    setcookie('visitas', 1, time() + 3600 * 24);
    // Mensaje de bienvenida
    echo "Bienvenido por primera vez";
} else {
    // Si ya existe, obtener valor e incrementarlo
    $visitas = (int) $_COOKIE['visitas'];
    $visitas++; // Incrementar el numero de visitas
    setcookie('visitas', $visitas, time() + 3600 * 24); // Actualizar la cookie
    echo "Bienvenido por $visitas vez";
}

// Comprueba si se solicita borrar la cookie a traves del parámero
if (isset($_GET['borrar'])) {
    //Borrar la cookie
    setcookie('visitas', '', time() - 3600 * 24);
    // Mensaje de que la cookie se ha borrado
    echo "Visitas borradas";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>
</head>

<body>
    <!-- Enlace para borrar la cookie -->
    <a href="?borrar=true">Borrar cookie</a>

</body>

</html>