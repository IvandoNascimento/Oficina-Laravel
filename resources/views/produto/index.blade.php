<x-layout header="Lista de Produtos do {{$estoque->nome}}">
    <div class="container-mid">
        

        <ul class="list-group">
            @foreach ($produtos as $produto)
            <div class="border-b border-gray-50 rounded p-6  mt-2">
                <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
                    <a class="btn btn-success" href="#">{{$produto->nome}}</a>
                    <span class="btn btn-primary me-4">{{$produto->quantidade}}</span>
                </li>
            </div>
            @endforeach 
        </ul>
    </div>

    <a class="btn btn-success mt-2" href="{{route('produto.create',['id' => $estoque->id])}}">Adicionar Produto</a>
</x-layout>
