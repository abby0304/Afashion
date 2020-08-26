$("#follow").click(function(){
    var user = $("#user_id").val();
    var user_follow = $("#user_follow").val();
    var token  = $("#token").val();
    var route = "/perfil";
   
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data:{user:user, user_follow:user_follow},

      success:function(result){
        //$("#follow").prop('value', 'Siguiendo'); 
        //$('input.follow').val('Siguiendo');

        if($('#follow').val() == "Seguir")
        {
        $('input[name="change_follow"]').val("Siguiendo");
        }else{
            $('input[name="change_follow"]').val("Seguir");
        }


      }

    });

});