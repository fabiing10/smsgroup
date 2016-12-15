<?php

class DocumentosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
      /*$conjunto_id = Input::get('conjunto_id');
      $conjuntos = new Documento::where('conjunto_id', $conjunto_id)
      return $conjuntos;*/
      $user = Auth::user();
      $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
      $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
      $conjunto = $adminConjunto->conjunto_id;

      $documentos = Documento::where('conjunto_id', $conjunto)->get();
      return $documentos;
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
    $fileSave = false;

    $input = Input::all();
    $rules = array(
        'file_' => 'mimes:jpeg,jpg,png,pdf,doc,docx,xls|max:8000',
    );

    $validation = Validator::make($input, $rules);

    if ($validation->fails())
    {
        return Redirect::to('admin-conjuntos/conjunto/documentos');
    }else{

      if(Input::hasFile('file_')){

          $mensaje->adjunto = true;
          $this->isAttachment = true;
          $directory = public_path().'/uploads';
          $file = Input::file('file_');

          if(is_array($file))
          {
              foreach($file as $part){
                  $filename = $part->getClientOriginalName();
                  $part->move($directory, $filename);
              }

          }else{

              $filename = $fecha.'-'.sha1(time());
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

          $mensaje->adjunto = false;
          $this->isAttachment = false;

      }

      if($this->isAttachment){
          //Save File in Database
          $documento = new Documento();
          $documento->nombre = Input::get('nombre');
          $documento->categoria = Input::get('categoria');
          $documento->descripcion = Input::get('descripcion');
          $documento->url = $data;
          $documento->tipo = $mimeType;
          $documento->conjunto_id = Input::get('conjunto_id');
          $documento->fecha = $fecha;
          $documento->save();

      }

      return Redirect::to('admin-conjuntos/conjunto/documentos');
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
	public function edit($id){

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(){

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(){

	}


    public function adminIndex(){

    }



}
