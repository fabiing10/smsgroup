<?php

class ZonaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        //Busca el Administrador

        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;

        $zonas  = Conjunto::find($conjunto)->zonas;


        return View::make('backend.administradores.zonas.index')
            ->with('usuarios', new Usuario())
            ->with('zonas', $zonas);



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
            'tipo_zona'       => 'required',
            'value'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin-conjuntos/conjunto/zonas')
                ->withErrors($validator);
        } else {

            $user = Auth::user();
            $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
            $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
            $conjunto = $adminConjunto->conjunto_id;

            // Crear Zona
            $zona = new Zona();
            $zona->conjunto_id = $conjunto;
            $zona->tipo = Input::get('tipo_zona');
            $zona->value = Input::get('value');
            $zona->save();


            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin-conjuntos/conjunto/zonas');
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
	public function destroy($id)
	{
		//
	}



    /**
     * Listar Zonas de un conjunto residencial
     *
     * @param  int  $id
     * @return Response Json
     */

    public function listarZonasConjunto(){

        //
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;
        $zonas  = Conjunto::find($conjunto)->zonas;

        return $zonas;

    }


}
