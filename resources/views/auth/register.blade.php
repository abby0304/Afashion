@extends('layouts.app')

@section('content')
<div id="id01" class="modal" style="display: block;  padding-top: 5%;">

    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
        @csrf

        <h3>Seleccione una imagen</h3>
        <br>
        <!---Imagen perfil-->

        <label for="file">
                <img 
                    src="img/avatar.png"
                    id="blah2"
                    width="125" 
                    height="125"
                    style="object-fit: cover;"
                />
                <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
               
        </label> 

        <input type="file" id="file" name="imagen_avatar" onchange="readURL(this, '#blah2');" accept="image/gif, image/png, image/jpeg, image/pjpeg" required autofocus/>

         @if ($errors->has('imagen_avatar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('imagen_avatar') }}</strong>
                </span>
        @endif
           
         <br>
           <!---Nombre-->
            <input id="name" type="text" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <input id="name" type="text" placeholder="Apellido" name="apellido" value="{{ old('apellido') }}" required autofocus>

            @if ($errors->has('apellido'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
            @endif

            <input id="email" type="email" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    
            <input id="password" type="password" placeholder="Password" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        
            <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>

            <input id="phone" type="text" placeholder="Telefono" name="phone" value="{{ old('phone') }}" required autofocus>

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif

            <h4>Administrador</h4>
            <input type="checkbox" class="daysCheckbox4" id="admin" style="zoom:2;" onclick="info()">
            <input type="hidden" id="id_fiscal" name="administrador" value="0">
        
            <button type="submit">
                {{ __('Registrar') }}
            </button> 
    </form>
    <br/>

</div>
@endsection
