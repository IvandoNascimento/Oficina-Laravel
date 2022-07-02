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
        
        $estoques =  Estoque::query()->orderBy('nome')->get();

        return view('estoque.index',compact('estoques'));
    }
    //criar
    public function create()
    {
        
        return view('estoque.create');
    }
    //salvar
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
    //remover
    public function remove()
    {

    }
}
