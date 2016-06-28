<?php

class Configuracion extends \Eloquent {

    protected $table = 'configuraciones';
    protected $fillable = array();

    public function usuario(){
        return $this->belongsTo('Usuario');
    }
}