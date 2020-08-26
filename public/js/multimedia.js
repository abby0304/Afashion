$(document).ready(function(){
        var i = 0;
		var v = 0;
	
        $("#add_more_img").click(function(e){
            i++;
            $("#dynamic_table_field").append('<tr id=row'+i+'><td><input type="file" onchange="myfn(this)" name="img'+i+'" id="event_images'+i
            +'" data-panelid="event_images'+i+'" class="form-control images_list" accept="image/gif, image/png, image/jpeg, image/pjpeg" />'
            +'</td><td id="img_preview_td"><img  height="200" id="img_preview'+i+'" /></td></tr>');
            e.preventDefault();	

            document.getElementById("number_i").value = i;

			if(i==3)
			{
			   document.getElementById('add_more_img').disabled=true;
            }	
            
        });
		
		$("#add_more_video").click(function(e){
		 v++;
            $("#dynamic_table_video").append('<tr id=row'+v+'><td><input type="file" id="file" name="video'+v+'" class="file_multi_video" onchange="Filevalidation()" accept="video/*" />'
            +'</td>');
            e.preventDefault();	
			document.getElementById("number_v").value = v;
			if(v==1)
			{
			   document.getElementById('add_more_video').disabled=true;
			}	
        });	
		
		/*$(document).on("change", '.file_multi_video', function(evt) {
		  var $source = $('#video_here');
		  $source[0].src = URL.createObjectURL(this.files[0]);
		  $source.parent()[0].load();
		 });*/
	
    });

      function myfn(myinput) {
            var name = $(myinput).attr("name");
            var id = $(myinput).attr("id");
            var val = $(myinput).val();
            debugger;
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':
                    readURL(myinput);
                    break;
                default:
                    $(this).val('');
                    break;
            }
        }

        function readURL(myinput) {
           debugger;
            if (myinput.files && myinput.files[0]) {
                  var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_preview' + $(myinput).attr("id").replace('event_images','')).attr('src', e.target.result);
                }
                reader.readAsDataURL(myinput.files[0]);
            }
        }

        Filevalidation = () => { 
        const fi = document.getElementById('file'); 
        // Check if any file is selected. 
        if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file > 2048) { 
                    alert( 
                      "El video es pesado, por favor seleccione un video menor o igual a 2mb"); 
                    fi.value = '';
                }
            } 
        } 
    } 