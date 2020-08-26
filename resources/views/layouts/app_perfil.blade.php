<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/favicon.png" type="image/png">
        <title>Perfil</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset("../css/bootstrap.css") }}">
        <link rel="stylesheet" href="{{ asset("../vendors/linericon/style.css") }}">
        <link rel="stylesheet" href="{{ asset("../css/font-awesome.min.css") }}">
        <link rel="stylesheet" href="{{ asset("../vendors/owl-carousel/owl.carousel.min.css") }}">
        <link rel="stylesheet" href="{{ asset("../vendors/lightbox/simpleLightbox.css") }}">
        <link rel="stylesheet" href="{{ asset("../vendors/nice-select/css/nice-select.css") }}">
        <link rel="stylesheet" href="{{ asset("../vendors/animate-css/animate.css") }}">
        <link rel="stylesheet" href="{{ asset("../vendors/popup/magnific-popup.css") }}">
         <!-- main css -->
         <link rel="stylesheet" href="{{ asset("../css/style.css") }}">
        <link rel="stylesheet" href="{{ asset("../css/responsive.css") }}">

        <link href="{{ asset("css/css/style2.css") }}" rel="stylesheet">
		
		
		
	<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("../css/compact-gallery.css") }}">

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
    </head>
    <body>
          <!--================Navar menu=================-->
        <header class="header_area" style="background:black;">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="/home"><img src="../img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
                            @guest
                                <li class="nav-item active"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li> 
                                @if (Route::has('register'))
                                <li class="nav-item active"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> 
                                @endif
                            @else
								<li class="nav-item active"><a class="nav-link" href="/home">Inicio</a></li> 
								<li class="nav-item"><a class="nav-link" href="/article"><i class="fa fa-plus" aria-hidden="true"> Agregar</i></a></li> 
                                <li class="nav-item"><a class="nav-link" href="/usuario"><i class="fa fa-gear"> Confi</i></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Cerrar session</a></li>
                                                     <li class="nav-item"></li>
							</ul>
                            <a href="{{ route('perfil.show', $user->id ) }}">
                            <img width=60 height=60 class="author_img rounded-circle" style="object-fit: cover;" src="{{Cloudder::show('/Users_multi/'.$user->imagen_avatar)}}" alt="">
							</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            @endguest
                        </div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Navar menu =================-->

        @yield('content')


        <script>
        function handle(e){
            if(e.keyCode === 13){
                e.preventDefault(); // Ensure it is only this code that rusn

                            window.location.href = '/busqueda';
            }
        }
       </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset("../js/jquery-3.3.1.min.js") }}"></script>
        <script src="{{ asset("../js/popper.js") }}"></script>
        <script src="{{ asset("../js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("../js/stellar.js") }}"></script>
        <script src="{{ asset("../vendors/lightbox/simpleLightbox.min.js") }}"></script>
        <script src="{{ asset("../vendors/nice-select/js/jquery.nice-select.min.js") }}"></script>
        <script src="{{ asset("../vendors/isotope/imagesloaded.pkgd.min.js") }}"></script>
        <script src="{{ asset("../vendors/isotope/isotope.pkgd.min.js") }}"></script>
        <script src="{{ asset("../vendors/owl-carousel/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("../vendors/popup/jquery.magnific-popup.min.js") }}"></script>
        <script src="{{ asset("../js/jquery.ajaxchimp.min.js") }}"></script>
        <script src="{{ asset("../vendors/counter-up/jquery.waypoints.min.js") }}"></script>
        <script src="{{ asset("../vendors/counter-up/jquery.counterup.js") }}"></script>
        <script src="{{ asset("../js/mail-script.js") }}"></script>
        <script src="{{ asset("../js/theme.js") }}"></script>
        <script src="{{ asset("../js/follow.js") }}"></script>
    </body>
</html>