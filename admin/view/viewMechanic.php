<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Mecânico</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
        }

        .card {
            background-color: #8239BA;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 8px 5px 5px #8239BA;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #8239BA;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #6a2a97;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        #mechanicForm {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div id="mechanicForm">
        <h2>Cadastro de Mecânico</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include_once "../config/dbconnect.php";

            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $especialidade = isset($_POST['especialidade']) ? $_POST['especialidade'] : '';
            $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';

            if (!empty($nome) && !empty($especialidade) && !empty($telefone) && !empty($email)) {
                $sql = "INSERT INTO mecanicos (nome, specialty, phone, email) VALUES ('$nome', '$especialidade', '$telefone', '$email')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success'>Novo mecânico cadastrado com sucesso!</p>";
                } else {
                    echo "<p class='error'>Erro: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p class='error'>Todos os campos são obrigatórios.</p>";
            }

            $conn->close();
        }
        ?>
        <form action="./view/viewMechanic.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="especialidade">Especialidade:</label>
                <input type="text" id="especialidade" name="especialidade" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <input type="submit" value="Cadastrar" class="btn">
        </form>
    </div>
</body>
</html>
