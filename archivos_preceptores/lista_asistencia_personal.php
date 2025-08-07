<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-preceptor.css">
    
    <title>Asistencia del personal en el dia</title>
</head>
<body>
    <div id="barra-nav-pers">
        <nav>
            <ul id="menu-pers">
               <li><a href="inicio_preceptor.html">Inicio</a></li>
               <li>
                <a href="#">Cargo</a>
                <ul id="desplegable-cargo">
                    <li><a href="lista-personal.php?cargo_nav=Auxiliar">Auxiliar</a></li>
                    <li><a href="lista-personal.php?cargo_nav=Docente">Docente</a></li>
                </ul>
               </li>
               <li><a href="ver_asistencia_preceptor.html">Volver</a></li>
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
</body>
</html>