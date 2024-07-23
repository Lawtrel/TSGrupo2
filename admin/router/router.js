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