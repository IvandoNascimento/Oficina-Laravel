<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro.index');
    }
    public function logar(Request $request)
    {
        if (!Auth::attempt($request->only(['email','password'])))
        {
            return redirect()->back()->withErrors('Usuario e/ou senha invalidos');
        }
        return redirect()->route('estoque.index');
        
    }
    public function create()
    {
        return view('cadastro.create');
    }
    public function store(Request $request)
    {
        $data =  $request->except('__token');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('estoque.index');
    }
}
