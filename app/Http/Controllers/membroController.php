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
    public function update(Request $request){
        //buscar a tarefa que sera atulizada
        $membro = membro::find($request->id);

        //verifique se a tarefa existe
        if($membro == null){
            return response()->json([
                'erro' => 'membro não encontrada'
            ]);
        }
        //verificar se o campo existe na request
        if(isset($request->nome_completo)) {
            $membro->nome_completo = $request->nome_completo;
        }
        //verificar se o campo data_hora existe na request
        if(isset($request->endereco)){
            $membro->endereco = $request->endereco;
        }
        //verificar se o campo descricao existe na request
        if(isset($request->telefone)){
            $membro->telefone = $request->telefone;
        }
        if(isset($request->data_cadastro)){
            $membro->data_cadastro = $request->data_cadastro;
        }
        

        $membro->update();

        return response()->json([
            'mensagem' => 'atualizada'
        ]);
    }

    public function show($id){
        //select * from tarefas where id = 1
        $membro = membro::find($id);

        //verifica se a tarefa exsite ou se a variavel tarefa é nula
        if($membro == null){
            return response()->json([
                'erro' => 'membro não encontrada'
            ]);
        }

        return response()->json($membro);
    }

    public function delete($id){
        $membro = membro::find($id);

        if ($membro == null){
            return response()->json([
                'erro' => 'membro não encontrada'
            ]);
        }

        $membro->delete();

        return response()->json([
            'mensagem' => 'excluida'
        ]);
    }
}
