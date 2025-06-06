<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_personal'];
    $uid = $_POST['uid'];

    $query = "UPDATE personal SET rfid_uid = ? WHERE id_personal = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $uid, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    header("Location: lista-personal.php");
    exit();
}
?>
