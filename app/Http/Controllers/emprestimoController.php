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
            'codigo_livro' => $request->codigo_livro
        ]);
        return response()-> json($emprestimo);
    }

    public function index(){
        $emprestimos = emprestimo::all();

        return response()->json($emprestimos);
    }
    public function update(Request $request){
        //buscar a tarefa que sera atulizada
        $emprestimo = Emprestimo::find($request->id);

        //verifique se a tarefa existe
        if($emprestimo == null){
            return response()->json([
                'erro' => 'emprestimo não encontrada'
            ]);
        }
        //verificar se o campo existe na request
        if(isset($request->data_emprestimo)) {
            $emprestimo->data_emprestimo = $request->data_emprestimo;
        }
        //verificar se o campo data_hora existe na request
        if(isset($request->data_devolucao)){
            $emprestimo->data_devolucao = $request->data_devolucao;
        }
        //verificar se o campo descricao existe na request
        if(isset($request->codigo_membro)){
            $emprestimo->codigo_membro = $request->codigo_membro;
        }

        if(isset($request->codigo_livro)){
            $emprestimo->codigo_livro = $request->codigo_livro;
        }
        $emprestimo->update();

        return response()->json([
            'mensagem' => 'atualizada'
        ]);
    }

    public function show($id){
        //select * from tarefas where id = 1
        $emprestimo = Emprestimo::find($id);

        //verifica se a tarefa exsite ou se a variavel tarefa é nula
        if($emprestimo == null){
            return response()->json([
                'erro' => 'emprestimo não encontrada'
            ]);
        }

        return response()->json($emprestimo);
    }

    public function delete($id){
        $emprestimo = Emprestimo::find($id);

        if ($emprestimo == null){
            return response()->json([
                'erro' => 'emprestimo não encontrada'
            ]);
        }

        $emprestimo->delete();

        return response()->json([
            'mensagem' => 'excluida'
        ]);
    }
}


