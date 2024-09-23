<?php
// Antonio Garcia Barrera
/*Escribe una función para calcular potencias. Recibirá como argumento la base y el exponente, 
que es opcional y tiene valor por defecto 2 (elevar al cuadrado).*/

// Fuuncion para calcular una potencia
function calcularPotencia($base, $exponente = 2) // Exponente opcional o 2 por defecto
{

    return pow($base, $exponente); // Devuelve la potencia
}

// Resultados de la funcion 
echo ("El resultado es: " . calcularPotencia(2));
echo "\n";
echo ("El resultado es: " . calcularPotencia(2, 3));

?>