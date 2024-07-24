<!--- CRIADO: JULIA TITO ASSUNÇÃO DATA:20/07/2024 -->

<div>
  <h2>Preços</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Foto do Serviço</th>
        <th class="text-center">Nome do Serviço</th>
        <th class="text-center">Descrição do Serviço</th>
        <th class="text-center">Categoria</th>
        <th class="text-center">Preço</th>
        <th class="text-center" colspan="2">Ação</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id";
      $result=$conn->query($sql);
      $count=1;
      if ($result->num_rows > 0) {
        while ($row=$result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["product_desc"]?></td>
      <td><?=$row["category_name"]?></td>
      <td><?=$row["price"]?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Editar</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Apagar</button></td>
    </tr>
    <?php
          $count=$count+1;
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Adicionar Preços
  </button>

  <!-- Modal Adicionar Preço -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Adicionar Preço</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addItemController.php" method="POST">
            <div class="form-group">
              <label for="name">Nome do Serviço:</label>
              <input type="text" class="form-control" name="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Preço:</label>
              <input type="number" class="form-control" name="p_price" required>
            </div>
            <div class="form-group">
              <label for="desc">Descrição:</label>
              <input type="text" class="form-control" name="p_desc" required>
            </div>
            <div class="form-group">
              <label>Categoria:</label>
              <select name="category" class="form-control">
                <option disabled selected>Selecionar Categoria</option>
                <?php
                  $sql="SELECT * from category";
                  $result=$conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row=$result->fetch_assoc()) {
                      echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="file">Escolher Foto:</label>
              <input type="file" class="form-control-file" name="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Adicionar</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addProductModal">
    Adicionar Produtos
  </button>

  <!-- Modal Adicionar Produto -->
  <div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Adicionar Produto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addProductController.php" method="POST">
            <div class="form-group">
              <label for="barcode">Código de Barras:</label>
              <input type="text" class="form-control" name="barcode" required>
            </div>
            <div class="form-group">
              <label>Categoria:</label>
              <select name="prod_category" class="form-control">
                <option disabled selected>Selecionar Categoria</option>
                <?php
                  $sql="SELECT * from category";
                  $result=$conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row=$result->fetch_assoc()) {
                      echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="prod_desc">Descrição:</label>
              <input type="text" class="form-control" name="prod_desc" required>
            </div>
            <div class="form-group">
              <label for="prod_price">Preço:</label>
              <input type="number" class="form-control" name="prod_price" required>
            </div>
            <div class="form-group">
              <label for="stock">Estoque:</label>
              <input type="number" class="form-control" name="stock" required>
            </div>
            <div class="form-group">
              <label for="prod_file">Escolher Foto:</label>
              <input type="file" class="form-control-file" name="prod_file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Adicionar</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>
