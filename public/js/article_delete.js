$("#destroy").click(function(){
    var article = $(this).data("id");
    var route = "/article/"+ article;
    var token  = $("#token").val();

    if(confirm("ALERTA!! Deseas eliminar el articulo?"))
    {
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN': token},
      type: 'DELETE',
      dataType: "json",
      data:{article:article},

      success:function(){
        location.reload();
      }

    });
   }
});