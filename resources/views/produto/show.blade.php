<x-layout header="Pagina de {{$produto->nome}}">
   
    <div class="text-center bg-dark p-1" style="color: white; width: 100%">
        <h1 style="text-align: center">produto - {{$produto->nome}}</h1>
        <h3 >Preco - {{$produto->preco}}</h3>
        <h3 >Quantidade - {{$produto->quantidade}}</h3> 
    </div>

<p style="text-align: center">Estoque: {{$produto->estoque->nome}}</p>
    
</x-layout>