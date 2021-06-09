<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categoria = new \App\Models\Categoria(['categoria'=>'Informática']);
        $categoria->save();

        $produto = new \App\Models\Produto([
            'nome'=>'produto1', 
            'valor'=>10,
            'foto'=>'/images/produto1.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto->save();

        $produto2 = new \App\Models\Produto([
            'nome'=>'produto2', 
            'valor'=>10,
            'foto'=>'/images/produto2.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto2->save();

        $produto3 = new \App\Models\Produto([
            'nome'=>'produto3', 
            'valor'=>10,
            'foto'=>'/images/produto3.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto3->save();

        $produto4 = new \App\Models\Produto([
            'nome'=>'produto4', 
            'valor'=>10,
            'foto'=>'/images/produto4.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto4->save();

        $produto5 = new \App\Models\Produto([
            'nome'=>'produto5', 
            'valor'=>10,
            'foto'=>'/images/produto5.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto5->save();

        $produto6 = new \App\Models\Produto([
            'nome'=>'produto6', 
            'valor'=>10,
            'foto'=>'/images/produto6.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto6->save();

        $produto7 = new \App\Models\Produto([
            'nome'=>'produto7', 
            'valor'=>10,
            'foto'=>'/images/produto7.jpg',
            'descricao'=>'',
            'categoria_id'=>$categoria->id
        ]);

        $produto7->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
