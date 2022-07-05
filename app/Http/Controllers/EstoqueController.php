<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Estoque;

class EstoqueController extends Controller
{
    //listar
    public function index(Request $request)
    {
        
        $estoques =  Estoque::query()->orderBy('id')->get();

        return view('estoque.index',compact('estoques'));
    }
    //criar
    public function create()
    {
        
        return view('estoque.create');
    }
    public function store(Request $request)
    {
        
        //nome data tipo
        //dd($request->all());
        $user = Auth::user();
        $estoque = Estoque::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'tipo' => $request->tipo,
            'user_id' => $user->id
        ]);
        
        $estoque->save();
        return redirect()->route('estoque.index');
    }
    //mostrar
    public function show(int $id)
    {
        $estoque = Estoque::find($id);
        return view('estoque.show', compact('estoque'));
    }
    //remover
    public function remove(int $id)
    {
        $estoque = Estoque::find($id);
        $estoque->produtos()->delete();
        $estoque->delete();

        return redirect()->route('estoque.index');
    }
    //editar    
    
    public function edit(int $id)
    {
        $estoque = Estoque::find($id);
        
        return view('estoque.edit',compact('estoque'));
    }
    public function update(Request $request){
        
        $estoque = Estoque::find($request->route()->id);
        $estoque->nome = $request->nome;
        $estoque->data = $request->data;
        $estoque->tipo = $request->tipo;

        $estoque->update();
       
        return redirect()->route('estoque.index');
    }
    
}
