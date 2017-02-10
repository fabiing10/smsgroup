<?php

class PublicidadController extends \BaseController {


    private $fileSave;
    private $logo;
    private $img_publicidad;


    public function index(){

        $publicidades = DB::table('publicidad')
            ->join('publicidad_conjunto as p_c', 'publicidad.id', '=', 'p_c.publicidad_id')
            ->join('conjuntos as conjunto', 'p_c.conjunto_id', '=', 'conjunto.id')
            ->join('zonas as zona', 'conjunto.id', '=', 'zona.conjunto_id')
            ->select('publicidad.id','publicidad.tienda','publicidad.logo','publicidad.local','publicidad.local','publicidad.titulo','publicidad.descripcion_corta','publicidad.descripcion'
                ,'publicidad.valor','publicidad.fecha','publicidad.img_publicidad','publicidad.link','conjunto.nombre')
            ->get();

        return View::make('backend.usuarios.publicidad.index')->with('publicidades', $publicidades);




    }

    public function PublicidadId($id){
      $publicidad = DB::table('publicidad')
          ->join('publicidad_conjunto as p_c', 'publicidad.id', '=', 'p_c.publicidad_id')
          ->join('conjuntos as conjunto', 'p_c.conjunto_id', '=', 'conjunto.id')
          ->join('zonas as zona', 'conjunto.id', '=', 'zona.conjunto_id')
          ->select('publicidad.id','publicidad.tienda','publicidad.logo','publicidad.local','publicidad.local','publicidad.titulo','publicidad.descripcion_corta','publicidad.descripcion'
              ,'publicidad.valor','publicidad.fecha','publicidad.img_publicidad','publicidad.link','conjunto.nombre')
          ->where('publicidad.id','=',$id)
          ->get();
          return $publicidad;
    }



    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function Adminindex()
	{
        $query = DB::table('publicidad')
            ->join('publicidad_conjunto as p_c', 'publicidad.id', '=', 'p_c.publicidad_id')
            ->join('conjuntos as conjunto', 'p_c.conjunto_id', '=', 'conjunto.id')
            ->select('publicidad.id','publicidad.tienda','publicidad.logo','publicidad.local','publicidad.local','publicidad.titulo','publicidad.descripcion_corta','publicidad.descripcion'
                ,'publicidad.valor','publicidad.fecha','publicidad.img_publicidad','publicidad.link','conjunto.nombre')
            ->get();


        $conjunto = Conjunto::all();

        return View::make('backend.admin.publicidad.index')
            ->with('publicidades', $query)
            ->with('conjuntos', $conjunto);

    }

    public function store(){
        //Get date Bogota/Colombia

        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d");
        $input = Input::all();
        $rules = array(
            'file_' => 'mimes:jpeg,jpg,png,pdf|max:8000',
            'logo_' => 'mimes:jpeg,jpg,png,pdf|max:8000'
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            //return Response::make($validation->errors->first(), 400);
            return Redirect::to('admin/publicidad');
        }else{

            $publicidad = new Publicidad();
            $publicidad->titulo = Input::get('nombre');
            $publicidad->tienda = Input::get('tienda');
            $publicidad->link = Input::get('link');
            $publicidad->valor = Input::get('valor');
            $publicidad->descripcion = Input::get('descripcion');
            //Explode date
            $date = explode(" - ",Input::get('desde_hasta'));
            $publicidad->fecha_desde = $date[0];
            $publicidad->fecha_hasta = $date[1];


            $directory = public_path().'/uploads/publicidad';

            if(Input::hasFile('file_') or Input::hasFile('logo_')){

                if(Input::hasFile('file_')){
                    $file = Input::file('file_');
                    $filename = rand(0,100).sha1(time());
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $mimeType = $file->getClientMimeType();
                    $this->img_publicidad = $filename.'.'.$extension;
                    $uploadSuccess = Input::file('file_')->move($directory,$this->img_publicidad);

                    if( $uploadSuccess ) {
                        $this->fileSave = true;
                        $publicidad->img_publicidad = $this->img_publicidad;
                    } else {
                        $this->fileSave = false;
                        $publicidad->img_publicidad = "";
                    }

                }

                if(Input::hasFile('logo_')){

                    $file = Input::file('logo_');
                    $filename = rand(0,100).sha1(time());
                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getClientSize();
                    $mimeType = $file->getClientMimeType();
                    $this->logo = $filename.'.'.$extension;
                    $uploadSuccess = Input::file('logo_')->move($directory,$this->logo);

                    if( $uploadSuccess ) {
                        $this->fileSave = true;
                        $publicidad->logo = $this->logo;
                    } else {
                        $this->fileSave = false;
                        $publicidad->logo = "";
                    }

                }

            }else{

            }
            $publicidad->fecha = $fecha;
            $publicidad->save();



            $publicidadConjunto = new PublicidadConjunto();
            $publicidadConjunto->publicidad_id = $publicidad->id;
            $publicidadConjunto->conjunto_id = Crypt::decrypt(Input::get('conjunto'));
            $publicidadConjunto->save();


            return Redirect::to('admin/publicidad');
        }

    }


}
