<?php
header('Content-Type: application/json');

include "conexion.php";

// Recibe el mensaje del usuario
$mensaje = $_POST['mensaje'] ?? '';

// Detectar la consulta de inasistencias
if (preg_match('/conteo de inasistencias de (.+)/i', $mensaje, $matches)) {
    $alumno = $conexion->real_escape_string($matches[1]);
    $sql = "SELECT COUNT(*) as total FROM inasistencias WHERE alumno = '$alumno'";
    $res = $conexion->query($sql);
    if ($res && $row = $res->fetch_assoc()) {
        $total = $row['total'];
        echo json_encode(['respuesta' => "El alumno $alumno tiene $total inasistencias."]);
    } else {
        echo json_encode(['respuesta' => "No se encontró información para el alumno $alumno."]);
    }
    exit;
} 


//hola
// Si no es una consulta especial, responde con IA (OpenAI)
$apiKey = '';
$data = [
    'model' => 'gpt-3.5-turbo',
    'messages' => [
        ['role' => 'system', 'content' => 'Eres un asistente para preceptores y administradores.'],
        ['role' => 'user', 'content' => $mensaje]
    ]
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

$respuestaIA = json_decode($response, true);
echo json_encode(['respuesta' => $respuestaIA['choices'][0]['message']['content'] ?? 'No se pudo obtener respuesta de la IA.']);
?>