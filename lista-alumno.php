<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alumnos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="barra-nav-al">
        <nav>
            <ul id="menu-al">
               <li><a href="index.php">Inicio</a></li>
               <li><a href="listado.php">Volver</a></li>
            </ul>
        </nav>
    </div>
        <div id="buscador-alumnos">
        <form method="POST" action="lista-alumno.php">
            <label for="nombre">Alumno:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre y Apellido">

            <label for="curso">Curso:</label>
            <select id="curso" name="curso">
                <option value="">Elija opción</option>
                <option value="1">1ro</option>
                <option value="2">2do</option>
                <option value="3">3ro</option>
                <option value="4">4to</option>
                <option value="5">5to</option>
                <option value="6">6to</option>
                <option value="7">7mo</option>
            </select>

            <label for="division">División:</label>
            <select id="division" name="division">
                <option value="">Elija opción</option>
                <option value="A">a</option>
                <option value="B">b</option>
                <option value="C">c</option>
                <option value="D">d</option>
                <option value="E">e</option>
                <option value="F">f</option>
                <option value="G">g</option>
                <option value="H">h</option>
            </select>

            <button type="submit">Buscar</button>
        </form>
    </div>
     <!-- <div class="atras">
        <button><a href="listado.php">Volver</a></button>
    </div> -->
</body>
</html>

<?php
include "conexion.php";
// Obtener filtros del formulario
$nombre = strtolower(isset($_POST['nombre']) ? $_POST['nombre'] : '');
$curso = strtolower(isset($_POST['curso']) ? $_POST['curso'] : '');
$division = strtolower(isset($_POST['division']) ? $_POST['division'] : '');

// Construir la consulta con filtros
if (!empty($nombre) || !empty($curso) || !empty($division)){
        $query = "SELECT * FROM `alumnos` WHERE 1=1";
        if (!empty($nombre)) {
            $query .= " AND CONCAT(nombre, ' ', apellido) LIKE '%" . mysqli_real_escape_string($con, $nombre) . "%'";
        }
        if (!empty($curso)) {
            $query .= " AND ano = '" . mysqli_real_escape_string($con, $curso) . "'";
        }
        if (!empty($division)) {
            $query .= " AND division = '" . mysqli_real_escape_string($con, $division) . "'";
        }
        // echo $query;
        
        $res = mysqli_query($con, $query);
        echo '<h2>Listado de Alumnos</h2>';
        echo '<table border="1">';
        echo '<tr><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Año</th><th>División</th><th>Fecha</th><th>UID RFID</th><th>Acción</th></tr>';

        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>
                    <form method='POST' action='asignar_uid.php'>
                        <td>{$row["nombre"]}</td>
                        <td>{$row["apellido"]}</td>
                        <td>{$row["dni"]}</td>
                        <td>{$row["ano"]}</td>
                        <td>{$row["division"]}</td>
                        <td>{$row["fecha"]}</td>
                        <td>
                            <input type='text' name='uid' value='{$row["rfid_uid"]}' placeholder='Escaneá aquí' required>
                            <input type='hidden' name='id_alumno' value='{$row["dni"]}'>
                        </td>
                        <td><button type='submit'>Guardar</button></td>
                    </form>
                </tr>";
        }
        echo '</table>';
}




?>
