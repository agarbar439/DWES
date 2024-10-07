<?php
//Escribe un fichero que reciba el código de un usuario y muestre por pantalla todos sus datos.

//Datos conexion base de datos
$cadena_conexion = 'mysql:dbname=empleados;host=127.0.0.1';
$usuario = 'root';
$clave = 'daw.1509';

try {
    // Variable con al conexion
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    // Mensaje conexion exitosa
    echo "Conexión exitosa". "<br>";
    // Consulta a la base de datos
    $sql = 'SELECT nombre, apellido, rol, ciudad FROM usuarios WHERE id = 2';
    // Almacenar en la variable el resultado de ejecutar la consulta
    $resultado = $bd->query($sql);
    
    // Mostrar por pantalla los datos
    foreach($resultado as $row){
    print "Nombre: ". $row['nombre']. "<br>";
    print "Apellido: ". $row['apellido']. "<br>";
    print "Rol: ". $row['rol']. "<br>";
    print "Ciudad: ". $row['ciudad']. "<br>";
    }
} catch (PDOException $e) {
    echo 'Error base de datos: ' . $e->getMessage();
}
?>
