<?php
// Antonio Garcia Barrera
/*1. Escribe un script para resolver ecuaciones de segundo grad, ax2 + bx + c = 0.
Si la ecuacion no tiene soluciones reales, hay que mostrar un mensaje de error*/


// Función para resolver una ecuación de segundo grado
function ecuacionSegundoGrado($a, $b, $c)
{
    // Si a es 0 no sera una ecuacion
    if ($a == 0) {
        echo "El valor de 'a' no puede ser 0.";
        return;
    }

    // Calcular el discriminante: b^2 - 4ac
    $discriminante = $b * $b - 4 * $a * $c;

    // Caso sin solucion
    if ($discriminante < 0) {
        throw new Exception('La ecuacion no tiene solucion');

    }
    // Caso con solucion
    else {
        $solucion = (-$b + sqrt($discriminante)) / (2 * $a);
        echo "Resultado: x = $solucion";
    }
}

// Ejemplo
$a = 41;
$b = 2;
$c = 2;

try {
ecuacionSegundoGrado($a, $b, $c);
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}

?>