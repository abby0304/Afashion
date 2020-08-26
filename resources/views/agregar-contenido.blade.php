@extends('layouts.app_add')

@section('content')
<main class="edit-profile">
            <section class="profile-form">
                <header class="profile-form__header">
                    <div class="profile-form__avatar-container">
                        <img 
                            src="{{Cloudder::show('/Users_multi/'.$user->imagen_avatar)}}"
                            class="profile-form__avatar"
							style="object-fit: cover;"
                        />
						
                    </div>
                    @if($activo=="true")
                    <h4 class="profile-form__title">Agregar Contenido</h4>
                    @else
                    <h4 class="profile-form__title">Modificar Contenido</h4>
                    @endif
                </header>
				
                @if($activo=="true")
                <form class="edit-profile__form" id="add_event" action="article"  method="POST" enctype="multipart/form-data">
                @else
                <form class="edit-profile__form" id="add_event" action="{{ route('article.update',$article[0]->id)}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @endif
                
                @csrf
                 <div class="edit-profile__form-row">
                     <label for="name"   class="edit-profile__label">Nombre del contenido
                     </label>
                     <input 
                         id="name"
                         type="text"
                         name="name_article"
                         class="edit-profile__input"
                         @if($activo=="false")
                         value="{{ $article[0]->name_article }}"
                         @endif
                     />
                 </div>
                 <div class="edit-profile__form-row">
                     <label for="bio" class="edit-profile__label">Descripcion
                     </label>
                     <textarea id="bio" name="description" class="edit-profile__textarea">@if($activo=="false") {{ $article[0]->description }} @endif</textarea>
                 </div> 

                 <div class="edit-profile__form-row">
                     <label for="bio" class="edit-profile__label">Activar borrador
                     </label>
                     @if($activo=="false")
                     <input type="checkbox" class="daysCheckbox4"  id="remember" onclick="info()" @if($article[0]->borrador == 1) checked @endif>activar</br>
                     <input type="hidden" id="id_fiscal" name="borrador" @if($article[0]->borrador == 1)value="1" @else value="0" @endif>
                     @else
                     </br>
                     <input type="checkbox" class="daysCheckbox4"  id="remember" onclick="info()">
                     <input type="hidden" id="id_fiscal" name="borrador" value="0">
                     @endif
                    
                 </div> 
                 
                 @if($activo=="true")
                 <div class="edit-profile__form-row">
                    <table id="dynamic_table_field">
                         <tr>
                             <td><button name="add_more_img" id="add_more_img" class="btn btn-success">Agregar imagen</button></td>
                             <td> <input id="number_i" name="number_i" type="hidden" class="edit-profile__input"/></td>
                         </tr>
                     </table>
                 </div>
 
                 <div class="edit-profile__form-row">
                     <table id="dynamic_table_video">
                             <tr>
                                 <td><button name="add_more_video" id="add_more_video"  class="btn btn-success">Agregar video</button></td>
                                 <td> <input id="number_v" name="number_v" type="hidden" class="edit-profile__input"/></td>
                             </tr>
                         </table>
                 </div>
                 @else
                 <div class="edit-profile__form-row">
                    <table id="dynamic_table_field">
                    @foreach (array(1, 2, 3, 4, 5) as $valor)
                        @php ( $img= 'img'.$valor)
                             @if($article[0]->$img != 'null')
                         <tr id=row1><td><input type="file" onchange="myfn(this)" name="img{{$valor}}" id="event_images{{$valor}}" data-panelid="event_images{{$valor}}" class="form-control images_list" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                         </td><td id="img_preview_td"><img  height="200" id="img_preview{{$valor}}" src="{{Cloudder::show('/Publi_multi/'.$article[0]->$img, array("width"=>450, "height"=>350, "crop"=>"fill"))}}" /></td></tr>
                         @endif
                     @endforeach
                     </table>
                 </div>

                 <div class="edit-profile__form-row">
                    <table id="dynamic_table_field">
                     @foreach (array(1, 2, 3) as $valor)
                        @php ( $video= 'video'.$valor)
                            @if($article[0]->$video != 'null')
                            <label for="bio" class="edit-profile__label">Video {{$valor}} </label>
                                  <tr id=row{{$valor}}><input type="file" name="video{{$valor}}" class="file_multi_video"  accept="video/*" /><tr>
                        @endif
                    @endforeach
                     </table>
                 </div>
                 @endif
               
                 <!--<div class="edit-profile__form-row">
                  <video width="450"  controls> <source src="" id="video_here"></video>
                 </div>-->
                 
                   <div class="edit-profile__form-row">
                     <label class="edit-profile__label"></label>
                     <input type="submit" value="Aceptar">
                 </div>

             
               </form>
            </section>
        </main>
@endsection