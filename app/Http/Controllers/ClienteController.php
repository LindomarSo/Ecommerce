<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data = [];

        return view('/cadastrar', $data);
    }

    /**
     * Método responsável por realizar o cadastro de clientes
     * @param Request $request
     */
    public function cadastrarCliente(Request $request){
        // VARIÁVEIS DO FORMULÁRIO
        $postVars = $request->all();
        
        // INSTÂNCIA DE USUÁRIO
        $obUsuario = new Usuario();
        $obUsuario->fill($postVars);
        $obUsuario->login = $request->input("cpf", '');
        $senha = $request->input('senha');
        $obUsuario->password = \Illuminate\Support\Facades\Hash::make($senha);
        
        // INSTÂNCIA DE ENDEREÇO
        $obEndereco = new Endereco($postVars);
        $obEndereco->logradouro = $request->input("endereco", '');

        $clienteService = new ClienteService;
        $result = $clienteService->salvarUsuario($obUsuario, $obEndereco);

        $message = $result['message'];
        $status = $result['status'];

        // GRAVANDO A MENSAGEM
        $request->session()->flash($status, $message);

        // REDIRECIONA PARA CADASTRAR
        return redirect()->route('cadastrar');
    }
}
