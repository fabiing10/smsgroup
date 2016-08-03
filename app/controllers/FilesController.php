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



            $extension = ".pdf";
            if($adjunto->tipo == "image/png"){
              $extension = ".pdf";
            }elseif($adjunto->tipo == "application/pdf"){
              $extension = ".pdf";
            }elseif($adjunto->tipo == "image/jpeg"){
              $extension = ".jpg";
            }elseif($adjunto->tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
              $extension = ".docx";
            }else{
              $extension = ".doc";
            }

            $file = public_path().'/uploads/'.$adjunto->nombre.$extension;

            if (File::isFile($file))
            {
                $file = File::get($file);
                $response = Response::make($file, 200);
                // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)

                if($adjunto->tipo == "image/png"){
                  $response->header('Content-Type', 'image/png');
                }elseif($adjunto->tipo == "application/pdf"){
                  $response->header('Content-Type', 'application/pdf');
                }elseif($adjunto->tipo == "image/jpeg"){
                  $response->header('Content-Type', 'image/jpeg');
                }elseif($adjunto->tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                  $response->header('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                }else{
                  $response->header('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                }

                return $response;
            }
        }



    }





}
