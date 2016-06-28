<?php

class Noticia extends \Eloquent {

    protected $table = 'noticias';
    protected $fillable = array();

    public function conjuntos(){
        return $this->belongsTo('Conjunto');
    }

}