$(document).on('click', '#heart', function(){
    var user = $("#user_id2").val();
    var article = $("#article_id2").val();
    var route = "/heart";
    var token  = $("#token").val();

    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data:{user:user, article:article},

      success:function(result){
        //location.reload();
        $(".photo__icons").load(location.href + " .photo__icons");
        //$(".photo__icon").html(result);

        /*setInterval(
          function(){
            $('.photo__info').load(location.href + " .photo__info");
          },2000
        );*/

      }

    });

});