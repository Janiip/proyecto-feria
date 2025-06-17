<?php
include 'conexion.php';

// NO TOCAR (Verifica si antes de eliminar se ha pasado el tipo y el id)

if (isset($_GET['tipo']) && isset($_GET['id'])) {
    $tipo = $_GET['tipo'];
    $dni = intval($_GET['id']);

    if ($tipo === 'alumno') {
        $query = "DELETE FROM alumnos WHERE dni = $dni";
        $redirect = "lista-alumno.php";
    } elseif ($tipo === 'personal') {
        $query = "DELETE FROM personal WHERE dni = $dni";
        $redirect = "lista-personal.php";
    } else {
        die("Tipo de usuario no válido.");
    }

    if (mysqli_query($con, $query)) {
        header("Location: $redirect?eliminado=1");
        exit();
    } else {
        echo "Error al eliminar: " . mysqli_error($con);
    }
} else {
    echo "Faltan parámetros.";
}
?>
