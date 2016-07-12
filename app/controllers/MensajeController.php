<?php

class MensajeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    private $fileSave;
    private $isAttachment;
		private $id_mu;


    public function adminIndex(){
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;

        $zonas  = Conjunto::find($conjunto)->zonas;
        $mensajes = new Mensaje();

        return View::make('backend.administradores.mensajes.index')
            ->with('zonas', $zonas)
            ->with('mensajes', $mensajes->listarMensajesConjunto($conjunto));
    }

		public function entrantesIndex(){
			return View::make('backend.administradores.mensajes.entrada');
		}

    public function adminListarMensajeId($mensajeId){
        $id = Crypt::decrypt($mensajeId);
        $mensaje = Mensaje::find($id);
        return $mensaje;
    }

    public function adminListarReporteMensajeId($mensajeId){
        $id = Crypt::decrypt($mensajeId);

        $query = DB::table('mensaje_usuario as mensaje')
            ->join('usuarios as usuario', 'mensaje.to_id', '=', 'usuario.id')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->select('mensaje.id','usuario.nombres','usuario.apellidos','mensaje.leido','apartamento.apartamento','zona.tipo','zona.value','mensaje.fecha_leido')
            ->where('mensaje.mensaje_id', '=', $id)
            ->get();

        return $query;
    }


    public function index()
    {
        return View::make('backend.usuarios.mensajes.index');
    }

    public function listarMensajesUsuario(){
        $user = Auth::user();
        $query = DB::table('mensajes as mensaje')
            ->join('mensaje_usuario as m_u', 'mensaje.id', '=', 'm_u.mensaje_id')
            ->select('mensaje.id','mensaje.tipo','mensaje.asunto','mensaje.mensaje','mensaje.fecha','mensaje.importancia')
            ->where('m_u.to_id', '=', $user->id)
						->orWhere('m_u.from_id', '=', $user->id)
            ->get();
        $emails = array("emails"=>$query);
        return $emails;
    }

    public function listarMensajeId($id){

        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d");

        $user = Auth::user();
        $query = DB::table('mensaje_usuario as mensaje')
				->select('mensaje.id')
				->where('mensaje.to_id', '=', $user->id)
				->orWhere('mensaje.from_id', '=', $user->id)
				->where('mensaje.mensaje_id', '=', $id)->get();
        foreach($query as $q){
            $this->id_mu = $q->id;
        }
        $update = MensajeUsuario::find($this->id_mu);
        $update->leido = 1;
        $update->fecha_leido = $fecha;
        $update->save();

        $mensaje = Mensaje::find($id);
        return $mensaje;


    }

    public function listarAdjuntoMensajeId($id){

        $query = DB::table('adjunto_mensaje as a_m')
            ->join('adjuntos as adjunto', 'a_m.adjunto_id', '=', 'adjunto.id')
            ->select('adjunto.id','adjunto.nombre')
            ->where('a_m.mensaje_id', '=',$id)
            ->get();

        return $query;
    }

    public function reponderMensajeId(){


        $input = Input::all();
        $rules = array('mensaje-id'=>'required','respuesta_mensaje'=>'required');

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            //return Response::make($validation->errors->first(), 400);
            return $validation->errors->first();
        }else{

            date_default_timezone_set("America/Bogota");
            $fecha = date("Y-m-d");
            $mensaje = Input::get('mensaje-id');
            $respuesta = new Respuesta();
            $respuesta->mensaje_id = $mensaje;
            $respuesta->usuario_id = Auth::user()->id;
            $respuesta->mensaje = Input::get('respuesta_mensaje');
            $respuesta->fecha = $fecha;
            $respuesta->leido = 0;
            $respuesta->save();

            $response = Respuesta::where('mensaje_id', '=' ,$mensaje)->get();
            return $response;

        }



    }

		public function respuestaMensajeId($mensajeId){
			$response = Respuesta::where('mensaje_id', '=' ,$mensajeId)->get();
			return $response;
		}

    public function listarRespuestasMensajeId($mensaje){

        $user = Auth::user();
        if($user->rol == "Usuario" ){
            $response = Respuesta::where('mensaje_id', '=' ,$mensaje)->get();


        }else if($user->rol == "Administrador" ){
            $response = Respuesta::where('mensaje_id', '=' ,$mensaje)->get();
        }else{
            $data = explode("-",$mensaje);
            $mensaje = $data[0];
            $usuario = $data[1];


            $response = Respuesta::where('mensaje_id', '=' ,$mensaje)->where('usuario_id', '=' ,$usuario)->get();
        }

        return $response;

    }

    public function listarUsuariosRespuesta($mensajeId){

        $query = DB::table('respuestas as respuesta')
            ->join('usuarios as usuario', 'respuesta.usuario_id', '=', 'usuario.id')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->select('usuario.id as u_id','respuesta.mensaje_id as id','usuario.nombres','usuario.apellidos','zona.tipo','zona.value','apartamento.apartamento')
            ->where('respuesta.mensaje_id', '=',Crypt::decrypt($mensajeId))
            ->groupBy('usuario.id')
            ->get();

        return $query;
    }

    public function pdfReporte($id){


        $data = DB::table('mensajes as mensaje')
            ->join('mensaje_usuario as m_u', 'mensaje.id', '=', 'm_u.mensaje_id')
            ->join('usuarios as usuario', 'm_u.to_id', '=', 'usuario.id')
            ->select('mensaje.id','m_u.fecha_leido','usuario.nombres','usuario.apellidos','mensaje.asunto','mensaje.mensaje','mensaje.fecha')
            ->where('m_u.id', '=', $id)
            ->get();


                foreach($data as $result){
                    $asunto = $result->asunto;
                    $mensaje = $result->mensaje;
                    $fecha  = $result->fecha;
                    $fecha_leido = $result->fecha_leido;
                    $nombres = $result->nombres;
                    $apellidos = $result->apellidos;
                }
        /*
                       $html = '<html><body>';
                       $html.= '<center><h3>Reporte Mensaje</h3></center>';
                       $html.= '<p>Destinatario: </p>'.$nombres.' '.$apellidos;
                       $html.= '<p>Fecha Envio: </p>'.$fecha;
                       $html.= '<p>Fecha Leido: </p>'.$fecha_leido;
                       $html.= '<div>'.$mensaje.'</div>';
                       $html.= '</body></html>';
                       return PDF::load($html, 'A4', 'portrait')->show();*/

        $parameterr = array();
        $parameter['nombres'] = $nombres;
        $parameter['apellidos'] = $apellidos;
        $parameter['asunto'] = $asunto;
        $parameter['mensaje'] = $mensaje;
        $parameter['fecha'] = $fecha;
        $parameter['fecha_leido'] = $fecha_leido;
        $pdf = PDF::loadView('backend.administradores.mensajes.pdf', $parameter);

        return $pdf->download('reporte.pdf');
/*
        return $pdf->stream('invoice.pdf');
*/
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
        $fileSave = false;

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


            $mensaje = new Mensaje();
            $mensaje->asunto = Input::get('asunto');
            $mensaje->mensaje = Input::get('mensaje');
            $mensaje->importancia = Input::get('importancia');

            $send_to = Input::get('send_to');
            $mensaje->tipo = $send_to;


            if(Input::hasFile('file_')){

                $mensaje->adjunto = true;
                $this->isAttachment = true;
                $directory = public_path().'/uploads';
                $file = Input::file('file_');
                // multiple files submitted

                if(is_array($file))
                {
                    foreach($file as $part){
                        $filename = $part->getClientOriginalName();
                        $part->move($directory, $filename);
                    }
                }else //single file
                {
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
            //Save Message in Database
            $mensaje->fecha = $fecha;
            $respuesta = Input::get('respuesta');
            if($respuesta == "on"){
                $mensaje->respuesta = true;
            }else{
                $mensaje->respuesta = false;
            }
            $mensaje->save();

            if($this->isAttachment){
                //Save File in Database
                $adjunto = new Adjunto();
                $adjunto->nombre = $filename;
                $adjunto->ruta = $directory.'/'.$data;
                $adjunto->tipo = $mimeType;
                $adjunto->peso = $size;
                $adjunto->fecha = $fecha;
                $adjunto->save();

                //Save Relationship Message and Attachment

                $adjuntoMensaje = new AdjuntoMensaje();
                $adjuntoMensaje->adjunto_id = $adjunto->id;
                $adjuntoMensaje->mensaje_id = $mensaje->id;
                $adjuntoMensaje->save();
            }


            if($send_to == "todos"){

                $response = $mensaje->guardarMensajeConjunto($mensaje->id);
                if($response){
                    return Redirect::to('admin-conjuntos/conjunto/mensajes');
                }else{
                    return Redirect::to('admin-conjuntos/conjunto/mensajes');
                }

            }else if($send_to == "zona"){

                $zona = Input::get('zona_select');
                $response = $mensaje->guardarMensajeZona($mensaje->id,$zona);
                if($response){
                    return Redirect::to('admin-conjuntos/conjunto/mensajes');
                }else{
                    return Redirect::to('admin-conjuntos/conjunto/mensajes');
                }

            }else if($send_to == "apartamento"){

                $apartamento = Input::get('apartamento_select');
                $response = $mensaje->guardarMensajeApartamento($mensaje->id,$apartamento);
                if($response){
                    return Redirect::to('admin-conjuntos/conjunto/mensajes');
                }else{
                    return Redirect::to('admin-conjuntos/conjunto/mensajes');
                }

            }else{
                return Redirect::to('admin-conjuntos/conjunto/mensajes');
            }


        }







	}

	public function guardarMensajeUsuario(){

		//Get date Bogota/Colombia
		date_default_timezone_set("America/Bogota");
		$fecha = date("Y-m-d");
		$fileSave = false;

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


				$mensaje = new Mensaje();
				$mensaje->asunto = Input::get('asunto');
				$mensaje->mensaje = Input::get('mensaje');
				$mensaje->importancia = Input::get('importancia');

				$mensaje->tipo = 'administrator';


				if(Input::hasFile('file_')){

						$mensaje->adjunto = true;
						$this->isAttachment = true;
						$directory = public_path().'/uploads';
						$file = Input::file('file_');
						// multiple files submitted

						if(is_array($file))
						{
								foreach($file as $part){
										$filename = $part->getClientOriginalName();
										$part->move($directory, $filename);
								}
						}else //single file
						{
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
				//Save Message in Database
				$mensaje->fecha = $fecha;
				$mensaje->respuesta = true;
				$mensaje->save();

				if($this->isAttachment){
						//Save File in Database
						$adjunto = new Adjunto();
						$adjunto->nombre = $filename;
						$adjunto->ruta = $directory.'/'.$data;
						$adjunto->tipo = $mimeType;
						$adjunto->peso = $size;
						$adjunto->fecha = $fecha;
						$adjunto->save();

						//Save Relationship Message and Attachment

						$adjuntoMensaje = new AdjuntoMensaje();
						$adjuntoMensaje->adjunto_id = $adjunto->id;
						$adjuntoMensaje->mensaje_id = $mensaje->id;
						$adjuntoMensaje->save();
				}

					$mensaje->guardarMensajeAdministrador($mensaje->id);

					return Redirect::to('usuario/mensajes');



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


}
