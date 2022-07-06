<x-layout header="Lista de Produtos do {{$estoque->nome}}">
    <div class="container-mid">
        <ul class="list-group">
            @foreach ($produtos as $produto)
            <div class="border-b border-gray-50 rounded p-6  mt-2">
                <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
                    <a class="btn btn-success" href="{{route('produto.show',['id' => $estoque->id,'idProduto' => $produto->id])}}">{{$produto->nome}}</a>
                    <span class="d-flex">
                        @auth
                        <a class="btn btn-info btn-sm me-1" href="{{route('produto.edit',['id' => $estoque->id,'idProduto' => $produto->id])}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="post" action="{{route('produto.remove', ['id' => $produto->id])}}"
                              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($produto->nome) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                        @endauth
                      </span>
                </li>
            </div>
            @endforeach 
        </ul>
    </div>

    <a class="btn btn-success mt-2" href="{{route('produto.create',['id' => $estoque->id])}}">Adicionar Produto</a>
</x-layout>
