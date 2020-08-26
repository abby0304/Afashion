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

  </style>
</head>
<body>



@yield('content')


<script>
		function info()
		{

	     if(document.getElementById("admin").checked == true)
		 {
		 document.getElementById("id_fiscal").value = 1;
		 }
		 else
		 {
		 document.getElementById("id_fiscal").value = 0;
		 }
        }

		</script>

<script  src="js/preview_fotos.js"></script>
        <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</body>
</html>