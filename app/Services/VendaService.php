<?php

namespace App\Services;

use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Usuario;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendaService
{
    /**
     * Método responsável por finalizar a venda 
     * @param array $produtos
     */
    public function finalizarVenda($produtos, Usuario $user){
       
        try{
            DB::beginTransaction();

            $dataHoje = new DateTime();
            $pedido = new Pedido();
            $pedido->datapedido = $dataHoje->format("Y-m-d H:i:s");
            $pedido->status = 'PEN';
            $pedido->usuario_id = $user->id;
            
            $pedido->save();

            foreach($produtos as $p){
                $itensPedido = new ItensPedido();

                $itensPedido->quantidade = 1;
                $itensPedido->valor = $p->valor;
                $itensPedido->data_item = $dataHoje->format("Y-m-d H:i:s");
                $itensPedido->produto_id = $p->id;
                $itensPedido->pedido_id = $pedido->id;
                
                $itensPedido->save();
            }

            DB::commit();

            return ['status'=>'right','message'=>'Compra realizada com sucesso'];
            
        }catch(\Exception $e){
            DB::rollBack();
            Log::error("ERROR:VENDA SERVICE", ['message'=>$e->getMessage()]);
            return ['status'=>'fault', 'message'=>'A venda não pode ser finalizada'];
        }
    }
}