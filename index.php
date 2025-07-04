
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
        exit();
}else {
    echo "Usuario o clave incorrectos";
}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form action="index.php" method="POST">
        <label>Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" id="clave" name="clave" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>