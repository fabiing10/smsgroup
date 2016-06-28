<?php

class Administrador extends \Eloquent {

    protected $table = 'administradores';
    protected $fillable = array();

    public function usuarios(){
        return $this->belongsTo('Usuario');
    }

    // Many to many relationship Administrador-Conjunto Table
    public function conjuntos(){

        return $this->belongsToMany('Conjunto','administrador_conjunto','administrador_id','conjunto_id');

    }

}