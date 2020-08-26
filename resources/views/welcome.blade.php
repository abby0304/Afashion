<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/favicon.png" type="image/png">
<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
<title>AFashion</title>
<style>
  body
{
	background:url(img/21.jpg);
	background-repeat:no-repeat;
	background-size:cover;
    background-attachment: fixed;

}
.verticalhorizontal {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
  </style>
</head>
<body>

<div class="verticalhorizontal">
   <img style="max-width:65%; height: auto; "src="img/afashion.png">
</div>


@if (Route::has('login'))
				@auth
			  	<button onclick="window.location='/home';" style="width:auto; position:absolute; top:20px; right:50px;">Home</button>
				@else
				<button onclick="window.location='/login';" style="width:auto; position:absolute; top:20px; right:190px;">Login</button>
						@if (Route::has('register'))
						<button onclick="window.location='/register';" style="width:auto; position:absolute; top:20px; right:50px;">Registro</button>
						@endif
				@endauth
		</div>
@endif


  
 

</body>
</html>
