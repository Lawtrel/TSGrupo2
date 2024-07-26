<?php
include_once "../config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST["cliente"];
    $contato = $_POST["contato"];
    $data = $_POST["data"];
    $metodo_pagamento = $_POST["metodo_pagamento"];
    $estado_servico = $_POST["estado_servico"];
    $estado_pagamento = $_POST["estado_pagamento"];
    $mecanico = $_POST["mecanico"];
    $veiculo = $_POST["veiculo"];
    
    $sql = "INSERT INTO orders (delivered_to, phone_no, order_date, pay_method, order_status, pay_status, mechanic_id, vehicle) VALUES ('$cliente', '$contato', '$data', '$metodo_pagamento', '$estado_servico', '$estado_pagamento', '$mecanico', '$veiculo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nova ordem de serviço adicionada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Ordem de Serviço</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Nova Ordem de Serviço</h2>
        <form action="addOrder.php" method="POST">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input type="text" class="form-control" id="cliente" name="cliente" required>
            </div>
            <div class="form-group">
                <label for="contato">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato" required>
            </div>
            <div class="form-group">
                <label for="veiculo">Veículo</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" required>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>
            <div class="form-group">
                <label for="metodo_pagamento">Método de Pagamento</label>
                <input type="text" class="form-control" id="metodo_pagamento" name="metodo_pagamento" required>
            </div>
            <div class="form-group">
                <label for="estado_servico">Estado de Serviço</label>
                <select class="form-control" id="estado_servico" name="estado_servico">
                    <option value="0">Pendente</option>
                    <option value="1">Feito</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado_pagamento">Estado de Pagamento</label>
                <select class="form-control" id="estado_pagamento" name="estado_pagamento">
                    <option value="0">Devendo</option>
                    <option value="1">Pago</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mecanico">Mecânico</label>
                <select class="form-control" id="mecanico" name="mecanico">
                    <?php
                    $sql = "SELECT * FROM mecanicos";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Ordem de Serviço</button>
        </form>
    </div>
</body>
</html>
