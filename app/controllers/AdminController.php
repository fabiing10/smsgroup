<?php

class AdminController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function dashboardSuperAdmin(){

      $admin = DB::table('conjuntos as conjunto')
          ->join('administrador_conjunto as admin_conjunto', 'conjunto.id', '=', 'admin_conjunto.conjunto_id')
          ->join('administradores as admin', 'admin.id', '=', 'admin_conjunto.administrador_id')
          ->join('usuarios as usuario', 'usuario.id', '=', 'admin.usuario_id')
          ->select('conjunto.id as conjunto_id','usuario.nombres','usuario.apellidos','usuario.email')
          ->count();

      $conjuntos = DB::table('conjuntos as conjunto')
              ->select('conjunto.id','conjunto.nit','conjunto.tipo','conjunto.nombre','conjunto.pais','conjunto.ciudad','conjunto.localidad','conjunto.barrio',
                  'conjunto.direccion','conjunto.telefono','conjunto.estrato')
              ->count();


      return View::make('backend.admin.dashboard')->with('conjuntos', $conjuntos)->with('admin', $admin);
    }

    public function index()
    {
        //Listado general de usuarios administradores
        $administradores = Usuario::has('administrador')->get();

        return View::make('backend.admin.admin.index')
            ->with('administradores', $administradores)
            ->with('conjunto', new Conjunto());
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
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'nombres'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/administradores')
                ->withErrors($validator);
        } else {


            // Crear Usuario
            $usuario = new Usuario();
            $usuario->identificacion       = Input::get('identificacion');
            $usuario->nombres      = Input::get('nombres');
            $usuario->apellidos = Input::get('apellidos');
            $usuario->fecha_nacimiento = Input::get('fecha_nacimiento');
            $usuario->email = Input::get('email');
            $usuario->telefono = Input::get('telefono');
            $usuario->celular = Input::get('celular');
            $usuario->rol = "Administrador";
            $usuario->username = Input::get('username');
            $usuario->password = Hash::make(Input::get('password'));
            $usuario->save();


            //Crear administrador
            $administrador = New Administrador();
            $administrador->usuario_id = $usuario->id;
            $administrador->rol = "Administrador";
            $administrador->save();

            //Obtener Conjunto Seleccionado
            $conjunto = Crypt::decrypt(Input::get('conjunto_select'));

            //Crear Registro de relacion
            $adminConjunto = new AdministradorConjunto();
            $adminConjunto->administrador_id = $administrador->id;
            $adminConjunto->conjunto_id = $conjunto;
            $adminConjunto->save();


            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/administradores');
        }

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
    public function edit($adminId)
    {
      $id = Crypt::decrypt($adminId);
      $usuario = Usuario::find($id);
      return $usuario;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
      $rules = array(

      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('admin/administradores')
              ->withErrors($validator);
      } else {

        $id = Crypt::decrypt(Input::get('user_active'));
        $usuario = Usuario::find($id);
        $usuario->identificacion       = Input::get('u_identificacion');
        $usuario->nombres      = Input::get('u_nombres');
        $usuario->apellidos = Input::get('u_apellidos');
        $usuario->fecha_nacimiento = Input::get('u_fecha_nacimiento');
        $usuario->email = Input::get('u_email');
        $usuario->telefono = Input::get('u_telefono');
        $usuario->celular = Input::get('u_celular');
        $usuario->username = Input::get('u_username');
        if(Input::get('u_password') != ""){
          $usuario->password = Hash::make(Input::get('u_password'));
        }

        $usuario->save();
        return Redirect::to('admin/administradores');

      }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {

        //Usuario ID
        $id = Crypt::decrypt(Input::get('value-a'));

        //Busca el Administrador
        $admin = Administrador::where('usuario_id', '=', $id)->firstOrFail();

        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $adminConjunto->delete();

        $admin->delete();

        Usuario::find($id)->delete();


        return Redirect::to('admin/administradores');
    }

}
