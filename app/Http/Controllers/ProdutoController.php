<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(int $id)
    {
        $estoque = Estoque::find($id);
        $produtos = $estoque->produtos()->get();
        
        return view('produto.index',compact('produtos','estoque'));
    }
    public function create()
    {
        
        return view('produto.create');
    }
    public function store(Request $request)
    {
        $estoque = Estoque::find($request->id);
        $produto = $estoque->produtos()->create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            
        ]);
       
       


        $estoque->save();
        
        return redirect()->route('produto.index',['id' => $estoque->id]);
    }
}
