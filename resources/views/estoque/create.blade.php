<x-layout header="Pagina de criação">
    <form method="post">
        @csrf
        <div class="form-control">
            <div class="row mb-2">
                <div class="col col-4">
                    <label for="nome">Nome do Estoque</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="col col-2">
                    <label for="data">Data do estoque</label>
                    <input type="date" class="form-control" name="data" id="data">
                </div>
                <div class="col col-2">
                    <label for="tipo">Tipo do Estoque</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option  value="compra">Compra</option>
                        <option value="venda">Venda</option>
                        <option  value="protecao">Proteção</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-2">Adicionar</button>
      </form>
</x-layout>

