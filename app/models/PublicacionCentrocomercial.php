<?php

class PublicacionCentrocomercial extends \Eloquent {

    protected $table = 'publicacion_centrocomercial';
    protected $fillable = array();

    // Many to many relationship Centro comercial - Publicacion Table
    public function centroscomerciales(){
        return $this->belongsToMany('CentroComercial','publicacion_centrocomercial','publicacion_id','cc_id');
    }
}

