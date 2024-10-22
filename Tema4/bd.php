<?php
$cadena_conexion = 'mysql:dbname=pedidos;host=127.0.0.1';
$usuario_bd = 'root';
$clave_bd = 'daw.1509';

// Conexión a la base de datos 
try {
    $bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);

} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}

?>