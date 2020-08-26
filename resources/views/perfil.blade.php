@extends('layouts.app_perfil')

@section('content')
				<!--================Home Banner Area =================-->
				 <section class="banner_area">
            <div class="box_1620">
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<!--Foto perfil-->
						<div class="site-block-profile-pic" data-aos="fade" data-aos-delay="200">
							<img src="{{Cloudder::show('/Users_multi/'.$user_art[0]->imagen_avatar)}}" style="object-fit: cover;" width="150" height="150" alt="Image">
						</div>
						<h2>{{ $user_art[0]->name }} {{ $user_art[0]->apellido }}</h2>  
						</br>
						</br>
						<input type="submit" class="btn btn-danger" style="background-color: #C82333;" data-toggle="modal" data-target="#myModal" value="Seguidos">


						@if($user->id != $id)
							<input type="hidden" value="{{ $user->id }}" id="user_id">
							<input type="hidden" value="{{ $user_art[0]->id }}" id="user_follow">
							<input type="hidden" value="{{ csrf_token() }}" id="token">
							<input type="submit" id="follow" name="change_follow" class="btn btn-danger" style="background-color: #C82333;" @if($follow->count() == 0) value="Seguir" @else value="Siguiendo" @endif  >
						@endif  
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

			
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		Seguidos
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">

		@if($follows->count() == 1)
             <p>No sigue a nadie por el momento</p>
        @endif

		@if(!empty($follows))
            @foreach ($follows as $follow)
			@if($follow->id !=  $user_art[0]->id)
		  <p> <a href="{{ route('perfil.show', $follow->id ) }}"><img src="{{Cloudder::show('/Users_multi/'.$follow->imagen_avatar, array("width"=>300, "height"=>300, "crop"=>"fill"))}}" alt="Image" style="object-fit: cover; border-radius: 50%; float: right; margin: 0px 0px 5px 5px;" width=45 height=45> 
		  </a>{{ $follow->name }} {{ $follow->apellido }}</p>
        <br/>
		<br/>
		<br/>
		@endif  	 
		@endforeach
     @endif

		</div>
		
		 
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
		
				</br>
						
	
         <!--================Contenido =================-->
	 <section class="gallery-block compact-gallery">
        <div class="container">
            <div class="heading">
			@if($articles->count() > 0)	
                <h2>Contenido</h2>
			@else
			    <h2>No hay contenido por el momento</h2>
			@endif
            </div>
            <div class="row no-gutters">
			@if(!empty($articles))
              @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4 item zoom-on-hover">
                    <a class="lightbox" href="{{ route('article.show', $article->id ) }}">
                        <img class="img-fluid image" src="{{Cloudder::show('/Publi_multi/'.$article->img1, array("width"=>400, "height"=>250, "crop"=>"fill"))}}">
						<span class="description">
						    <span class="profile-picture__number">
                                <i class="fa fa-heart"></i>
                            </span>
                            <span class="description-heading">{{ $article->name_article }}</span>
                            <span class="description-body">{{ $article->description }}</span>
                        </span>
                    </a>
                </div>
				@endforeach
             @endif
            </div>
        </div>
    </section>
           <!--================Contenido ================-->
        
		
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>About Me</h3>
        					</div>
        					<p>Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills,</p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</p>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
        					<div class="f_title">
        						<h3>Newsletter</h3>
        					</div>
        					<p>Stay updated with our latest trends</p>
        					<div id="mc_embed_signup">
                                
                            </div>
        				</aside>
        			</div>
        			
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
		
		
        </div>
@endsection
