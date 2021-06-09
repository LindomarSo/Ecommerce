@extends('layout.main')

@section('title', 'Logar')

@section('scriptjs')
    <script>
        $(function(){
            $('#login').mask('000.000.000-00')
        })        
    </script>
@endsection

@section('content')

<div class="col-md-6 offset-md-3">
                    @if($message = Session::get("erro"))
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        </div>
                    @endif    
                <h2 class="title">Logar no Sistema</h2>
                <form class="mb-5" action="{{ route('logar') }}" method="POST">
                @csrf
                <div class="row">
                        <div class="mb-3 col-md-12 col-12">
                                <label for="login" class="form-label">Login:</label>
                                <input id="login" type="text" class="form-control" name="login">
                        </div>
                        <div class="mb-3 col-md-12 col-12">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" name="senha">
                        </div>
                        <div class="mt-3">
                                <button type="submit" class="btn btn-secondary">Entrar</button>
                        </div> 
                </div> 
            </form>
        </div>

@endsection