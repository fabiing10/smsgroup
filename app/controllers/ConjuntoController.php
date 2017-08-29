<?php

class ConjuntoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $fileSave;
	private $isAttachment;
	private $id_mu;
	private $conjunto_id;
	private $zona_value;
	private $zona_id;
	private $zonas_count;

	public function index()
	{
        $conjunto = new Conjunto();
        $administradores = $conjunto->listarAdministradoresPorConjunto();

        return View::make('backend.admin.conjuntos.index')
            ->with('conjunto', new Conjunto())
            ->with('administradores', $administradores);
	}


    public function detallesConjunto($conjuntoId){

      /*  $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;


        $usuario = Usuario::find($admin->usuario_id);
        $conjunto = Conjunto::find($adminConjunto->conjunto_id);*/


        $id = Crypt::decrypt($conjuntoId);
        $conjunto = Conjunto::find($id);


        $residentes = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
            ->select('usuario.id','usuario.identificacion','usuario.nombres','usuario.apellidos','usuario.email','zona.tipo','zona.value','apartamento.apartamento')
            ->where('conjunto.id', '=',$id)
            ->get();
        //Usuario Admin
        $u_join = DB::table('usuarios as usuario')
            ->join('administradores as admin', 'usuario.id', '=', 'admin.usuario_id')
            ->join('administrador_conjunto as admin_conjunto', 'admin.id', '=', 'admin_conjunto.administrador_id')
            ->select('usuario.id')
            ->where('admin_conjunto.conjunto_id', '=',$id)
            ->get();

        foreach($u_join as $select){
            $uid = $select->id;
        }

        $usuario = Usuario::find($uid);

        return View::make('backend.admin.conjuntos.detalles')
            ->with('usuario', $usuario)
            ->with('residentes', $residentes)
            ->with('conjunto', $conjunto);

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
            'nombre'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/conjuntos')
                ->withErrors($validator);
        } else {
            // store
            $conjunto = new Conjunto();
            $conjunto->nit       = Input::get('nit');
            $conjunto->tipo      = Input::get('tipo');
            $conjunto->nombre = Input::get('nombre');
            $conjunto->pais = Input::get('pais');
            $conjunto->ciudad = Input::get('ciudad');
            $conjunto->localidad = Input::get('localidad');
            $conjunto->barrio = Input::get('barrio');
            $conjunto->direccion = Input::get('direccion');
            $conjunto->telefono = Input::get('telefono');
            $conjunto->estrato = Input::get('estrato');
            $conjunto->telefono_cuadrante = Input::get('telefono_cuadrante');
            $conjunto->map_latitud = '';
            $conjunto->map_longitud = '';
            $conjunto->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/conjuntos');
        }


	}

	public function cargarData(){

		$this->conjunto_id = Crypt::decrypt(Input::get('conjunto_id'));

		if(Input::hasFile('data_conjunto')){
				$fecha = 'document';
				$directory = public_path().'/uploads/data/';
				$file = Input::file('data_conjunto');
				$filename = $fecha.'-'.sha1(time());
				$extension = $file->getClientOriginalExtension();
				$size = $file->getClientSize();
				$mimeType = $file->getClientMimeType();
				$data = $filename.'.'.$extension;
				$uploadSuccess = Input::file('data_conjunto')->move($directory,$data);

				if( $uploadSuccess ) {
						$this->fileSave = true;
				} else {
						$this->fileSave = false;
				}

				$zonas_get = DB::table('zonas as zona')
						->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
						->select('zona.*')
						->where('conjunto.id', '=', $this->conjunto_id)
						->where('zona.tipo', '=', 'Bodega')
						->get();

				$this->zonas_count = DB::table('zonas as zona')
								->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
								->select('zona.*')
								->where('conjunto.id', '=', $this->conjunto_id)
								->where('zona.tipo', '=', 'Bodega')
								->count();

					foreach($zonas_get as $z){
						$this->zona_value = $z->value;
						$this->zona_id = $z->id;
					}

					//$this->valuee = array();
				Excel::load($uploadSuccess, function($reader) {
						$this->i = 0;
						$reader->each(function($sheet) {
							//Elimina el apartamentos
							//array_push($this->valuee, $sheet->zona_valor);

								/*if($this->zonas_count > 0){
									if($this->zona_value == $sheet->zona_valor){
										$zona_id_data = $this->zona_id;
									}else{
										//Save Zona
										$zona = new Zona();
										$zona->conjunto_id = $this->conjunto_id;
										$zona->tipo = $sheet->zona_tipo;
										$zona->value = $sheet->zona_valor;
										$zona->save();
										$zona_id_data = $zona->id;
									}

								}else{
									$zona = new Zona();
									$zona->conjunto_id = $this->conjunto_id;
									$zona->tipo = $sheet->zona_tipo;
									$zona->value = $sheet->zona_valor;
									$zona->save();

									$zona_id_data = $zona->id;
								}*/

								$zona = new Zona();
								$zona->conjunto_id = $this->conjunto_id;
								$zona->tipo = $sheet->zona_tipo;
								$zona->value = $sheet->zona_valor;
								$zona->save();
								$zona_id_data = $zona->id;


									// Add Bodega
								$apartamento = new Apartamento();
								$apartamento->apartamento = $sheet->bodega;
								$apartamento->zona_id = $zona_id_data;
								$apartamento->save();

								//Add user
								$usuario = new Usuario();
		            $usuario->identificacion = $sheet->identificacion;
		            $usuario->nombres = $sheet->nombres;
		            $usuario->apellidos = $sheet->apellidos;
		            $usuario->email = $sheet->email;
		            $usuario->celular = $sheet->celular;
		            $usuario->genero = $sheet->genero;
		            $usuario->rol = $sheet->rol;
								$usuario->active = $sheet->active;
		            $usuario->username = $sheet->identificacion;
		            $usuario->password = Hash::make($sheet->identificacion);
		            $usuario->save();


		            $ua = new UsuarioApartamento();
		            $ua->usuario_id = $usuario->id;
		            $ua->apartamento_id = $apartamento->id;
								$ua->propietario = $sheet->propietario;
		            $ua->save();


					 });

				});

		}else{



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
        $value = Crypt::decrypt($id);
        // get the Conjunto
        $conjunto = Conjunto::find($value);

        // show the edit form and pass the nerd
        return Response::json($conjunto);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $id = Crypt::decrypt(Input::get('actualizar-c'));
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'u_nombre'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/conjuntos')
                ->withErrors($validator);
        } else {
            // store
            $conjunto = Conjunto::find($id);
            $conjunto->nit       = Input::get('u_nit');
            $conjunto->tipo      = Input::get('u_tipo');
            $conjunto->nombre = Input::get('u_nombre');
            $conjunto->pais = Input::get('u_pais');
            $conjunto->ciudad = Input::get('u_ciudad');
            $conjunto->localidad = Input::get('u_localidad');
            $conjunto->barrio = Input::get('u_barrio');
            $conjunto->direccion = Input::get('u_direccion');
            $conjunto->telefono = Input::get('u_telefono');
            $conjunto->estrato = Input::get('u_estrato');
            $conjunto->telefono_cuadrante = Input::get('u_telefono_cuadrante');
            $conjunto->map_latitud = Input::get('u_latitud');
            $conjunto->map_longitud = Input::get('u_longitud');
            $conjunto->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('admin/conjuntos');
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

        $id = Crypt::decrypt(Input::get('value-c'));
        // delete
        $conjunto = Conjunto::find($id);
        $conjunto->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('admin/conjuntos');
	}


    public function adminIndex(){

        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;


        $usuario = Usuario::find($admin->usuario_id);
        $conjunto = Conjunto::find($adminConjunto->conjunto_id);



        return View::make('backend.administradores.conjuntos.index')
            ->with('usuario', $usuario)
            ->with('conjunto', $conjunto);
    }



}
