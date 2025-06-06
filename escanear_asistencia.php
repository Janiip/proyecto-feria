<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escanear Asistencia</title>
</head>
<body>
    <h1>Registro de Asistencia</h1>
    <form method="POST" action="registrar_entrada.php">
        <label for="rfid_uid">Escaneá tu tarjeta:</label><br>
        <input type="text" name="rfid_uid" id="rfid_uid" autofocus>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
