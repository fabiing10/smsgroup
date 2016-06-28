<?php

class Apartamento extends \Eloquent {

    protected $table = 'apartamentos';
    protected $fillable = array();

    // Many to many relationship Usuario-Apartamento Table
    public function usuarios(){
        return $this->belongsToMany('Usuario','usuario_apartamento','apartamento_id','usuario_id');
    }

    public function zona(){
        return $this->belongsTo('Zona');
    }



    public function listarApartamentosConjuntoId($conjunto){

        $query = DB::table('apartamentos as apartamento')
            ->join('zonas as zona', 'apartamento.zona_id', '=', 'zona.id')
            ->join('conjuntos as conjunto', 'zona.conjunto_id', '=', 'conjunto.id')
            ->select('apartamento.id','apartamento.apartamento','zona.value as zona')
            ->where('conjunto.id', '=', $conjunto)
            ->get();

        return $query;
    }
}