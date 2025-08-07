<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style-preceptor.css">

    <title>Document</title>
</head>
<body>
    <div id="barra-nav-pers">
        <nav>
            <ul id="menu-pers">
               <li><a href="inicio_preceptor.html">Inicio</a></li>
               <li>
               
               </li>
               <li><a href="ver_asistencia_preceptor.html">Volver</a></li>
            </ul>
        </nav>
    </div>
     <div id="buscador-alumnos">
        <form method="POST" action="lista-alumno.php">
            <label for="nombre">Alumno:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre y Apellido">

            <label for="curso">Curso:</label>
            <select class="curso" name="cursos">
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
            <select class="division" name="divisiones">
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
</body>
</html>