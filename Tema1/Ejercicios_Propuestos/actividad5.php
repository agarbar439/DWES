<?php
// Antonio Garcia Barrera
/*5. Escribe una funcion que reciba un array de numeros, y un número, el limite.
La funcion tiene que devolver un nuevi array que contenga solo los elementos
del array original menores que el limite*/

function arrayNumeros($numeros, $limite)
{
    // Inicializar array vacio para almacenar los resultados
    $nuevoArray = [];
    foreach ($numeros as $numero) {
        // Si el número es menor que el, se agrega al nuevo array
        if ($numero < $limite) {
            $nuevoArray[] = $numero; // Agrega el elemento al nuevo array
        }
    }
    return $nuevoArray;

}

// Ejemplo de uso
$arr1 = [3, 5, 7, 4, 2, 20, 40, 50]; // Crear un array de numeros
$limite = 7; // Asignar el numero
print_r(arrayNumeros($arr1, $limite)); // Imprimir el nuevo array

?>