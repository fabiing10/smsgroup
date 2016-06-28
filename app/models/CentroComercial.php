<?php

class CentroComercial extends \Eloquent {

    protected $table = 'centros_comerciales';
    protected $fillable = array();

    // Many to many relationship Publicidad - Conjunto Table
    public function publicidades(){
        return $this->belongsToMany('Publicidad','publicidad_cc','centro_comercial_id','publicidad_id');
    }

    // Many to many relationship Centro comercial - Publicacion Table
    public function publicacioncc(){
        return $this->belongsToMany('PublicacionCentrocomercial','publicacion_centrocomercial','cc_id','publicacion_id');
    }

}