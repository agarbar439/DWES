<?php
// Comprobar si se ha enviado el formulario
if (isset($_POST['color'])) {
    // Almacenar el idioma seleccionado en una cookie
    setcookie('color', $_POST['color'], time() + 3600 * 24 * 30);
    header("Location: " . $_SERVER['PHP_SELF']); // Recargar la página
    exit; // Detener el script para que no  se ejecute el resto del código
}

// Comprobar si ya existe la cookie 'color'
if (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color']; // Recuperar el color almacenado en la cookie
} else {
    $color = 'white'; // Si la cookie no existe, blanco por defecto
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio propuesto 1</title>
</head>

<!--Establece el estilo del background con la variable color-->

<body style="background-color: <?php echo $color; ?>;">
    <h3>Crea una página web con un formulario para elegir el color de fondo.
        Almacena la elección del usuario con una cookie para que la siguiente vez que el usuario se conecte la página aparezca directamente con ese color.</h3>

    <form method="POST">
        <label for="color">Color de fondo:</label>
        <select name="color" id="color">
            <option value="selecciona">Selecciona un color</option>

            <option value="red" <?php if ($color == 'red') echo 'selected'; ?>>Rojo</option> <!--Cambiar color a rojo -->
            <option value="green" <?php if ($color == 'green') echo 'selected'; ?>>Verde</option> <!--Cambiar color a verde -->
            <option value="white" <?php if ($color == 'white') echo 'selected'; ?>>Blanco</option> <!--Cambiar color a blanco -->
        </select>
        <input type="submit" value="Guardar">
    </form>
</body>

</html>