<?php
include "conexion.php";
// Capturamos el UID por GET o POST
$uid = $_POST['rfid_uid'] ?? $_GET['uid'] ?? '';

if (!$uid) {
    echo "<h2>No se recibió ningún UID</h2>";
    echo "<meta http-equiv='refresh' content='1;URL=escanear_asistencia.html'>";
    exit;
}

$tipo = "";
$nombre = "";

// Buscar en alumnos
$stmt = $con->prepare("SELECT nombre, apellido FROM alumnos WHERE rfid_uid = ?");
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $nombre = $row['nombre'] . " " . $row['apellido'];
    $tipo = "alumno";
} else {
    // Buscar en personal si no es alumno
    $stmt = $con->prepare("SELECT nombre, apellido FROM personal WHERE rfid_uid = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $nombre = $row['nombre'] . " " . $row['apellido'];
        $tipo = "personal";
    }
}

if ($nombre && $tipo) {
    // Registrar asistencia
    $insert = $con->prepare("INSERT INTO asistencia_registro (rfid_uid, nombre, tipo) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $uid, $nombre, $tipo);
    $insert->execute();

    echo "<h2 style='color: green;'>✅ $tipo $nombre registrado con éxito</h2>";
} else {
    echo "<h2 style='color: red;'>❌ UID no registrado en el sistema</h2>";
}

echo "<meta http-equiv='refresh' content='1;URL=escanear_asistencia.html'>";

?>
