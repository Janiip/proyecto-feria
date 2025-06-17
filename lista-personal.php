<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de personal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="barra-nav-pers">
        <nav>
            <ul id="menu-pers">
               <li><a href="index.php">Inicio</a></li>
               <li>
                <a href="#">Cargo</a>
                <ul id="desplegable-cargo">
                    <li><a href="lista-personal.php?cargo_nav=Auxiliar">Auxiliar</a></li>
                    <li><a href="lista-personal.php?cargo_nav=Docente">Docente</a></li>
                </ul>
               </li>
               <li><a href="listado.php">Volver</a></li>
            </ul>
        </nav>
    </div>
    <div id="buscador-personal">
        <form method="POST" action="lista-personal.php">
            <label for="nombre-apellido">Nombre y Apellido:</label>
            <input type="text" id="nombre-apellido" name="nombre-apellido" placeholder="Nombre y Apellido" value="<?php echo isset($_POST['nombre-apellido']) ? htmlspecialchars($_POST['nombre-apellido']) : ''; ?>">

            <label for="cargo">Cargo:</label>
            <select id="cargo" name="cargo">
                <option value="">Seleccione cargo</option>
                <option value="Auxiliar" <?php if(isset($_POST['cargo']) && $_POST['cargo']=="Auxiliar") echo "selected"; ?>>Auxiliar</option>
                <option value="Docente" <?php if(isset($_POST['cargo']) && $_POST['cargo']=="Docente") echo "selected"; ?>>Docente</option>
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
// ARRAY PARA ALMACENAR EL NOMBRE, APELLIDO Y CARGO
$condiciones = [];

// VERIFICA SI LOS PARAMETROS PASADOS POR POST NO ESTÁN VACIOS
if (!empty($_POST['nombre-apellido'])) {
    $nombre_apellido = mysqli_real_escape_string($con, $_POST['nombre-apellido']);
    $condiciones[] = "(nombre LIKE '%$nombre_apellido%' OR apellido LIKE '%$nombre_apellido%' OR CONCAT(nombre, ' ', apellido) LIKE '%$nombre_apellido%')";
}

if (!empty($_POST['cargo'])) {
    $cargo = mysqli_real_escape_string($con, $_POST['cargo']);
    $condiciones[] = "cargo = '$cargo'";
}

if (!empty($condiciones)) {
    $query = "SELECT * FROM personal WHERE " . implode(" AND ", $condiciones);
    $res = mysqli_query($con, $query);

    echo '<h2>Resultados del buscador</h2>';
    echo '<table border="1">';
    echo '<tr><th>Cargo</th><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Fecha</th><th>UID RFID</th><th>Acción</th></tr>';

    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>
                <form method='POST' action='asignar_uid_personal.php'>
                    <td>{$row["cargo"]}</td>
                    <td>{$row["nombre"]}</td>
                    <td>{$row["apellido"]}</td>
                    <td>{$row["dni"]}</td>
                    <td>{$row["fecha"]}</td>
                    <td>
                        <input type='text' name='uid' value='{$row["rfid_uid"]}' placeholder='Escaneá aquí' required>
                        <input type='hidden' name='id_personal' value='{$row["dni"]}'>
                    </td>
                    <td><button type='submit'>Guardar</button></td>
                </form>
              </tr>";
    }
    echo '</table>';
}
//Barra nav desplegable con filtros
if (isset($_GET['cargo_nav'])) {
    $cargo_nav = mysqli_real_escape_string($con, $_GET['cargo_nav']);
    $query_nav = "SELECT * FROM personal WHERE cargo = '$cargo_nav'";
    $res_nav = mysqli_query($con, $query_nav);

    echo "<h2>Listado de Personal - Cargo: $cargo_nav</h2>";
    echo '<table border="1">';
    echo '<tr><th>Cargo</th><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Fecha</th><th>UID RFID</th><th>Acción</th></tr>';

    while ($row = mysqli_fetch_array($res_nav)) {
        echo "<tr>
                <form method='POST' action='asignar_uid_personal.php'>
                    <td>{$row["cargo"]}</td>
                    <td>{$row["nombre"]}</td>
                    <td>{$row["apellido"]}</td>
                    <td>{$row["dni"]}</td>
                    <td>{$row["fecha"]}</td>
                    <td>
                        <input type='text' name='uid' value='{$row["rfid_uid"]}' placeholder='Escaneá aquí' required>
                        <input type='hidden' name='id_personal' value='{$row["dni"]}'>
                    </td>
                    <td><button type='submit'>Guardar</button></td>
                </form>
              </tr>";
    }
    echo '</table>';
}
?>
