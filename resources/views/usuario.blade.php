@extends('layouts.app_usuario')

@section('content')
  <!--================Home Banner Area =================-->
	<section class="banner_area">
      <div class="box_1620" >
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h2> {{ $user->name }}  {{ $user->apellido }}</h2>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
				<br/><br/>

		<!--Foto perfil-->
		<div class="site-block-profile-pic" data-aos="fade" data-aos-delay="200">
		  <a href="about.html"><img src="{{Cloudder::show('/Users_multi/'.$user->imagen_avatar)}}" style="object-fit: cover;" width="150" height="150" alt="Image"></a>
		</div>
        
		<br/><br/>
		
		
		
		<!-- <a href = "">
		 <input type="submit" Value="Modificar Usuario" style="position:absolute; left: 42%; width:250px;">
		 </a>-->

	    <!-- Borrador -->
		@if(!empty($articles))
		<div class="shopping-cart">
		<div style="width: 100%;  overflow:auto; height:430px;">
		  <!-- Title -->
		  <div class="title">
			Tus publicaciones en borrador
		  </div>
	
      @foreach ($articles as $article)
		  <!-- Product #1 -->
		  <div class="item">
				<div class="buttons">
				
					<input type="hidden" value="{{ csrf_token() }}" id="token">
					<i class="fa fa-remove" data-id="{{ $article->id}}"  id="destroy" style="font-size:24px; opacity: 0.7;"></i>
					

					<a href = "{{ route('usuario.show', $article->id ) }}" style="text-decoration:none">
						<span>
						<font size="5" color="gray"> &#9998; </font>
						</span>
					</a>

					@if($article->borrador == 1)
					<input type="checkbox" name="vehicle1" style =" height: 20px; width: 20px;" checked disabled="disabled"><br>
					@else
					<input type="checkbox" name="vehicle1" style =" height: 20px; width: 20px;" disabled="disabled"><br>
					@endif
				</div>
				
				<div class="image">
					<img src="{{Cloudder::show('/Publi_multi/'.$article->img1, array("width"=>300, "height"=>300, "crop"=>"fill"))}}" alt="" height="150" />
				</div>

				<div class="description">
					<span>Nombre: {{ $article->name_article  }} </span>
					<span>Descripcion: {{ $article->description  }}</span>
				</div>		
		  </div>

			@endforeach		
		   </div>
      </div>			  
		</div> 
	
	 @endif
	 <br/>
	 <br/>
	 
	 		<br/><br/><br/><br/>
			 @endsection  