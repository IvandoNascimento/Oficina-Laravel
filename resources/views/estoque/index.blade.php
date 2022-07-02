<x-layout  header="Lista de estoques">

    <div>
        <div>
            @foreach ($estoques as $estoque)
                <h3>{{$estoque}}</h3>
            @endforeach
        </div>
        <a class="btn btn-success" href="{{route('estoque.create')}}">Adicionar</a>
        <button class="btn btn-success">Adicionar</button>
    </div>
    
    
</x-layout>