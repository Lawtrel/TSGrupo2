<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/dbconnect.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "SELECT * FROM clients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
        echo json_encode(['client' => $client]);
    } else {
        echo json_encode(['message' => 'Client not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['message' => 'Invalid ID']);
}

$conn->close();
?>
