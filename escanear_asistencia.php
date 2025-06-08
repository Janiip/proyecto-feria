<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escanear Asistencia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form id="formulario-escan" method="POST" action="registrar_entrada.php">
    <h1>Registro de Asistencia</h1>
    
        
        <label for="rfid_uid">Escaneá tu tarjeta:</label>
        <br>
        <input type="text" name="rfid_uid" id="rfid_uid" autofocus>
     <div id="registrar">
        <input type="submit" value="Registrar">
    </div>
    <div class="atras">
        <a href="index.php">Volver</a>
    </div>
    </form>
    
</body>
</html>
