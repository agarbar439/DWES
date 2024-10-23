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

// Comprueba usuario y clave en la bbdd
// Funciona
function comprobar_usuario($bd, $usuario, $clave) {
    // Consulta SQL tal como la tenías, construida con los valores directamente
    $sql = 'SELECT nombre FROM usuarios WHERE nombre = "' . $usuario . '" AND clave = "' . $clave . '"';
    
    // Ejecutar la consulta
    $resultado = $bd->query($sql);

    // Verificar si hay algún resultado
    if ($resultado && $resultado->rowCount() > 0) {
        return $usuario; // Devuelve el nombre de usuario si coincide
    } else {
        return FALSE;
    }
}



// Funciona
// Funcion para listar las categorias
function cargar_categorias($bd){
    $sql = "SELECT codCat, nombre FROM categorias"; // Seleccionar las categorias de la bbdd
    $resul = $bd->query($sql); // Ejecutar la consulta
    
    if (!$resul) {
        return FALSE;
    }
    if ($resul->rowCount() === 0) {
        return FALSE;
    }

    // Si hay 1 o más resultados, devuelve el resultado
    return $resul;
}

// Funcion para cargar los datos de la categoria
function cargar_categoria($bd, $codCat) {
    // Consulta SQL para seleccionar el nombre y la descripción de la categoría específica
    $sql = "SELECT nombre, descripcion FROM categorias WHERE codCat = :codCat";
    
    // Preparar la consulta para evitar problemas de inyección SQL
    $stmt = $bd->prepare($sql);
    $stmt->bindParam(':codCat', $codCat);
    $stmt->execute();
    
    // Comprobar si la consulta devolvió algún resultado
    if ($stmt->rowCount() > 0) {
        // Devolver el array asociativo con el nombre y la descripción de la categoría
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Si no se encuentra la categoría, devolver FALSE
        return FALSE;
    }
}


?>

