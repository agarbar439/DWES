<?php
// Antonio Garcia Barrera
// Escribe una función para calcular el factorial de un número, que recibirá como argumento. Devolverá el factorial o -1 si el argumento no es válido.

//Funcion para calcular el factorial con un valor por argumento

function calculador($operacion, $num)
{
    $resultado = $operacion($num); // Llamar a la operación con el número
    return $resultado;
}

function factorial($num)
{
    if ($num <= 0 || is_string($num)) { // Si el numero es menor o igual que 0 o es string
        return -1;
    } else {
        // Calculo del factorial
        $factorial = 1; // Valor por defecto
        for ($i = 1; $i <= $num; $i++) {
            // En cada iteración se multiplica el valor acumulado de factorial por el valor actual de $i
            $factorial *= $i;
        }
        return $factorial; // Devolver el factorial
    }
}

// Ejemplo para calcular el factorial
$a = 5;
$r1 = calculador("factorial", $a);
echo "Factorial de $a: " . $r1 . "\n";

// Ejemplo con un valor invalido
$b = -3;
$r2 = calculador("factorial", $b);
echo "Factorial de $b: " . $r2 . "\n";
