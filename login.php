<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Validar credenciales (en tu caso es estático, puedes mejorar con base de datos)
    if ($usuario == 'admin' && $clave == 'admin123') {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'admin';
        header("Location: inicio-admin.html");
        exit();
    } else if ($usuario == 'preceptor' && $clave == 'preceptor123') {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'preceptor';
        header("Location: archivos_preceptores/inicio_preceptor.html");
        exit();
    } else {
        echo "Usuario o clave incorrectos";
    }
}
?>
