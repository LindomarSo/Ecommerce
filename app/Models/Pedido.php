<?php

namespace App\Models;

class Pedido extends MainModel
{
    protected $table = "pedidos";

    protected $dates = ['datapedido'];

    protected $fillable = ['datapedido', 'status', 'usuario_id'];

    public function statusDescricao(){
        $descricao = '';
        switch($this->status){
            case "PEN": 
                $descricao = "PENDENTE";
                break;
            case "APR": 
                $descricao = "APROVADO";
                break;
            case "CAN": 
                $descricao = "CANCELADO";
                break;
        }

        return $descricao;
    }
}