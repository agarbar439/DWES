<?php
// Antonio Garcia Barrera
/* Crea una página web con un formulario para elegir el idioma en el que se muestra, inglés o español. Almacena la elección del usuario con una cookie para que la siguiente vez que el usuario se conecte la página aparezca directamente en su idioma. Si la cookie no existe, la página se mostrará en español. */


// Comprobar si se ha enviado el formulario
if (isset($_POST['idioma'])) {
    // Almacenar el idioma seleccionado en una cookie
    setcookie('idioma', $_POST['idioma'], time() + 3600 * 24 * 30);
    header("Location: " . $_SERVER['PHP_SELF']); // Recargar la página
    exit; // Detener el script para que no  se ejecute el resto del código
}

// Comprobar si ya existe la cookie 'idioma'
if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma']; // Recuperar el idioma almacenado en la cookie
} else {
    $idioma = 'es'; // Si la cookie no existe, español por defecto
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad 3</title>
</head>

<body>
    <form method="POST">

        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Ciudad: <input type="text" name="ciudad"></p>

        <select name="idioma">
            <option value="selecciona">Selecciona un idioma</option>
            <option value="es" <?php if ($idioma == 'es') {
                echo 'selected';
            } ?>>Español</option>
            <option value="in" <?php if ($idioma == 'in') {
                echo 'selected';
            } ?>>Inglés</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Guardar">
        <input type="reset" value="Borrar">
        </p>
    </form>

</body>

</html>