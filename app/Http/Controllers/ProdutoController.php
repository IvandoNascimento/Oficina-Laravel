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
        $produto = Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'estoque_id' => $request->id
        ]);
        $estoque = $produto->estoque;
     
        $estoque->update();
        
        return redirect()->route('produto.index',['id' => $estoque->id]);
    }
    public function show(int $id,int $idProduto)
    {
        $produto = Produto::find($idProduto);

        return view('produto.show',compact('produto'));
    }
    
    public function remove(int $id)
    {
        $produto = Produto::find($id);
        $estoque = $produto->estoque;
        $produto->delete();
        $estoque->update();


        return redirect()->route('produto.index',['id' => $estoque->id]);
    }
    public function edit(int $id,int $idProduto)
    {
        
        $produto = Produto::find($idProduto);
       
        return view('produto.edit',compact('produto'));
    }
    public function update(Request $request,int $id, int $idProduto)
    {
        $produto = Produto::find($idProduto);
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;

        $produto->update();

        return redirect()->route('produto.index',['id' => $produto->estoque->id]);
    }
}   
