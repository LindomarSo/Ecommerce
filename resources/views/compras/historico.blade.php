@extends('layout.main')

@section('title', 'Minhas compras')

@section('scriptjs')
    <script>
        $(function(){
            $('.infocompra').on('click',function(){
                let id = $(this).attr("data-value")

                $.post('{{route("compra_detalhes")}}',{
                    idpedido:id
                },
                    // FUNÇÃO DE CALLBACK => AJAX
                    (result) =>{
                        $('#conteudopedido'). html(result)
                })
            })
        })
    </script>
@endsection

@section('content')

    <div class="col-12">
        <h2>Minhas Compras</h2>
    </div>
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data da compra</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($lista as $list)
                <tr>
                    <td>{{$list->datapedido->format("d/m/Y H:i:s")}} </td>
                    <td>{{$list->statusDescricao()}} </td>
                    <td>
                        <button 
                            href="#" class="btn btn-sm btn-info infocompra"
                            data-bs-toggle="modal" data-bs-target="#modalcompra"
                            data-value="{{$list->id}}"
                        >
                            <i class="fa fa-shopping-basket"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modalcompra">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes da compra</h5>
                </div>
                <div class="modal-body">
                    <div id="conteudopedido">

                    </div>
                </div>
                <div class="modal-footer">
                    <button 
                        type="button" 
                        data-bs-dismiss="modal"
                        class="btn btn-secondary"
                        ><i class="fa fa-times"></i> Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection