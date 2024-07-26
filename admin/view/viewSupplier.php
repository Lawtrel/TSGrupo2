<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fornecedores - GaragemTech</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      margin: 20px;
    }

    .status {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 5px;
      color: #fff;
    }

    .status.in-progress { background-color: #007bff; }
    .status.delivered { background-color: #28a745; }
    .status.shipping { background-color: #ffc107; }

    .order-summary {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
    }

    .order-summary div {
      border-radius: 5px;
      padding: 10px;
      text-align: center;
      width: 200px;
    }

    .order-summary .delivered { background-color: #d4edda; }
    .order-summary .shipping { background-color: #fff3cd; }
    .order-summary .in-progress { background-color: #d1ecf1; }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Fornecedores</h1>
    </header>
    <nav>
      <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="../admin/addSupplier.html">Adicionar Fornecedor</a></li>
        <li class="nav-item"><a class="nav-link" href="../admin/editSupplier.html">Editar Fornecedor</a></li>
        <li class="nav-item"><a class="nav-link" href="../admin/logSupplier.html">Log de Registro</a></li>
      </ul>
    </nav>
    <div class="search-bar">
      <input type="text" id="search" name="search" class="form-control" placeholder="Buscar por nome">
    </div>
    <table id="supplierTable" class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>Empresa fornecedora</th>
          <th>Pedidos</th>
          <th>Status</th>
          <th>A caminho</th>
          <th>Entregue</th>
        </tr>
      </thead>
      <tbody>
        <!-- Os dados serão preenchidos dinamicamente pelo JavaScript -->
      </tbody>
    </table>
  <div class="order-summary">
    <div id="delivered" class="delivered">
    <h3>Pedidos entregues</h3>
    <p></p>
  </div>
  <div id="shipping" class="shipping">
    <h3>Pedidos sendo enviados</h3>
    <p></p>
  </div>
  <div id="in-progress" class="in-progress">
    <h3>Pedidos em andamento</h3>
    <p></p>
  </div>
</div>

  <script>
 $(document).ready(function() {
    $.ajax({
        url: './dao/fetch_suppliers.php',
        type: 'GET',
        success: function(data) {
            let response = JSON.parse(data);
            let suppliers = response.suppliers;
            let statusCounts = response.statusCounts;
            let tableBody = $('#supplierTable tbody');
            tableBody.empty();

            if (suppliers.length > 0) {
                suppliers.forEach(function(supplier) {
                    let row = '<tr>' +
                        '<td>' + supplier.supplier_name + '</td>' +
                        '<td>' + supplier.order_description + '</td>' +
                        '<td><span class="status ' + supplier.status.toLowerCase() + '">' + supplier.status + '</span></td>' +
                        '<td>' + supplier.shipment_date + '</td>' +
                        '<td>' + supplier.delivery_date + '</td>' +
                        '</tr>';
                    tableBody.append(row);
                });
            } else {
                tableBody.append('<tr><td colspan="5" class="text-center">Nenhum fornecedor encontrado</td></tr>');
            }

            // Atualizar os cards
            $('#delivered p').text(statusCounts.delivered + ' pedidos entregues');
            $('#shipping p').text(statusCounts.shipping + ' pedidos sendo enviados');
            $('#in-progress p').text(statusCounts['in-progress'] + ' pedidos em andamento');
        }
    });
});
  </script>
</body>
</html>
