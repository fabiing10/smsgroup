<?php

class AnunciosController extends \BaseController {

    private $isAttachment;
    private $fileSave;
	private $conjunto;
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function ConjuntoId(){
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;
        return $conjunto;
    }


	public function index()
	{
        $usuario = Auth::user();
        $anuncios = $this->listarAnunciosConjunto();

        return View::make('backend.usuarios.anuncios.index')
            ->with('anuncios', $anuncios);

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
        //Get date Bogota/Colombia
        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d");
        $input = Input::all();
        $rules = array(
            'file_' => 'mimes:jpeg,jpg,png,pdf|max:8000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            //return Response::make($validation->errors->first(), 400);
            return "Incorrecto";
        }else{

            $anuncio = new Noticia();
            $anuncio->nombre = Input::get('nombre');
            $descripcion = Input::get('descripcion');
            $anuncio->mini_descripcion = mb_strimwidth($descripcion, 0, 150, "...");
            $anuncio->descripcion = $descripcion;
            $anuncio->fecha = $fecha;

            if(Input::hasFile('file_')){

                $this->isAttachment = true;
                $directory = public_path().'/uploads/anuncios';
                $file = Input::file('file_');

                if(is_array($file))
                {
                    foreach($file as $part){
                        $filename = $part->getClientOriginalName();
                        $part->move($directory, $filename);
                    }

                }else{

                    $filename = rand(0,100).sha1(time());
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $mimeType = $file->getClientMimeType();
                    $data = $filename.'.'.$extension;
                    $uploadSuccess = Input::file('file_')->move($directory,$data);

                    if( $uploadSuccess ) {
                        $this->fileSave = true;
                    } else {
                        $this->fileSave = false;
                    }
                }

            }else{
                $this->isAttachment = false;
            }

            if($this->isAttachment == true & $this->fileSave == true){
                $anuncio->img_banner = $data;
            }else{
                $anuncio->img_banner = "";
            }
            //Save Message in Database
            $anuncio->fecha = $fecha;

            $anuncio->conjunto_id = $this->ConjuntoId();
            $anuncio->save();

            return Redirect::to('admin-conjuntos/conjunto/anuncios');


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


    public function listarAnunciosConjunto(){
        $usuario = Auth::user();

        $conjuntos = DB::table('usuario_apartamento as u_apartamento')
            ->join('apartamentos as apto', 'u_apartamento.apartamento_id', '=', 'apto.id')
            ->join('zonas as zona', 'apto.zona_id', '=', 'zona.id')
            ->select('zona.conjunto_id as id')
            ->where('u_apartamento.usuario_id', '=', $usuario->id)
            ->get();


        foreach($conjuntos as $conjunto){
            $id = $conjunto->id;
        }

        $anuncios = Noticia::where('conjunto_id','=',$id)
            ->orderBy('id', 'DESC')
            ->get();
       return $anuncios;

    }

    public function listarAnuncioId($id){
        $noticia = Noticia::where('id','=',Crypt::decrypt($id))->get();
        return $noticia;
    }

    //Administrator Methods

    public function adminIndex(){

        $anuncios = Conjunto::find($this->ConjuntoId())->noticias;

        return View::make('backend.administradores.anuncios.index')
            ->with('anuncios', $anuncios);
    }


}
