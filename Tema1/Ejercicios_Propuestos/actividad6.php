<?php
// Antonio Garcia Barrera

// Escribe un script para probar las funciones del cuadro 2.6

// Funcion para devolver la longitud de una cadena
function longitudCadena($cadena)
{
    $salida = ""; // Inicializa la variable de salida

    if (is_string($cadena)) { // Comprueba que es una cadena
        $salida = strlen($cadena); // Obtiene la longitud de la cadena
    } else {
        $salida = "Escribe una cadena"; // Si no es cadena, mensaje de error
    }

    return $salida;
}

// Funcion para devolver el numero total de elementos de un array
function longitudArray($arr)
{
    $salida = ""; // Inicializa la variable de salida
    if (is_array($arr)) { // Comprueba que es un array
        $salida = count($arr); // Obtiene la longitud del array
    } else {
        $salida = "Escribe un array"; // Si no es un array, mensaje de error
    }
    return $salida;

}

// Ejemplo de uso de la función 1
echo "Longitud Cadena: " . longitudCadena("hola");
echo "\n";
// Ejemplo de uso de la función 2
$arr1 = [1, 3, 5, 6, 7, 4, 5];
echo "Longitud Array: " . longitudArray($arr1);

?>