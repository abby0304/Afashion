@extends('layouts.app_home')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<!--================Banner =================-->
<section class="home_banner_area">
    <div class="box_1620">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h3>Bienvenido <br /> {{ $user->name }} </h3>
                    <a class="main_btn" href="{{ route('perfil.show', $user->id ) }}">Ir a Perfil</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Banner =================-->



<br/><br/><br/>

<section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">

                       @if($articles->count() == 0)
                       <p class="h1">Busca a tus amigos</p>
                       @endif
                       
                        @if(!empty($articles))
                            @foreach ($articles as $article)
                                <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">  
                                            <ul class="blog_meta list">
                                                <li><a href="{{ route('perfil.show', $article->user_id ) }}">{{ $article->name }}<i class="lnr lnr-user"></i></a></li>
                                                <li><a >{{ $article->created_at  }}<i class="lnr lnr-calendar-full"></i></a></li>
                                            </ul>
                                        </div>
                                </div>
                                    <div class="col-md-9">
                                        <div class="blog_post">
                                         <a href="{{ route('article.show', $article->id ) }}">
                                            <img  style=" display:block; margin:auto;" src="{{Cloudder::show('/Publi_multi/'.$article->img1, array("width"=>300, "height"=>300, "crop"=>"fill"))}}" alt=""></a>
                                            <div class="blog_details">
                                                <h2>{{ $article->name_article  }}</h2>
                                                <p>{{ $article->description  }}</p>
                                                <a href="{{ route('article.show', $article->id ) }}" class="main_btn">Más información</a>
                                            
                                         </div>
                                        </div>
                                    </div>
                                </article>
                                <hr width=400>
                            @endforeach
                        @endif
                           <br/>

                           
                        {!! $articles->render() !!} 
                        
                           
                            <br/>
                            <br/>
                         
                        </div>
                    </div>
                    <div class="col-lg-4">
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
                            <aside class="single_sidebar_widget author_widget">
                                <a  href="{{ route('perfil.show', $user->id ) }}"><img width=200 height=200 class="author_img rounded-circle" style="object-fit: cover;" src="{{Cloudder::show('/Users_multi/'.$user->imagen_avatar)}}" alt=""</a>
                                <h4> {{ $user->name  }} {{ $user->apellido  }} </h4>
                                <div class="br"></div>
                            </aside>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection


