<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
        public function store(Request $request){
        
        $autore = Autor::create([
            'id' => $request->id,
            'nome_completo' => $request->nome_completo,
            'data_nascimento' => $request->data_nascimento,
            'nacionalidade' => $request->nacionalidade

        ]);
        return response()-> json($autore);
    }

    public function index(){
        $autores = Autor::all();

        return response()->json($autores);
    }

    public function update(Request $request){
        //buscar a tarefa que sera atulizada
        $autores = Autor::find($request->id);

        //verifique se a tarefa existe
        if($autores == null){
            return response()->json([
                'erro' => 'Autor não encontrada'
            ]);
        }
        //verificar se o campo existe na request
        if(isset($request->nome_completo)) {
            $autores->nome_completo = $request->nome_completo;
        }
        //verificar se o campo data_hora existe na request
        if(isset($request->data_nascimento)){
            $autores->data_nascimento = $request->data_nascimento;
        }
        //verificar se o campo descricao existe na request
        if(isset($request->nacionalidade)){
            $autores->nacionalidade = $request->nacionalidade;
        }

        $autores->update();

        return response()->json([
            'mensagem' => 'atualizada'
        ]);
    }

    public function show($id){
        //select * from tarefas where id = 1
        $autores = Autor::find($id);

        //verifica se a tarefa exsite ou se a variavel tarefa é nula
        if($autores == null){
            return response()->json([
                'erro' => 'Autor não encontrada'
            ]);
        }

        return response()->json($autores);
    }

    public function delete($id){
        $autores = Autor::find($id);

        if ($autores == null){
            return response()->json([
                'erro' => 'Autor não encontrada'
            ]);
        }

        $autores->delete();

        return response()->json([
            'mensagem' => 'excluida'
        ]);
    }
}
