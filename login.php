<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    $stmt = $con ->prepare("SELECT usuario FROM login WHERE usuario=? ");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
   
    if($fila = $resultado ->fetch_assoc()){
        // Redirige según el rol
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
}
?>