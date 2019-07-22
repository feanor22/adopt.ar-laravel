<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'fecha-nac'=>['required','date'],
            'pregunta'=>['required'],
            'genero'=>['required'],
            'respuesta'=>['required','string','max:255'],
            'profileimg'=>['required','image'],
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
        $pic=$data['profileimg'];
        $ruta=$pic->store("public");
        $nombreImg = basename($ruta);



        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'fecha-nac'=>$data['fecha-nac'],
            'pregunta'=>$data['pregunta'],
            'respuesta'=>$data['respuesta'],
            'genero' =>$data['genero'],
            'password' => bcrypt($data['password']),
            'profileimg' => $nombreImg,
        ]);
    }
}
