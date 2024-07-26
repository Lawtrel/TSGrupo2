<?php
include_once '../admin/dbconnect.php';

$supplierId = $_POST['supplierId'];
$supplierName = $_POST['supplierName'];
$orderDescription = $_POST['orderDescription'];
$status = $_POST['status'];
$shipmentDate = $_POST['shipmentDate'];
$deliveryDate = $_POST['deliveryDate'];

$sql = "UPDATE suppliers SET supplier_name='$supplierName', order_description='$orderDescription', status='$status', shipment_date='$shipmentDate', delivery_date='$deliveryDate' WHERE id='$supplierId'";

if ($conn->query($sql) === TRUE) {
    echo "Fornecedor atualizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
