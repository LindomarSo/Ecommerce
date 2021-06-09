<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request){
        // DADOS  
        $dados = [];

        if($request->isMethod('POST')){
            // DADOS DO POST
            $login = $request->input("login");
            $senha = $request->input("senha");

            $login = preg_replace("/[^0-9]/", '', $login);

            $credential = ['login'=>$login, 'password'=>$senha];
           
            // LOGAR
            if(Auth::attempt($credential)){
                return redirect()->route('home');
            }else{
                $request->session()->flash("erro", "Usuário ou senha inválidos!");
                return redirect()->route('logar');
            }
        }

        return view('logar', $dados);
    }

    public function sair(Request $request){
        // DESLOGA O USUÁRIO
        Auth::logout();

        return redirect()->route('home');
    }
}
