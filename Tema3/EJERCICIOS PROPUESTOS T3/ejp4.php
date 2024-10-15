<?php
$cadena_conexion = 'mysql:dbname=empleados;host=127.0.0.1';
$usuario_bd = 'root';
$clave_bd = 'daw.1509';

// Conexión a la base de datos 
try {
    $bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}


// Consulta para obtener todos los usuarios
$preparada = $bd->prepare("SELECT * FROM usuarios");
$preparada->execute();

// Obtener todos los resultados de la consulta
$resultados = $preparada;


// Insertar y recibir datos del fomrulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rol = $_POST['rol'];
    $ciudad = $_POST['ciudad'];


    // Insertar datos
    $ins = "insert into usuarios(nombre, apellido, rol, ciudad)
  values('$nombre', '$apellido', '$rol', '$ciudad'); ";
    $resul = $bd->query($ins);

    // Comprobar si la inserción fue exitosa
    if ($resul) {
        // Redirige a la misma página usando GET para evitar que los datos se vuelvan a insertar si se recarga
        header(header: "Location: " . $_SERVER['PHP_SELF']);

        exit(); // Detener la ejecución del script
    } else {
        // Si ocurrió un error, muestra el detalle del error
        print_r($bd->errorInfo());
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4 Propuesta</title>
</head>

<body>
    <!-- Bloque Lista de Usuarios -->
    <h2>Lista de Usuarios</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rol</th>
            <th>Ciudad</th>
        </tr>
        <?php
        // Mostrar los registros
        if (!empty($resultados)) { // Si no esta vacio
            foreach ($resultados as $row) {
                echo '<tr>';
                echo '<td>' . $row["nombre"] . '</td>';
                echo '<td>' . $row["apellido"] . '</td>';
                echo '<td>' . $row["rol"] . '</td>';
                echo '<td>' . $row["ciudad"] . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
    <br><br>

    <!-- Bloque de añadir datos-->
    <h2>Añadir Datos</h2>
    <form method="POST">

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="rol">Rol:</label><br>
        <input type="text" id="rol" name="rol" required><br>

        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad" required><br>
        <input type="submit" value="Añadir datos">

    </form>
</body>

</html>