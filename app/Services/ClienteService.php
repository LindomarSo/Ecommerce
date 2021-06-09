<?php

namespace App\Services;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Support\Facades\Log;

class ClienteService 
{
    public function salvarUsuario(Usuario $user, Endereco $address){
        try{
            // VERIFICANDO SE O LOGIN JÁ EXISTE
            $dbUsuario = Usuario::where("login", $user->login)->first();

            if($dbUsuario){
                return ['status'=>'err', 'message'=>'Login já cadastrado no sistema'];
            }

            // INICIAR TRANSAÇÃO
            \Illuminate\Support\Facades\DB::beginTransaction();

            $user->save();

            $address->usuario_id = $user->id;
            $address->save();
            
            // CONFIRMANDO TRANSAÇÃO
            \Illuminate\Support\Facades\DB::commit();

            return ['status'=>'ok', 'message'=>'Usuário cadastrado com sucesso'];
        }catch(\Exception $e){
            // OBTÉM O ERRO
            Log::error("ERRO", [
                'file'=>'ClienteService.SalvarUsuário',
                'message'=>$e->getMessage()
                ]);

            // CANCELA A TRANSAÇÃO
            \Illuminate\Support\Facades\DB::rollback();
 
            return ['status'=>'err', 'message'=>'Não pode cadastrar o usuário'];
        }
    }
}