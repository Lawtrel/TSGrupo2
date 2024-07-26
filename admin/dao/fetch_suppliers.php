<?php
include_once '../config/dbconnect.php';

$sql = "SELECT id, supplier_name, order_description, status, shipment_date, delivery_date FROM suppliers";
$result = $conn->query($sql);

$suppliers = [];
$statusCounts = [
    'delivered' => 0,
    'shipping' => 0,
    'in-progress' => 0
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
        $statusCounts[$row['status']]++;
    }
}

$response = [
    'suppliers' => $suppliers,
    'statusCounts' => $statusCounts
];

echo json_encode($response);
$conn->close();
?>
