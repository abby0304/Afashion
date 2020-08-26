$(document).on('click', '#registro', function(){
    var dato = $("#message").val();
    var user = $("#user_id").val();
    var article = $("#article_id").val();
    var route = "/comment";
    var token  = $("#token").val();

    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data:{comment: dato, user:user, article:article},

      success:function(){
        $('#message').val('');
        $(".refresh").load(location.href + " .refresh");

      }

    });

});

