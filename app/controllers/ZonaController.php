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
		$zona = Crypt::decrypt($id);


		//Eliminar Usuarios del Apartamento
		$usuarios = DB::table('usuarios as usuario')
				->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
				->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
				->join('zonas as zona', 'zona.id', '=', 'apartamento.zona_id')
				->select('usuario.id')
				->where('apartamento.zona_id', '=', $zona)
				->get();

		foreach($usuarios as $usuario){
				Usuario::destroy($usuario->id);
		}


		//Elimina el apartamentos
		$apartamentos = DB::table('zonas as zona')
				->join('apartamentos as apartamento', 'apartamento.zona_id', '=', 'zona.id')
				->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
				->select('apartamento.id')
				->where('zona.id', '=', $zona)
				->get();

		foreach($apartamentos as $apartamento){
				Apartamento::destroy($apartamento->id);
		}

		Zona::destroy($zona);

		return Redirect::to('admin-conjuntos/conjunto/zonas');
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
