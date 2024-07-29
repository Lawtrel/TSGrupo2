function showClient(){
  $.ajax({
      url:"./view/viewClient.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}
function showSupplier(){
  $.ajax({
      url:"./view/viewSupplier.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}
function showProducts(){
  $.ajax({
      url:"./view/viewProducts.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}
function showConsult(){
  var link = document.createElement('a');
  link.href = 'https://www.gov.br/pt-br/servicos/consultar-dados-de-veiculo-na-base-renavam';
  link.target = '_blank';
  link.click();
}
function showMechanic(){
  $.ajax({
      url:"./view/viewMechanic.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}
function showOrders(){
  $.ajax({
      url:"./view/viewOrders.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}
function showReport(){
  $.ajax({
      url:"./view/viewReport.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}

function showOrders(){
  $.ajax({
      url:"./view/viewAllOrders.php",
      method:"post",
      data:{record:1},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}

function ChangeOrderStatus(id){
  $.ajax({
     url:"./controller/updateOrderStatus.php",
     method:"post",
     data:{record:id},
     success:function(data){
         alert('Order Status updated successfully');
         $('form').trigger('reset');
         showOrders();
     }
 });
}

function ChangePay(id){
  $.ajax({
     url:"./controller/updatePayStatus.php",
     method:"post",
     data:{record:id},
     success:function(data){
         alert('Payment Status updated successfully');
         $('form').trigger('reset');
         showOrders();
     }
 });
}

function addItems(){
  var p_name=$('#p_name').val();
  var p_desc=$('#p_desc').val();
  var p_price=$('#p_price').val();
  var category=$('#category').val();
  var upload=$('#upload').val();
  var file=$('#file')[0].files[0];

  var fd = new FormData();
  fd.append('p_name', p_name);
  fd.append('p_desc', p_desc);
  fd.append('p_price', p_price);
  fd.append('category', category);
  fd.append('file', file);
  fd.append('upload', upload);
  $.ajax({
      url:"./controller/addItemController.php",
      method:"post",
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
          alert('Product Added successfully.');
          $('form').trigger('reset');
          showProductItems();
      }
  });
}

//edit product data
function itemEditForm(id){
  $.ajax({
      url:"./view/editItemForm.php",
      method:"post",
      data:{record:id},
      success:function(data){
          $('.allContent-section').html(data);
      }
  });
}

//update product after submit
function updateItems(){
  var product_id = $('#product_id').val();
  var p_name = $('#p_name').val();
  var p_desc = $('#p_desc').val();
  var p_price = $('#p_price').val();
  var category = $('#category').val();
  var existingImage = $('#existingImage').val();
  var newImage = $('#newImage')[0].files[0];
  var fd = new FormData();
  fd.append('product_id', product_id);
  fd.append('p_name', p_name);
  fd.append('p_desc', p_desc);
  fd.append('p_price', p_price);
  fd.append('category', category);
  fd.append('existingImage', existingImage);
  fd.append('newImage', newImage);
 
  $.ajax({
    url:'./controller/updateItemController.php',
    method:'post',
    data:fd,
    processData: false,
    contentType: false,
    success: function(data){
      alert('Data Update Success.');
      $('form').trigger('reset');
      showProductItems();
    }
  });
}

//delete product data
function itemDelete(id){
  $.ajax({
      url:"./controller/deleteItemController.php",
      method:"post",
      data:{record:id},
      success:function(data){
          alert('Items Successfully deleted');
          $('form').trigger('reset');
          showProductItems();
      }
  });
}
