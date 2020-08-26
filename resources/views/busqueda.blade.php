@extends('layouts.app_home')

@section('content')	
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        
      
        <main class="explore">
            <section class="people">
            <br/>
             <p class="h2" align="center">Resultados</p>
             @if($busquedas->count() == 0)
                       <p class="h1">No se encontro el usuario</p>
             @endif
                <ul class="people__list">
                @if(!empty($busquedas))
                            @foreach ($busquedas as $busqueda)
                    <li class="people__person">
                        <div class="people__column">
                            <div class="people__avatar-container">
                                <img
                                    class="people__avatar"
                                    style="object-fit: cover;"
                                    src={{Cloudder::show('/Users_multi/'.$busqueda->imagen_avatar)}} 
                                />
                            </div>
                            <div class="people__info">
                                <span class="people__username">{{ $busqueda->name}} {{ $busqueda->apellido}}</span>
                                <span class="people__full-name">{{ $busqueda->email}}</span>
                            </div>
                        </div>
                        <div class="people__column">
                            <a href="{{ route('perfil.show', $busqueda->id ) }}">Perfil</a>
                        </div>
                    </li>
                    @endforeach
                 @endif
                </ul>
            </section>
        </main>

        <br/><br/><br/><br/><br/>

        <div class="col-sm-4" style="float: none; margin: 0 auto;">
         <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
                <form action="buscar"  method="POST">
                    @csrf
                    <div class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                    </span>
                    </div><!-- /input-group -->
                </form>
                <div class="br"></div>
                </aside>
                </div>
            </div>
		
		<br/><br/><br/><br/>
       
        <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
        <script src="js/app.js"></script>
@endsection      
      