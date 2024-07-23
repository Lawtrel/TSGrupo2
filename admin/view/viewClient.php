<!---
CRIADO: JULIA TITO ASSUNÇÃO
DATA:20/07/2024
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes - GaragemTech</title>
  <link rel="stylesheet" href="./assets/css/client.css">
  <!-- Script buscar em tempo real -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            let searchQuery = $(this).val();
            $.ajax({
                url: '../admin/dao/search.php',
                type: 'GET',
                data: { search: searchQuery },
                success: function(data) {
                    let clients = JSON.parse(data);
                    let tableBody = $('#clientTable tbody');
                    tableBody.empty();

                    if (clients.length > 0) {
                        clients.forEach(function(client) {
                            let row = '<tr>' +
                                '<td>' + (client.id ? client.id : 'N/A') + '</td>' +
                                '<td>' + (client.client_name ? client.client_name : 'N/A') + '</td>' +
                                '<td>' + (client.cpf_Cnpj ? client.cpf_Cnpj : 'N/A') + '</td>' +
                                '<td>' + (client.person_Type ? client.person_Type : 'N/A') + '</td>' +
                                '<td>' + (client.address ? client.address : 'N/A') + '</td>' +
                                '<td>' + (client.number ? client.number : 'N/A') + '</td>' +
                                '<td>' + (client.neighborhood ? client.neighborhood : 'N/A') + '</td>' +
                                '<td>' + (client.city ? client.city : 'N/A') + '</td>' +
                                '<td>' + (client.zip ? client.zip : 'N/A') + '</td>' +
                                '<td>' + (client.country ? client.country : 'N/A') + '</td>' +
                                '<td>' + (client.phone ? client.phone : 'N/A') + '</td>' +
                                '<td>' + (client.email ? client.email : 'N/A') + '</td>' +
                                '<td>' + (client.plate ? client.plate : 'N/A') + '</td>' +
                                '<td>' + (client.model ? client.model : 'N/A') + '</td>' +
                                '<td>' + (client.year ? client.year : 'N/A') + '</td>' +
                                '<td>' + (client.color ? client.color : 'N/A') + '</td>' +
                                '<td>' + (client.renavam ? client.renavam : 'N/A') + '</td>' +
                                '<td>' + (client.registered_at ? client.registered_at : 'N/A') + '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="18" class="text-center">Nenhum cliente encontrado</td></tr>');
                    }
                }
            });
        });
    });
  </script>  
</head>
<body>
  <div class="container">
    <h1>Visualização de Clientes</h1>
    <nav>
      <ul>
        <li><a href="../admin/addClient.html">Adicionar Cliente</a></li>
        <li><a href="../admin/editClient.html">Editar Cliente</a></li>
        <li><a href="../admin/logClient.html">Log de Registro</a></li>
      </ul>
    </nav>

    <!-- Barra de Busca -->
    <form>
      <input type="text" id="search" name="search" placeholder="Buscar por nome">
    </form>

    <table id="clientTable" class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>CPF/CNPJ</th>
          <th>Tipo de Pessoa</th>
          <th>Endereço</th>
          <th>Número</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>CEP</th>
          <th>País</th>
          <th>Celular</th>
          <th>E-mail</th>
          <th>Placa</th>
          <th>Marca/Modelo</th>
          <th>Ano</th>
          <th>Cor</th>
          <th>Renavam</th>
          <th>Data de Cadastro</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include_once "../config/dbconnect.php";
          $sql = "SELECT DISTINCT * FROM clients";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . (isset($row['id']) ? $row['id'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['client_name']) ? $row['client_name'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['cpf_Cnpj']) ? $row['cpf_Cnpj'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['person_Type']) ? $row['person_Type'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['address']) ? $row['address'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['number']) ? $row['number'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['neighborhood']) ? $row['neighborhood'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['city']) ? $row['city'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['zip']) ? $row['zip'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['country']) ? $row['country'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['phone']) ? $row['phone'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['email']) ? $row['email'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['plate']) ? $row['plate'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['model']) ? $row['model'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['year']) ? $row['year'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['color']) ? $row['color'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['renavam']) ? $row['renavam'] : 'N/A') . "</td>";
                  echo "<td>" . (isset($row['registered_at']) ? $row['registered_at'] : 'N/A') . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='18' class='text-center'>Nenhum cliente encontrado</td></tr>";
          }
        ?>
      </tbody>
    </table>
  </div> 
</body>
</html>
