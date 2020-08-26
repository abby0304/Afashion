@extends('layouts.articulo_contenido')

@section('content')
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="box_1620">
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h2>{{ $article->users->name }} {{ $article->users->apellido }}</h2>
                            <br/>
                            @if($user->id != $article->user_id)
                            <a class="main_btn" href="{{ route('perfil.show', $article->user_id ) }}">Ir a Perfil</a> 
                            @endif 
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
							   <div class="w3-content w3-display-container">
                            
                                @foreach (array(1, 2, 3, 4, 5) as $valor)
                                @php ( $img= 'img'.$valor)
                                @if($article->$img != 'null')
								 <div class="mySlides">
										<img class="img-fluid" style=" display:block; margin:auto;" src="{{Cloudder::show('/Publi_multi/'.$article->$img, array("width"=>450, "height"=>350, "crop"=>"fill"))}}" alt="">
								</div>
                                 @endif
                                @endforeach
                           
                                @foreach (array(1, 2, 3) as $valor)
                                  @php ( $video= 'video'.$valor)
                                  @if($article->$video != 'null')
								<div class="mySlides">
										<video style="max-width: 90%; display:block; margin:auto;" controls>
											<source src="https://res.cloudinary.com/hluvix6xj/video/upload/v1556954445/Publi_multi/{{ $article->$video }}" type="video/mp4">
										</video>
								</div>
                                 @endif
                                @endforeach

								  <button class="w3-button w3-red w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
								  <button class="w3-button w3-red w3-display-right" onclick="plusDivs(1)">&#10095;</button>
								</div>
                               
                              
                                <input type="hidden" value="{{ $article->id}}" id="article_id2">
                                <input type="hidden" value="{{ $user->id}}" id="user_id2">
                                	<div class="photo__info">
										<div class="photo__icons">
											<span class="photo__icon" style="position:relative; left:40%;" >
                                            @if($heart_user->count() > 0)
												<span style="color:red"><i class="fa heart-red fa-heart fa-lg" id="heart" > </i> {{ $heart[0]->likes }} heart</span>
                                            @else
                                               <i class="fa fa-heart-o heart fa-lg" id="heart" >   </i> {{ $heart[0]->likes }} heart 
                                            @endif
											</span>
										</div>
									  </div>	
                              			
                            </div>
							
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <p class="lnr lnr-calendar-full"> {{ $article->created_at }}</p>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 ">
                                <h2>{{ $article->name_article }}</h2>
                                <p class="excert">
                                {{ $article->description }}
                                </p>
                            </div>
                            
                        </div>
                     
                        <div class="comments-area">
                            <h4>Comentarios <i class="fa fa-comments-o" aria-hidden="true"></i></h4>
                         <div class="refresh">
                         @if($comments->count() == 0)	
                            <h4>No hay comentarios, nos importa tu opinion!!</h4>
                        @endif
                             @if(!empty($comments))
                             @foreach ($comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                   
                                        <div class="thumb">
                                            <img src="{{Cloudder::show('/Users_multi/'.$comment->imagen_avatar)}}" style="object-fit: cover; border-radius: 50%;" width="90" height="90" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="{{ route('perfil.show', $comment->userid ) }}">{{ $comment->name}} </a></h5>
                                            <p class="date">{{ $comment->created_at }}</p>
                                            <p class="comment">
                                               {{ $comment->comment_des }}
                                            </p>
                                        </div>

                                        @if($user->name == $comment->name)
                                        <div  style="position:absolute; right:50px;">
                                        <input type="hidden" value="{{ csrf_token() }}" id="token">
                                        <input type="submit" data-id="{{ $comment->id}}" id="delete_comment" value="&#10006;">
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                              @endforeach
                              @endif
                         </div>									
                        </div>
                        <div class="comment-form">
                            <h4>Deja tu mensaje</h4>
                            
                                <input type="hidden" name="" value="{{ $article->id}}" id="article_id">
                                <input type="hidden" name="_token" value="{{ $user->id}}" id="user_id">
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" id="message" name="message" placeholder="Mensaje" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensaje'" required=""></textarea>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                               
                                <input type="submit" id="registro" class="primary-btn submit_btn" value="Comentar">
                              
                        </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">   

                             <form action="{{url('buscar')}}"  method="POST">
                                  @csrf
                                  <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                        
                                    </span>
                                  </div><!-- /input-group -->
                                </form>

                             <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget author_widget">
                                <h4>Publicación </h4>
                                <br/>
                                <a href="{{ route('perfil.show', $article->user_id ) }}"><img class="author_img rounded-circle" style="object-fit: cover;"  width="150" height="150" src="{{Cloudder::show('/Users_multi/'.$article->users->imagen_avatar)}}" alt=""></a>
                                <h4><i class="fa fa-user" aria-hidden="true"></i> {{ $article->users->name }} {{ $article->users->apellido }}</h4>
                            </aside>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
        
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
        
@endsection