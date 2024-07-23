<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

include_once '../config/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['client_name'], $input['cpf_cnpj'], $input['person_type'], $input['address'], $input['number'], $input['neighborhood'], $input['city'], $input['zip'], $input['country'], $input['phone'], $input['email'], $input['plate'], $input['model'], $input['year'], $input['color'], $input['renavam'])) {
        echo json_encode(["message" => "Invalid input"]);
        exit;
    }

    $sql = "INSERT INTO clients (client_name, cpf_cnpj, person_type, address, number, neighborhood, city, zip, country, phone, email, plate, model, year, color, renavam)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssississssisis",
        $input['client_name'], $input['cpf_cnpj'], $input['person_type'], $input['address'],
        $input['number'], $input['neighborhood'], $input['city'], $input['zip'], $input['country'],
        $input['phone'], $input['email'], $input['plate'], $input['model'], $input['year'],
        $input['color'], $input['renavam']);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Client registered"]);
    } else {
        echo json_encode(["message" => "Client registration failed"]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
