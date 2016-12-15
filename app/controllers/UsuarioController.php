<?php

class UsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;

        $zonas  = Conjunto::find($conjunto)->zonas;

        $usuario = new Usuario();
        $data = $usuario->obtenerUsuariosConjunto($conjunto);


        return View::make('backend.administradores.usuarios.index')
            ->with('zonas', $zonas)
            ->with('data', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'username' => 'required','password'  => 'required','zona_select'  => 'required','apartamento_select'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin-conjuntos/conjunto/usuarios')
                ->withErrors($validator);
        } else {


            // Crear Usuario
            $usuario = new Usuario();
            $usuario->identificacion = Input::get('identificacion');
            $usuario->nombres = Input::get('nombres');
            $usuario->apellidos = Input::get('apellidos');
            $usuario->fecha_nacimiento = Input::get('fecha_nacimiento');
            $usuario->email = Input::get('email');
            $usuario->telefono = Input::get('telefono');
            $usuario->celular = Input::get('celular');
            $usuario->genero = Input::get('genero');
            $usuario->rol = "Usuario";
						$usuario->active = 1;
            $usuario->username = Input::get('username');
            $usuario->password = Hash::make(Input::get('password'));
            $usuario->save();


            $apartamento = Input::get('apartamento_select');
            $ua = new UsuarioApartamento();
            $ua->usuario_id = $usuario->id;
            $ua->apartamento_id = $apartamento;
            if(Input::get('propietario') == "true"){
                $ua->propietario = '1';
            }else{
                $ua->propietario = '0';
            }

            $ua->save();

            // redirect
            Session::flash('message', 'Se ha creado correctamente el usuario');
            return Redirect::to('admin-conjuntos/conjunto/usuarios');
        }

    }

    public function activar(){
            $user = Auth::user();
            $rol = $user->rol;
            $active = $user->active;

            if($active == "1"){
                return Redirect::to('usuario')->with('error', 'Usuario o contraseña incorrectos.');
            }else{

                return View::make('backend.usuarios.default')
                    ->with('usuario', $user);
            }
    }

    public function listarId($userId){
        $id = Crypt::decrypt($userId);
        $usuario = Usuario::find($id);
        return $usuario;

    }

    public function actualizar(){

        $user = Auth::user();

        $rules = array(
            'user_active' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            //Redirect
            if($user->rol = "Administrador"){
                return Redirect::to('admin-conjuntos/conjunto/usuarios')->withErrors($validator);
            }else{
                return Redirect::to('usuario/activar')->withErrors($validator);
            }

        } else {

            // Get User ID
            $id = Crypt::decrypt(Input::get('user_active'));

            // Actualizar Usuario
						$usuario = Usuario::find($id);
						$usuario->identificacion = Input::get('u_identificacion');
						$usuario->nombres = Input::get('u_nombres');
						$usuario->apellidos = Input::get('u_apellidos');
						$usuario->fecha_nacimiento = Input::get('u_fecha_nacimiento');
						$usuario->email = Input::get('u_email');
						$usuario->telefono = Input::get('u_telefono');
						$usuario->celular = Input::get('u_celular');
						$usuario->active = 1;
						//$usuario->genero = Input::get('genero');
						$usuario->active = 1;
						$usuario->username = Input::get('u_username');
						$usuario->password = Hash::make(Input::get('u_password'));
						$usuario->save();

            $page = Input::get('page');
            if($page == "default"){

                Session::flash('message', 'Se ha actualizado correctamente el usuario');
                return Redirect::to('/usuario');
            }else{

                if($user->rol = "Administrador"){
                    Session::flash('message', 'Se ha actualizado correctamente el usuario');
                    return Redirect::to('/admin-conjuntos/conjunto/usuarios');
                }else{
                    Session::flash('message', 'No se ha actualizado correctamente');
                    return Redirect::to('/usuario');
                }

            }




        }
    }




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}





	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
