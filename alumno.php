<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre-al'] ?? '';
    $apellido = $_POST['ape-al'] ?? '';
    $dni = $_POST['dni-al'] ?? '';
    $ano = $_POST['año-al'] ?? '';
    $division = $_POST['division-al'] ?? '';
    $fecha = $_POST['fecha-al'] ?? '';
$rfid_uid = $_POST['rfid_uid'] ?? '';

$query = "INSERT INTO alumnos (nombre, apellido, dni, ano, division, fecha, rfid_uid) 
          VALUES ('$nombre', '$apellido', '$dni', '$ano', '$division', '$fecha', '$rfid_uid')";


    if (mysqli_query($con, $query)) {
        echo "Alumno registrado con éxito.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="formulario">
        <div id="titulo">
            <h1>Formulario</h1>
        </div>
        <div id="alumno-h">
        <h2>Alumnos</h2>
        </div>
        <br>
        <div id="alumnos">
            
           <form id="formulario-al" method="POST" action="alumno.php">
             <label>
                <span>Nombre/s: </span>
                <input type="text" name="nombre-al" placeholder="Ingrese nombre/s">
            </label>
            <label>
                <span>Apellido/s: </span>
                <input type="text" name="ape-al" placeholder="Ingrese apellido/s">
            </label>
             <label>
                <span>Número de documento: </span>
                <input type="number" name="dni-al" placeholder="Solo números" min=0>
            </label>
             <label>
                <span>Año: </span>
                <input type="number" name="año-al" placeholder="Solo números">
            </label>
             <label>
                <span>División: </span>
                <input type="text" name="division-al">
            </label>
            <label>
                <span>Día: </span>
                <input type="date" name="fecha-al">
            </label>
            <label>
                <span>UID RFID: </span>
                <input type="text" name="rfid_uid" placeholder="Escaneá" autofocus>

            </label>

         
           </form>
        </div>
        <div class="btn-enviar">
             <button type="submit" name="submit">cargar alumno</button>
        </div>
    <div class="atras">
        <button><a href="index.php">Volver</a></button>
    </div>
    </div>
    
</body>
</html>