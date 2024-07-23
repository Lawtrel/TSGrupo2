<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

include_once '../config/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['id'], $input['client_name'], $input['cpf_cnpj'], $input['person_type'], $input['address'], $input['number'], $input['neighborhood'], $input['city'], $input['zip'], $input['country'], $input['phone'], $input['email'], $input['plate'], $input['model'], $input['year'], $input['color'], $input['renavam'])) {
        echo json_encode(["message" => "Invalid input"]);
        exit;
    }

    $sql = "UPDATE clients SET client_name = ?, cpf_cnpj = ?, person_type = ?, address = ?, number = ?, neighborhood = ?, city = ?, zip = ?, country = ?, phone = ?, email = ?, plate = ?, model = ?, year = ?, color = ?, renavam = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssississssisisi",
        $input['client_name'], $input['cpf_cnpj'], $input['person_type'], $input['address'],
        $input['number'], $input['neighborhood'], $input['city'], $input['zip'], $input['country'],
        $input['phone'], $input['email'], $input['plate'], $input['model'], $input['year'],
        $input['color'], $input['renavam'], $input['id']);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Dados atualizado!"]);
    } else {
        echo json_encode(["message" => "Error ao atualizar cadastro"]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
