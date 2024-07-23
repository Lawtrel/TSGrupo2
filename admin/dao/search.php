<?php
include_once "../config/dbconnect.php";

$searchQuery = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $sql = "SELECT DISTINCT * FROM clients WHERE client_name LIKE '%$searchQuery%'";
} else {
    $sql = "SELECT DISTINCT * FROM clients";
}

$result = $conn->query($sql);

$clients = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clients[] = $row;
    }
}

echo json_encode($clients);
?>
