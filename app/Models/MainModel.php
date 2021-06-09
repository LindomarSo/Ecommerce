<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    // HABILITA OS CAMPOS CREATED_AT E UPDATED_AT

    public $timesTamps = true;

    public $increment = true;

    // GUARDAR OS ATRIBUTOS DE UM FORMULÁRIO
    protected $fillable = [];

    /**
     * 
     */
    public function beforeSave(){
        return true;
    }

    /**
     * Rescrever o método save() do eloquent
     * @param array $options
     */
    public function save($options = []){
        try{
            if(!$this->beforeSave()){
                return false;
            }
            return parent::save($options);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
