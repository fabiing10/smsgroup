<?php

class AdminController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
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
    public function update($id)
    {
        //
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
