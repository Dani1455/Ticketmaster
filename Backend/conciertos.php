<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT id, img, desc, link FROM eventos");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($result);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>