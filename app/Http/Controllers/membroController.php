<?php

namespace App\Http\Controllers;

use App\Models\membro;
use Illuminate\Http\Request;

class membroController extends Controller
{
    public function store(Request $request){
        
        $membro = membro::create([
            'nome_completo' => $request->nome_completo,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'data_cadastro' => $request->data_cadastro
        ]);
        return response()-> json($membro);
    }

    public function index(){
        $membros = membro::all();

        return response()->json($membros);
    }
}
