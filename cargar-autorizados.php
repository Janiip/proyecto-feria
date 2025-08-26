<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="formulario-autorizados">
        <div id="titulo">
            <h2>Datos del/la autorizado/a</h2>    
        </div>
                <span>Nombre/s del/la autorizado/s: </span>
                <input type="text" name="nombre-al" placeholder="Ingrese nombre/s">
            </label>
            <label>
                <span>Apellido/s del/la autorizado/s: </span>
                <input type="text" name="ape-al" placeholder="Ingrese apellido/s">
            </label>
             <span>Número de documento del/la autorizado/s: </span>
                <input type="number" name="dni-al" placeholder="Solo números" min=0>
            </label>
            <label>
                <span>Parentezco del/la autorizado/s:</span>
                <input type="text" name="parentesco-al" placeholder="Ingrese parentesco">
            </label>
            <label>
                <span>Alumno autorizado:</span>
                <input type="text" name="autorizado-al" placeholder="Ingrese el nombre y apellido">
            </label>
            <label>
                <span>Curso y división del alumno autorizado:</span>
                <input type="text" name="curso-al" placeholder="Ej: 1d">
            </label>
            
           <div class="btn-enviar">
                <button type="submit" name="submit">Enviar</button>
            </div>
    <div class="atras">
        <a href="lista-autorizados.html">Volver</a>
    </div>
    </form>

</body>
</html>