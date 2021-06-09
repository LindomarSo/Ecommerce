@extends('layout.main')

@section("scriptjs")
        <script>
                $(function(){
                        $('.cpf').mask('999.999.999-99')
                        $('.cep').mask('99.999-999')
                })
        </script>

@endsection

@section('title', 'Cadastrar')

@section('content')

        <div class="col-md-10 offset-md-1">
                <h2 class="title">Cadastrar Clientes</h2>
                <form class="mb-5" action="{{ route('cadastrar_cliente') }}" method="POST">
                @csrf
                <div class="row">
                        <div class="mb-3 col-md-6 col-12">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="mb-3 col-md-6 col-12">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3 col-md-6 col-12">
                                <label for="cpf" class="form-label">CPF:</label>
                                <input type="text" class="form-control cpf" name="cpf">
                        </div>
                        <div class="mb-3 col-md-6 col-12">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" name="senha">
                        </div> 
                        <div class="mb-3 col-md-8 col-12">
                                <label for="endereco" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" name="endereco">
                        </div>
                        <div class="mb-3 col-md-1 col-6">
                                <label for="numero" class="form-label">Número:</label>
                                <input type="text" class="form-control" name="numero">
                        </div>
                        <div class="mb-3 col-md-3 col-6">
                                <label for="complemento" class="form-label">Complemento:</label>
                                <input type="text" class="form-control" name="complemento">
                        </div> 
                        <div class="mb-3 col-md-4 col-12">
                                <label for="cidade" class="form-label">Cidade:</label>
                                <input type="text" class="form-control" name="cidade">
                        </div> 
                        <div class="mb-3 col-md-4 col-12">
                                <label for="cep" class="form-label">CEP:</label>
                                <input type="text" class="form-control cep" name="cep">
                        </div>
                        <div class="mb-3 col-md-4 col-12">
                                <label for="estado" class="form-label">Estado:</label>
                                <input type="text" class="form-control" name="estado">
                        </div> 
                        <div class="mt-3">
                                <button type="submit" class="btn btn-secondary">Cadastrar</button>
                        </div> 
                </div> 
            </form>
        </div>
@endsection