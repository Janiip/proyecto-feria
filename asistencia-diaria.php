<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Buscador asistencia</h1>

    <div id="buscador-asistencia">
        <form method="POST" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre y Apellido">

            <label for="tipo">Tipo:</label>
            <select id="tipo-asistencia" name="tipo">
                <option value="">Seleccione tipo</option>
                <option value="alumno">Alumno</option>
                <option value="personal">Personal</option>
            </select>
        <div id="boton-buscar-asistencia">
            <button type="submit">Buscar</button>
        </div>

    </div>    
</body>
</html>