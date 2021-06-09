<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends MainModel implements Authenticatable
{
    protected $table = "usuarios";

    protected $fillable = ['email', 'login', 'password', 'nome'];

    public function getAuthIdentifierName(){
         // A PRÓPRIA CHAVE PARA IDENTIFICAR O OBJETO QUE ESTÁ AUTENTICADO
        return 'login';
    }

    /**
     * Método responsável por retornar o login do usuário 
     * @return mixed
     */
    public function getAuthIdentifier(){
        // RETORNAR A IDENTIFICAÇÃO DO USUÁRIO
        return $this->login;
    }

    /**
     * Método responsável por retornar a senha do usuário 
     * @return mixed
     */
    public function getAuthPassword(){
       // RETORNAR A SENHA 
       return $this->password;
    }

    public function getRememberToken(){

    }

    public function setRememberToken($value){

    }

    public function getRememberTokenName(){

    }

    public function setLoginAttribute($login){
        $value = preg_replace('/[^0-9]/','',$login);
        $this->attributes['login'] = $value;
    }
}