<?php

class Publicidad extends \Eloquent {

    protected $table = 'publicidad';
    protected $fillable = array();


    // Many to many relationship Publicidad - Conjunto Table
    public function conjuntos(){
        return $this->belongsToMany('Conjunto','publicidad_conjunto','publicidad_id','conjunto_id');
    }

    // Many to many relationship Publicidad - Conjunto Table
    public function centroscomerciales(){
        return $this->belongsToMany('CentroComercial','publicidad_cc','publicidad_id','centro_comercial_id');
    }


}