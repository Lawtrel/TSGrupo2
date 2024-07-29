<!--
CRIADO: JULIA TITO ASSUNÇÃO
DATA:20/07/2024
-->
<div id="ordersBtn">
    <h2>Ordem de Serviços</h2>
    <div class="header-summary">
        <?php
        include_once "../config/dbconnect.php";
        
        // Contagem de pedidos finalizados e pendentes
        $sql_completed = "SELECT COUNT(*) as completed FROM orders WHERE order_status = 1";
        $result_completed = $conn->query($sql_completed);
        $completed = $result_completed->fetch_assoc()['completed'];

        $sql_pending = "SELECT COUNT(*) as pending FROM orders WHERE order_status = 0";
        $result_pending = $conn->query($sql_pending);
        $pending = $result_pending->fetch_assoc()['pending'];
        ?>
        <div>
            <span class="summary-number"><?= $completed ?></span>
            <span>Concluídos</span>
        </div>
        <div>
            <span class="summary-number"><?= $pending ?></span>
            <span>Pendentes</span>
        </div>
        <div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#addOrderModal">Adicionar Ordem de Serviço</button>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Clientes</th>
                <th>Contato</th>
                <th>Data</th>
                <th>Método de Pagamento</th>
                <th>Estado de Serviço</th>
                <th>Estado de Pagamento</th>
                <th>Mecânico</th>
                <th>Mais Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT orders.*, mecanicos.nome AS mechanic_name 
                    FROM orders 
                    LEFT JOIN mecanicos ON orders.mechanic_id = mecanicos.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?=$row["order_id"]?></td>
                        <td><?=$row["delivered_to"]?></td>
                        <td><?=$row["phone_no"]?></td>
                        <td><?=$row["order_date"]?></td>
                        <td><?=$row["pay_method"]?></td>
                        <td>
                            <?php if ($row["order_status"] == 0) { ?>
                                <button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pendente</button>
                            <?php } else { ?>
                                <button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Feito</button>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($row["pay_status"] == 0) { ?>
                                <button class="btn btn-danger" onclick="ChangePay('<?=$row['order_id']?>')">Devendo</button>
                            <?php } else if ($row["pay_status"] == 1) { ?>
                                <button class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Pago</button>
                            <?php } ?>
                        </td>
                        <td><?=$row["mechanic_name"] ?? 'Não atribuído'?></td>
                        <td>
                            <a class="btn btn-primary openPopup" data-href="./view/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">Ver</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal para Adicionar Ordem de Serviço -->
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderModalLabel">Adicionar Nova Ordem de Serviço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./dao/addOrder.php" method="POST">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Ver Ordem de Serviço -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalhes de Serviço</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body">
            </div>
        </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>

<script>
    // for view order modal  
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');
            $('.order-view-modal').load(dataURL,function(){
                $('#viewModal').modal({show:true});
            });
        });
    });
</script>

<style>
    #ordersBtn {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    h2 {
        margin-bottom: 20px;
    }

    .header-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .summary-number {
        font-size: 24px;
        font-weight: bold;
        display: block;
    }

    .btn-primary {
        margin-left: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead th {
        border-bottom: 2px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .table tbody tr {
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr td {
        padding: 10px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .modal-dialog {
        max-width: 600px;
    }
</style>
