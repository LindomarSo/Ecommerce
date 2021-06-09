@extends('layout.main')

@section('title', 'Carrinho')

@section('content')
    <h2>Carrinho</h2>   
    @if($message = Session::get('right'))
        <div class="alert alert-success">
            <p class="mb-0"> {{$message}}</p>
        </div>
    @endif
    @if($message = Session::get('fault'))
        <div class="alert alert-danger">
            <p class="mb-0"> {{$message}} </p>
        </div>
    @endif
    @if(isset($cart) and count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $indice => $itens)
                    <tr>
                        <td>
                            <a href=" {{ route('excluir_carrinho',['indice'=>$indice]) }} " class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td> {{$itens->nome}} </td>
                        <td> <img src="{{asset($itens->foto)}}" height="50px"> </td>
                        <td> {{$itens->valor}} </td>
                        <td> {{$itens->descricao}} </td>
                    </tr>
                    @php $total += $itens->valor; @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5">
                        Total do carrinho:  R$ {{$total}}
                    </td>
                </tr>
            </tfooter>
        </table>
        <form action="{{ route('carrinho_finalizar') }}" method="POST">
            @csrf 
            <button class="btn btn-secondary">Finalizar Compra</button>
        </form>
    @else
        <div class="alert alert-success">
            <p class="mb-0">Nenhum item no carrinho</p>
        </div>
    @endif
@endsection