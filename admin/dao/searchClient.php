<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

include_once '../config/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $name = isset($_GET['name']) ? $_GET['name'] : '';

    if ($name) {
        $sql = "SELECT * FROM clients WHERE client_name LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchName = '%' . $name . '%';
        $stmt->bind_param("s", $searchName);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $client = $result->fetch_assoc();
            if ($client) {
                echo json_encode(['client' => $client]);
            } else {
                echo json_encode(['message' => 'Client not found']);
            }
        } else {
            echo json_encode(['message' => 'Error executing query']);
        }
        
        $stmt->close();
    } else {
        echo json_encode(['message' => 'Invalid client name']);
    }

    $conn->close();
}
?>
