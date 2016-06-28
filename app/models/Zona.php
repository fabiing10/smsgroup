<?php

class Zona extends \Eloquent {

    protected $table = 'zonas';
    protected $fillable = array();

    public function apartamentos(){
        return $this->hasMany('Apartamento');
    }

    public function conjuntos(){
        return $this->belongsTo('Conjunto');
    }


    public function listarZonasdeConjunto($conjunto){
        $zonas = Zona::where('conjunto_id','=',$conjunto)->get();
        return $zonas;
    }

}