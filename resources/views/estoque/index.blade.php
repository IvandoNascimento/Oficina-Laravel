<x-layout  header="Lista de Estoques">
    <div class="container-mid">
        <div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Identificador</th>
                    <th scope="col">Nome do estoque</th>
                    <th scope="col">Data do estoque</th>
                    <th scope="col">Tipo do estoque</th>
                    <th scope="col">Qtd de itens</th>
                    <th scope="col">Acoes</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($estoques as $estoque)
                  <div>
                    <tr class="list-group-item-{{$estoque->tipo == 'venda' ? 'info' : 'warning' }} ">
                    <th scope="row">{{$estoque->id}}</th>
                    <td>
                        <a href="{{route('produto.index', ['id' => $estoque->id])}}" style="text-decoration: none" >{{$estoque->nome}}</a></td>
                    <td>{{$estoque->data}}</td>
                    <td>{{$estoque->tipo}}</td>
                    <td>{{$estoque->produtos()->count()}}</td>
                    <td>
                        <span class="d-flex">
                            @auth
                            <a class="btn btn-info btn-sm me-1" href="{{route('estoque.edit',['id' => $estoque->id])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="post" action="{{route('estoque.remove', ['id' => $estoque->id])}}"
                                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($estoque->nome) }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                            @endauth
                          </span>
                    </td>
                  </tr>
                  </div>
                  
                  @endforeach
                </tbody>
                
              </table>
        </div>
        <a class="btn btn-success" href="{{route('estoque.create')}}">Adicionar</a>
    </div>
</x-layout>