<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Produto;
use App\Services\VendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Método responsável por renderizar a view de Home
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        //DADOS
        $data = [];

        // BUSCAR PRODUTOS
        $produtos = Produto::all();

        $data['lista'] = $produtos;

        return view('home',$data);
    }

    /**
     * Métoedo responsável por renderizar a view de categorias 
     * @param Request $request
     * @return mixed
     */
    public function categoria(Request $request){
        // DADOS
        $data = [];
        // SELECT * FROM categorias
        $categoria = Categoria::all();
        // SELECT * FROM produtos LIMIT 4 
        $queryProdutos = Produto::limit(4);

        $data['categoria'] = $categoria;

        $data['produtos'] = $queryProdutos->get();

        return view('/categoria', $data);
    }

    /**
     * Método responsável por buscar produtos pelo id da categoria
     * @param integer $id 
     * @return mixed
     */
    public function categoryById($id){
        // DADOS
        $data = [];

        $produtos = Produto::limit(4)->where("categoria_id", $id)->get();

        $categoria = Categoria::all();
        
        $data['categoria'] = $categoria;

        $data['produtos'] = $produtos;
      
        $data['id'] = $id;
      
        return view('/categoria', $data);
    }

    /**
     * Método responsável por renderizar a view de adicionar carrinho
     * @param integer $id 
     * @param Request $request
     * @return mixed
     */
    public function adicionarCarrinho($idProduto, Request $request){
        // DADOS
        $data = [];
        // BUSCAR PRODUTO PELO ID 
        $produto = Produto::find($idProduto);
        if($produto){
            // BUSCAR DA SESSÃO O CARRINHO ATUAL
            $carrinho = session('cart', []);

            array_push($carrinho, $produto);

            session(['cart'=>$carrinho]);
        }
        // RETORNA A VIEW
        return redirect()->route("home");
    }

    /**
     * Método responsável por renderizar a view do carrinho
     * @param Request $request
     */
    public function verCarrinho(Request $request){
        // BUSCA OS ITENS DO CARRINHO 
        $carrinho = session('cart', []);
        
        // DADOS
        $data = ['cart'=>$carrinho];

        // RETORNA A VIEW DO CARRINHO 
        return view('produtos/carrinho', $data);
    }

    /**
     * Método responsável por excluir um produto do carrinho 
     * @param integer $indice
     */
    public function excluirCarrinho($indice, Request $request){
        // BUSCAR CARRINHO 
        $carrinho = session('cart', []);

        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        // INICIA UMA NOVA SESSÃO
        session(['cart'=>$carrinho]);

        return redirect()->route('ver_carrinho');
    }

    /**
     * Método responsável por finalizar o carrinho
     * @param Request $request
     */
    public function finalizar(Request $request){
        // VERIFICA SE O USUÁRIO ESTÁ LOGADO
        if(!Auth::user()) return redirect()->route('logar');

        // BUSCA O CARRINHO
        $produtos = session('cart',[]);

        // INSTÂNCIA DE VENDA SERVICE
        $vendaService = new VendaService;
        $result = $vendaService->finalizarVenda($produtos, Auth::user());

        if($result['status'] == 'right') $request->session()->forget("cart");

        $request->session()->flash($result['status'], $result['message']);

        // REDIRECIONA O USUÁRIO 
        return redirect()->route('ver_carrinho');
    }

    /**
     * Método reponsável pela view do histórico de compras
     * @return mixed
     */
    public function historico(){
        // DADOS
        $data = [];
        // BUSCAR O ID DO USUÁRIO LOGADO
        $idUser = Auth::user()->id;

        // BUSCAR PEDIDOS NO BANCO 
        $listaPedido = Pedido::where("usuario_id", $idUser)
                                    ->orderBy("datapedido", 'desc')
                                    ->get();

        $data['lista'] = $listaPedido;

        return view('compras/historico', $data);
    }

    /**
     * Método responsável por devolver os detalhes para o modal
     * @return Response
     */
    public function detalhes(Request $request){
        // ID DO PRODUTO ENVIADO 
        $idPedido = $request->input('idpedido');
        
        $listaItens = ItensPedido::join("produtos", "produtos.id","=","itens_pedidos")
                                    ->where("pedido_id", $idPedido)
                                    ->get();
    }
}
