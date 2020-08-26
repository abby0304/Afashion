@extends('layouts.app')

@section('content')
<div id="id01" class="modal" style="display: block;  padding-top: 10%;">
        <form method="POST"  action="{{ route('login') }}">
            @csrf
            <h2>Afashion</h2> 
			
			<!--INPUT-->
			<h3>Iniciar sesión</h3>
            <br>
                    <input id="email" type="email" placeholder="&#128272; Email" name="email" maxlength="40" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))             
                        <strong>{{__('Intente de nuevo') }}</strong>
                    @endif
                    <br/>
           
                    <input type="password" id="password" name="password" placeholder="&#128273; Contraseña" maxlength="8" value="" required>
                    @if ($errors->has('password')) 
                            <strong>{{__('Contraseña incorrecta') }}</strong>
                    @endif
                    <br/>
          
             <h4>Recordar Contraseña</h4>
			
		    <input type="checkbox" class="compra" style="height: 17px;" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
            <br/>

           

                    <input type="submit" class="compra" value="Ingresar"/>
                     
                    <br/>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="/register">
                            {{ __('Crea una cuenta') }}
                        </a>
                    @endif
          
        </form>
</div>
@endsection

