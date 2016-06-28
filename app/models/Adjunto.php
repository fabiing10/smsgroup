<?php

class Adjunto extends \Eloquent {

    protected $table = 'adjuntos';
    protected $fillable = array();

    // Many to many relationship Adjunto-Mensaje Table
    public function mensajes(){
        return $this->belongsToMany('Mensaje','adjunto_mensaje','adjunto_id','mensaje_id');
    }
}