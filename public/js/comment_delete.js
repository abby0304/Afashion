$(document).on('click', '#delete_comment', function(){
    var id_comment = $(this).data("id");
    var route = "/comment/"+ id_comment;
    var token  = $("#token").val();
  
    if(confirm("ALERTA!! Deseas eliminar este comentario?"))
    {
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN': token},
      type: 'DELETE',
      dataType: "json",
      data:{id_comment:id_comment},
  
      success:function(){
        $(".refresh").load(location.href + " .refresh");
      }
  
    });
    }
  });