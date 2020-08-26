<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'imagen_banner' => ['mimes:jpeg,jpg,png,gif|required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      //obtner el nombre con su extension
      $imageavatar = time().$data['imagen_avatar']->getClientOriginalName();

      //obtener el nombre de la imagen
      $filename_avatar = pathinfo($imageavatar, PATHINFO_FILENAME);

      //mandarlo a la carpeta publica
      //$data['imagen_avatar']->move(base_path() . '/public/file_users/', $imageavatar);

      //obtener la ruta de la imagen
      $imagen1=$data['imagen_avatar']->getRealPath();

      //mandar la imagen a la nube
      Cloudder::upload($imagen1,  "Users_multi/".$filename_avatar);

    
      return User::create([
          'name' => $data['name'],
          'apellido' => $data['apellido'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'phone' => $data['phone'],
          'imagen_avatar' => $filename_avatar,
          'activo' => 1,
          'rol' => $data['administrador'],

      ]);
    }
}
