<?php

class Conjunto extends \Eloquent {

    protected $table = 'conjuntos';
    protected $fillable = array();

    public function zonas(){
        return $this->hasMany('Zona');
    }

    public function documentos(){
        return $this->hasMany('Documento');
    }

    public function noticias(){
        return $this->hasMany('Noticia');
    }

    // Many to many relationship Administrador-Conjunto Table
    public function administradores(){
        return $this->belongsToMany('Administrador','administrador_conjunto','conjunto_id','administrador_id');
    }


    // Many to many relationship Administrador-Conjunto Table
    public function publicidades(){
        return $this->belongsToMany('Publicidad','publicidad_conjunto','conjunto_id','publicidad_id');
    }



    public function listarConjuntos(){
        $query = DB::table('conjuntos as conjunto')
            ->select('conjunto.id','conjunto.nit','conjunto.tipo','conjunto.nombre','conjunto.pais','conjunto.ciudad','conjunto.localidad','conjunto.barrio',
                'conjunto.direccion','conjunto.telefono','conjunto.estrato')
            ->get();
        return $query;
    }

    public function listarAdministradoresPorConjunto(){

        $query = DB::table('conjuntos as conjunto')
            ->join('administrador_conjunto as admin_conjunto', 'conjunto.id', '=', 'admin_conjunto.conjunto_id')
            ->join('administradores as admin', 'admin.id', '=', 'admin_conjunto.administrador_id')
            ->join('usuarios as usuario', 'usuario.id', '=', 'admin.usuario_id')
            ->select('conjunto.id as conjunto_id','usuario.nombres','usuario.apellidos','usuario.email')
            ->get();

        return $query;
    }

    public function listarAdministradorPorConjunto($conjuntoId){

        $query = DB::table('conjuntos as conjunto')
            ->join('administrador_conjunto as admin_conjunto', 'conjunto.id', '=', 'admin_conjunto.conjunto_id')
            ->join('administradores as admin', 'admin.id', '=', 'admin_conjunto.administrador_id')
            ->join('usuarios as usuario', 'usuario.id', '=', 'admin.usuario_id')
            ->select('conjunto.id as conjunto_id','usuario.nombres','usuario.apellidos','usuario.email')
            ->where('conjunto.id', '=', $conjuntoId)
            ->get();

        return $query;
    }

    public function listarConjuntosSinAdministrador(){

       $query = Conjunto::whereNotExists(function($query)
        {
            $query->select(DB::raw(1))
                ->from('administrador_conjunto')
                ->whereRaw('conjuntos.id = administrador_conjunto.conjunto_id');
        })->get();


        return $query;
    }

    public function contarUsuariosConjunto($conjuntoId){

        $query = DB::table('usuarios as usuario')
            ->join('usuario_apartamento as u_a', 'usuario.id', '=', 'u_a.usuario_id')
            ->join('apartamentos as apartamento', 'u_a.apartamento_id', '=', 'apartamento.id')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
            ->select('usuario.id as id')
            ->where('conjunto.id', '=',$conjuntoId)
            ->count();

        return $query;
    }





}
