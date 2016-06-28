<?php

class AccessController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    private $user;

    public function login()
    {
        $this->user = array('username' => Input::get('username'),'password'=> Input::get('password'));

        if(Auth::attempt($this->user)){

            if(Auth::check()){
                $user = Auth::user();
                $rol = $user->rol;
                $active = $user->active;
                if($rol == "super-admin"){
                    return Redirect::to('admin/');
                }else if($rol == "Administrador"){
                    return Redirect::to('admin-conjuntos/');
                }else if($rol == "Usuario"){
                    if($active == "0"){
                        return Redirect::to('usuario/activar');
                    }else{
                        return Redirect::to('usuario/');
                    }

                }else{
                    return Redirect::to('logout')->with('error', 'Usuario o contraseña incorrectos.');
                }
            }else{
                return Redirect::to('/login');
            }

        }else{
            return Redirect::to('login')->with('error', 'Usuario o contraseña incorrectos.');
        }




    }


    public function logout(){

        if(Auth::check()){
            Auth::logout();
        }
        return Redirect::to('/login');

    }



}



