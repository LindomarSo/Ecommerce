<?php

namespace App\Models;

class Endereco extends MainModel
{
    protected $table = "enderecos";

    protected $fillable = [
        'logradouro', 
        'numero',
        'cidade',
        'cep',
        'complemento',
        'estado'
    ];

    public function setCepAttribute($cep){
        $value = preg_replace('/[^0-9]/','',$cep);
        $this->attributes['cep'] = $value;
    }
}
