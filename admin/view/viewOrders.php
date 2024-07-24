<!---
CRIADO: JULIA TITO ASSUNÇÃO
DATA:20/07/2024
-->
<div id="ordersBtn">
    <h2>Ordem de Serviços</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Clientes</th>
                <th>Contato</th>
                <th>Data</th>
                <th>Metodo de Pagamento</th>
                <th>Estado de Serviço</th>
                <th>Estado de Pagamento</th>
                <th>Mecânico</th>
                <th>Mais Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../config/dbconnect.php";
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

<!-- Modal -->
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
    //for view order modal  
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');
            $('.order-view-modal').load(dataURL,function(){
                $('#viewModal').modal({show:true});
            });
        });
    });
</script>
