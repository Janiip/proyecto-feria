<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_alumno'];
    $uid = $_POST['uid'];

    $query = "UPDATE alumnos SET rfid_uid = ? WHERE id_alumno = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $uid, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    header("Location: lista-alumno.php");
    exit();
}
?>
