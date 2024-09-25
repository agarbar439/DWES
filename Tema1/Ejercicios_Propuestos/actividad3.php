<?php
// Antonio Garcia Barrera
/*3. Almacena la función anterior en el fichero matematicas.php
Crea un fichero que la incluya y utilice.*/

// Función para resolver una ecuación de segundo grado
function ecuacionSegundoGrado($a, $b, $c)
{
    // Si 'a' es 0, no será una ecuación cuadrática
    if ($a == 0) {
        return false; // No es una ecuación válida si 'a' es 0
    }

    // Calcular el discriminante: b^2 - 4ac
    $discriminante = $b * $b - 4 * $a * $c;

    // Caso sin solución 
    if ($discriminante < 0) {
        return false; // No hay soluciones reales
    }
    // Caso con una solución
    elseif ($discriminante == 0) {
        $solucion = -$b / (2 * $a);
        return [$solucion]; // Devuelve un array con una solucion
    }
    // Caso con dos soluciones 
    else {
        $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);
        return [$solucion1, $solucion2]; // Devuelve un array con dos soluciones
    }
}

// Ejemplo 
$a = 1;
$b = -3;
$c = 2;

$resultado = ecuacionSegundoGrado($a, $b, $c);

if ($resultado === false) {
    echo "La ecuación no tiene soluciones reales.";
} else {
    // Imprime cada solución 
    foreach ($resultado as $solucion) {
        echo "Solución: x = $solucion\n";
    }
}
?>