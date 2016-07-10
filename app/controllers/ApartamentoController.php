<?php

class ApartamentoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //Busca el Administrador

        $user = Auth::user();
        $apartamento = new Apartamento();



        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;

        $apartamentos = $apartamento->listarApartamentosConjuntoId($conjunto);
        $z = new Zona();
        $zonas = $z->listarZonasdeConjunto($conjunto);


        return View::make('backend.administradores.apartamentos.index')
            ->with('usuarios', new Usuario())
            ->with('zonas', $zonas)
            ->with('apartamentos', $apartamentos);

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
            'apartamento'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin-conjuntos/conjunto/apartamentos')
                ->withErrors($validator);
        } else {
            // store
            $apartamento = new Apartamento();
            $apartamento->apartamento       = Input::get('apartamento');
            $apartamento->descripcion      = Input::get('descripcion');
            $apartamento->zona_id = Crypt::decrypt(Input::get('zona_select'));
            $apartamento->save();
            // redirect
            Session::flash('message', 'Se ha creado el apartamento correctamente');
            return Redirect::to('admin-conjuntos/conjunto/apartamentos');
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

		$apartamento = Crypt::decrypt($id);
		//Eliminar Usuarios del Apartamento
		$usuarios = DB::table('usuarios as usuario')
				->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
				->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
				->select('usuario.id')
				->where('apartamento.id', '=', $apartamento)
				->get();

		foreach($usuarios as $usuario){
				Usuario::destroy($usuario->id);
		}
		//Elimina el apartamentos
		Apartamento::destroy($apartamento);

		return Redirect::to('admin-conjuntos/conjunto/apartamentos');

	}


    public function listarApartamentosPorZonaId($id){

        $zona = Crypt::decrypt($id);
        $apartamentos = Apartamento::where('zona_id','=',$zona)->get();
        return $apartamentos;
    }


    //Lista todos los apartamentos que tengan un usuario asignado
    public function listarApartamentosConjunto(){

        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;

        $apartamentos = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
            ->select('apartamento.id','apartamento.apartamento','apartamento.zona_id','zona.tipo','zona.value')
            ->where('conjunto.id', '=', $conjunto)
            ->get();

        return $apartamentos;

    }


}
