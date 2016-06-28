<?php

class Mensaje extends \Eloquent {

    protected $table = 'mensajes';
    protected $fillable = array();


    // Many to many relationship Mensaje-Usuario Table
    public function usuarios(){
        return $this->belongsToMany('Usuario','mensaje_usuario','mensaje_id','usuario_id');
    }


    // Many to many relationship Adjunto-Mensaje Table
    public function adjuntos(){
        return $this->belongsToMany('Adjunto','adjunto_mensaje','mensaje_id','adjunto_id');
    }

    // Many to many relationship Respuestas Table
    public function respuestasUsuario(){
        return $this->belongsToMany('Usuario','respuestas','mensaje_id','usuario_id');
    }



    /*
     *
     * Query Messages
     *
     *
     * */

    public function listarMensajesConjunto($conjuntoId){


        $query = DB::table('mensajes as mensaje')
            ->join('mensaje_usuario as m_u', 'mensaje.id', '=', 'm_u.mensaje_id')
            ->join('usuarios as usuario', 'm_u.to_id', '=', 'usuario.id')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->select('mensaje.id','mensaje.tipo','mensaje.Adjunto','mensaje.asunto','mensaje.fecha','mensaje.importancia')
            ->where('zona.conjunto_id', '=', $conjuntoId)
            ->groupBy('mensaje.id')
            ->get();

        return $query;

    }



    /*
     *
     * Save Messages
     *
     *
     * */

    public function guardarMensajeConjunto($MensajeId){


        //Buscar Conjunto Residencial
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;


        $query = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->select('usuario.id')
            ->where('zona.conjunto_id', '=', $conjunto)
            ->get();



        $data = array();
        $x = 0;
        foreach($query as $d){
            $id = ucwords(strtolower($d->id));

            $data[$x]=
                array("from_id" =>$user->id ,"to_id" => $id,"mensaje_id" => $MensajeId);
            $x++;
        }


        if(MensajeUsuario::insert($data)){
            return true;
        }else{
            return false;
        }



    }

    public function guardarMensajeZona($MensajeId,$zona){

        //Buscar Conjunto Residencial
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;


        $query = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->select('usuario.id')
            ->where('zona.id', '=', $zona)
            ->get();



        $data = array();
        $x = 0;
        foreach($query as $d){
            $id = ucwords(strtolower($d->id));

            $data[$x]=
                array("from_id" =>$user->id ,"to_id" => $id,"mensaje_id" => $MensajeId);
            $x++;
        }


        if(MensajeUsuario::insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function guardarMensajeApartamento($MensajeId,$apartamento){

        //Buscar Conjunto Residencial
        $user = Auth::user();
        $admin = Administrador::where('usuario_id', '=', $user->id)->firstOrFail();
        $adminConjunto = AdministradorConjunto::where('administrador_id', '=', $admin->id)->firstOrFail();
        $conjunto = $adminConjunto->conjunto_id;


        $query = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->select('usuario.id')
            ->where('apartamento.id', '=', $apartamento)
            ->get();



        $data = array();
        $x = 0;
        foreach($query as $d){
            $id = ucwords(strtolower($d->id));

            $data[$x]=
                array("from_id" =>$user->id ,"to_id" => $id,"mensaje_id" => $MensajeId);
            $x++;
        }


        if(MensajeUsuario::insert($data)){
            return true;
        }else{
            return false;
        }
    }

}