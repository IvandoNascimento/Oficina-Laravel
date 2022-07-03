<x-layout  header="Lista de estoques">
    <div>
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
                  <tr>
                    <th scope="row">{{$estoque->id}}</th>
                    <td>
                        <a href="{{route('estoque.show', ['id' => $estoque->id])}}" style="text-decoration: none" >{{$estoque->nome}}</a></td>
                    <td>{{$estoque->data}}</td>
                    <td>{{$estoque->tipo}}</td>
                    <td>1</td>
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
                  @endforeach
                </tbody>
                
              </table>
        </div>

        <a class="btn btn-success" href="{{route('estoque.create')}}">Adicionar</a>
        <button class="btn btn-success">Adicionar</button>
    </div>
</x-layout>