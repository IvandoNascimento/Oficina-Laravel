<x-layout header="Editar Produto">
    <form method="post" >
        @csrf
        <div class="form-control">
            <div class="row mb-2">
                <div class="col col-4">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{$produto->nome}}">
                </div>
                <div class="col col-2">
                    <label for="data">Preço do Produto</label>
                    <input type="text" class="form-control" name="preco" id="preco" value="{{$produto->preco}}">
                </div>
                <div class="col col-2">
                    <label for="tipo">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" id="quantidade" value="{{$produto->quantidade}}">
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-2">Alterar</button>
      </form>
</x-layout>