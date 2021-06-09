@extends('layout.main')

@section('title', 'Categoria')

@section('content')
    <div class="col-md-2 col-2">
        @if(isset($categoria) and count($categoria) > 0)
        <div class="list-group">
            <a 
                class="list-group-item list-group-item-action py-3 
                @if(!isset($id)) active @endif
                " href="{{route('categoria')}}">Todas
            </a>
            @foreach($categoria as $categ)
                <a 
                    class="list-group-item list-group-item-action py-3 
                        @if(isset($id) and $categ->id == $id) active @endif" 
                    href="/categoria/{{$categ->id}}">{{ $categ->categoria }}
                </a>
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-md-10 col-10">
        <div class="row">
            @include('produtos._products',['lista'=>$produtos])
        </div>
    </div>
@endsection