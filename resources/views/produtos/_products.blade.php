@if(isset($lista))
        @foreach($lista as $produtos)
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset($produtos->foto) }}" alt="Produto1" class="card-img-top produto">
                <div class="card-body">
                    <h6 class="card-title">{{$produtos->nome}} - R$ {{$produtos->valor}}</h6>
                    <a href="{{ route('adicionar_carrinho',[$produtos->id]) }}" class="btn btn-secondary">Adicionar item</a>
                </div>
            </div>
        </div> 
        @endforeach
    @endif  