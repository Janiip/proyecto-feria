<?php
include "conexion.php";
// var_dump($_POST);
// $query="INSERT INTO `personal`(`cargo`, `nombre`, `apellido`, `dni`, `fecha`) VALUES (".$_POST['cargo'].",".$_POST['nombre-pers'].",".$_POST['ape-pers'].",".$_POST['dni-pers'].",".$_POST['fecha-pers'].")";
// $res=mysqli_query($con, $query);
// echo $query;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cargo = $_POST['cargo'] ?? '';
    $nombre = $_POST['nombre-pers'] ?? '';
    $apellido = $_POST['ape-pers'] ?? '';
    $dni = $_POST['dni-pers'] ?? '';
    $fecha = $_POST['fecha-pers'] ?? '';
    $rfid_uid = $_POST['rfid_uid'] ?? '';

    $query = "INSERT INTO personal (cargo, nombre, apellido, dni, fecha, rfid_uid) 
        VALUES ('$cargo', '$nombre', '$apellido', '$dni', '$fecha', '$rfid_uid')";


    if (mysqli_query($con, $query)) {
        echo "Personal registrado con éxito.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,". initial-scale=1.0">
    <title>Personal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="formulario">
        <div id="titulo">
            <h1>Formulario</h1>
        </div>
        <div id="personal">
            <h2>Personal</h2>
           <form id="formulario-pers" method="POST" action="personal.php">
             <label>
                <span>Nombre/s: </span>
                <input type="text" name="nombre-pers" placeholder="Ingrese nombre/s">
            </label>
            <label>
                <span>Apellido/s: </span>
                <input type="text" name="ape-pers" placeholder="Ingrese apellido/s">
            </label>
             <label>
                <span>Número de documento: </span>
                <input type="number" name="dni-pers" placeholder="Solo números">
            </label>
             <label>
                <span>Cargo: </span>
                <input type="radio" name="cargo" value="docente" checked="checked"/> Docente
                <input type="radio" name="cargo" value="auxiliar"/> Auxiliar
            </label>
             <label>
                <span>Día: </span>
                <input type="date" name="fecha-pers">
            </label>
            <label>
              <span>UID RFID: </span>
                <input type="text" name="rfid_uid" placeholder="Escaneá" autofocus>
            </label>

                <div class="btn-enviar">
                <button type="submit" name="submit">Enviar</button>
                </div>
                <div class="atras">
        <a href="index.php">Volver</a>
    </div>
           </form>
        </div>
    </div>
</body>
</html>