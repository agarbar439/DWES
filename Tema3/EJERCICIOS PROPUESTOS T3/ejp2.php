<?php
// Funcion para comprobar las crednciales
function comprobar_usuario($nombre, $clave)
{
    // Verifica si coincide usuario y clave
    if ($nombre === "usuario" && $clave === "1234") {
        $usu['nombre'] = 'usuario';
        $usu['rol'] = 0; // Rol de usuario
        return $usu; // Retorna el array con el nombre y rol
    }
    // Verifica si coincide usuario y clave con admin
    elseif ($nombre === 'admin' && $clave === 'admin') {
        $usu['nombre'] = 'admin';
        $usu['rol'] = 1; // Rol de admin
        return $usu;
    } else {
        return FALSE; // False si las credenciales no son correctas
    }
}

// Inicia la sesión
session_start();

// Verifica la solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el usuario y la clave del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Comprueba las credenciales
    $result = comprobar_usuario($usuario, $clave);

    // Si las credenciales son válidas
    if ($result) {
        // Almacena el nombre y rol en la sesión
        $_SESSION['usuario'] = $result['nombre'];
        $_SESSION['rol'] = $result['rol'];
        // Redirige a la misma página
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $err = true;
    }
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php if (isset($_SESSION['usuario'])) { // Solo mostrar mensajes si hay un usuario autenticado
        if (isset($_GET["redirigido"])) {
            echo "<p>Haga login para continuar</p>";
        }

        if (isset($err) && $err) {
            echo "<p>Revisa usuario y contraseña</p>"; // Mensaje de error si las credenciales son incorrectas
        }

        // Mensaje visible para admin
        if ($_SESSION['rol'] == 1) {
            echo '<p>Zona Admin</p>'; // Zona exclusiva para admin
        }

        // Mensaje visible para usuarios
        if ($_SESSION['rol'] == 0) {
            echo '<p>Zona User</p>'; // Zona exclusiva para usuarios
        }
    } ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>"
            id="usuario" name="usuario" type="text">
        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
        <input type="submit" value="Iniciar sesión"> <!-- Botón para enviar el formulario -->

    </form>
</body>

</html>