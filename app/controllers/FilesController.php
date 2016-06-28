<?php

class FilesController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function link_adjunto($mensaje){

        $adjunto_mensaje = AdjuntoMensaje::where('mensaje_id','=',$mensaje)->get();
        foreach($adjunto_mensaje as $a_m){
            $id = $a_m->adjunto_id;
        }

        if(empty($id)){
            return Redirect::back();
        }else{
            $adjunto = Adjunto::find($id);

            $file = public_path().'/uploads/'.$adjunto->nombre.'.pdf';

            if (File::isFile($file))
            {
                $file = File::get($file);
                $response = Response::make($file, 200);
                // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
                $response->header('Content-Type', 'application/pdf');
                return $response;
            }
        }



    }





}
