<?php

class Documento extends \Eloquent {

    protected $table = 'documentos';
    protected $fillable = array();

    public function conjuntos(){
        return $this->belongsTo('Conjunto');
    }



}
