<?php
$cadena_conexion = 'mysql:dbname=empleados;host=127.0.0.1';
$usuario_bd = 'root';
$clave_bd = 'daw.1509';

// Conexión a la base de datos 
try {
    $bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);
    echo "Conexión exitosa" . "<br>" . "<br>";

    // Consulta para obtener todos los usuarios
    $preparada = $bd->prepare("SELECT * FROM usuarios");
    $preparada->execute();

    // Obtener todos los resultados de la consulta
    $resultados = $preparada;
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3 Propuesta</title>
</head>

<body>
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

</body>

</html>