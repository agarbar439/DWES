<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario_bd = 'root';
$clave_bd = 'daw.1509';
$mensaje = ''; // Variable para los mensajes

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['usuario'];
    $password = $_POST['clave'];

    // Conexión a la base de datos 
    try {
        $bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);
        
        echo "Conexión exitosa" . "<br>";

        // Consulta para comprobar el usuario y la contraseña
        $consulta = "SELECT * FROM usuarios WHERE nombre_usuario = :usuario AND contrasena = :clave";
        $preparada = $bd->prepare($consulta);
        $preparada->execute([':usuario' => $nombre, ':clave' => $password]);

        // Comprobar el resultado
        if ($preparada->rowCount() > 0) {
            $mensaje = "Sesión iniciada correctamente.";
        } else {
            $mensaje = "Revise usuario y contraseña.";
        }

    } catch (PDOException $e) {
        $mensaje = "Error en la conexión: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad</title>
</head>

<body>
    <?php if (!empty($mensaje)) {
        echo "<p>$mensaje</p>";
    } ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($_POST['usuario'])) echo htmlspecialchars($_POST['usuario']); ?>"
            id="usuario" name="usuario" type="text">
        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>