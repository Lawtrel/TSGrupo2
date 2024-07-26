<?php
include_once '../config/dbconnect.php';

$supplierName = $_POST['supplierName'];
$orderDescription = $_POST['orderDescription'];
$status = $_POST['status'];
$shipmentDate = $_POST['shipmentDate'];
$deliveryDate = $_POST['deliveryDate'];

$sql = "INSERT INTO suppliers (supplier_name, order_description, status, shipment_date, delivery_date) VALUES ('$supplierName', '$orderDescription', '$status', '$shipmentDate', '$deliveryDate')";

if ($conn->query($sql) === TRUE) {
    echo "Fornecedor adicionado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
