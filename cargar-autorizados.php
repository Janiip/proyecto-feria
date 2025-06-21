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
            
                <span>Nombre/s del/la autorizado/a: </span>
                <input type="text" name="nombre-al" placeholder="Ingrese nombre/s">
            </label>
            <label>
                <span>Apellido/s del/la autorizado/a: </span>
                <input type="text" name="ape-al" placeholder="Ingrese apellido/s">
            </label>
             <span>Número de documento del/la autorizado/a: </span>
                <input type="number" name="dni-al" placeholder="Solo números" min=0>
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