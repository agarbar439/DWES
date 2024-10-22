<?php
require_once 'bd.php';
/*Formulario de login, abre sesion, guarda el nombre de usuario y redirige a principal.php */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = comprobar_usuario($_POST["usuario"], $_POST['clave']);
    if ($usu === FALSE) {
        $err = TRUE;
        $usuario = $_POST['usuario'];
    } else {
        session_start();
        $_SESSION['usuario'] = $usu;
        $_SESSION['carrito'] = [];
        header("Location: categorias.php");
        return;
    }
}
function comprobar_usuario($usuario, $clave) {
    require_once 'bd.php'; // Archivo de conexion de la bbdd

    $sql = 'SELECT nombre FROM usuarios WHERE nombre = "' . $usuario . '" AND clave = "' . $clave . '"'; //Consulta para comprobar usuario y contraseña
    $resultado = $conexion->query($sql); 

    if ($resultado->num_rows > 0) { // Si hay algun dato
        return $usuario; // DEvuelve el usuario
    } else {
        return FALSE; 
}
}
?>

<!DOCTYPE html>
<html>

<head>

<body>
    <?php if (isset($_GET['redirigido'])) {
        echo "<p>Haga login para continuar</p>";
    } ?>
    <?php if (isset($err) and $err == TRUE) {
        echo "<p>Revise usuario y contraseña</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Usuario </label>
        <input value="<?php if (isset($usuario))
            echo $usuario; ?>" id="usuario" name="usuario" type="text">

        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
        <input type="submit">
    </form>
</body>
</head>

</html>