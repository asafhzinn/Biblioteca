<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class emprestimoController extends Controller
{
     public function store(Request $request){
        
        $emprestimo = Emprestimo::create([
            'data_emprestimo' => $request->data_emprestimo,
            'data_devolucao' => $request->data_devolucao,
            'codigo_membro' => $request->codigo_membro,
            'codigo_livro' => $request->codigo_membro
        ]);
        return response()-> json($emprestimo);
    }

    public function index(){
        $emprestimos = emprestimo::all();

        return response()->json($emprestimos);
    }
}
