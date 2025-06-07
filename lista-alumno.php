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
               <li><a href="#">Curso</a>
                <ul id="desplegable-curso">
                    <li><a href="#">1ro</a></li>
                    <li><a href="#">2do</a></li>
                    <li><a href="#">3ro</a></li>
                    <li><a href="#">4to</a></li>
                    <li><a href="#">5to</a></li>
                    <li><a href="#">6to</a></li>
                    <li><a href="#">7mo</a></li>
                </ul>
            </li>
                <li><a href="#">División</a>
                <ul id="desplegable-division">
                    <li><a href="#">A</a></li>
                    <li><a href="#">B</a></li>
                    <li><a href="#">C</a></li>
                    <li><a href="#">D</a></li>
                    <li><a href="#">E</a></li>
                    <li><a href="#">F</a></li>
                    <li><a href="#">G</a></li>
                    <li><a href="#">H</a></li>
                </ul>
            </li>
               <li><a href="listado.php">Volver</a></li>
            </ul>
        </nav>
    </div>
     <!-- <div class="atras">
        <button><a href="listado.php">Volver</a></button>
    </div> -->
</body>
</html>

<?php
include "conexion.php";
$query = "SELECT * FROM `alumnos`";
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
?>
