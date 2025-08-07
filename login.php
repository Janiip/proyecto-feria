<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
        if($usuario == 'admin' && $clave == 'admin123'){
            header("Location: inicio-admin.html");
        }
        else if($usuario == 'preceptor' && $clave == 'preceptor123'){
            header("Location: archivos_preceptores/inicio_preceptor.html");
        }
        exit();
    }else {
    echo "Usuario o clave incorrectos";
    }
?>

