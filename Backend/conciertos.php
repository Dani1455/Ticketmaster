<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_db";

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta los datos
    $stmt = $conn->prepare("SELECT id, img, desc, link FROM eventos");
    $stmt->execute();

    // Obtén los resultados como un array asociativo
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devuelve los resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($result);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cierra la conexión
$conn = null;
?>