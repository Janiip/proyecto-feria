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
               <li><a href="listado.php">Volver</a></li>
            </ul>
        </nav>
    </div>
    <div id="buscador-personal">
            <form method="POST" action="lista-personal.php">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : ''; ?>">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo isset($_GET['apellido']) ? htmlspecialchars($_GET['apellido']) : ''; ?>">

                <label for="cargo">Cargo:</label>
                <select id="cargo" name="cargo">
                    <option value="">Todos</option>
                    <option value="Auxiliar" <?php if(isset($_GET['cargo']) && $_GET['cargo']=="Auxiliar") echo "selected"; ?>>Auxiliar</option>
                    <option value="Docente" <?php if(isset($_GET['cargo']) && $_GET['cargo']=="Docente") echo "selected"; ?>>Docente</option>
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
$query = "SELECT * FROM `personal`";
$res = mysqli_query($con, $query);

echo '<h2>Listado de Personal</h2>';
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
?>

