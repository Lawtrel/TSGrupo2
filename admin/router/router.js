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