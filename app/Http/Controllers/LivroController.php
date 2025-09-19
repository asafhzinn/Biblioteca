<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function store(Request $request){
        
        $livro = Livro::create([
            'titulo' => $request->titulo,
            'ano_lancamento' => $request->ano_lancamento,
            'genero' => $request->genero

        ]);
        return response()-> json($livro);
    }

    public function index(){
        $livros = livro::all();

        return response()->json($livros);
    }
    public function update(Request $request){
        //buscar a tarefa que sera atulizada
        $livro = Livro::find($request->id);

        //verifique se a tarefa existe
        if($livro == null){
            return response()->json([
                'erro' => 'Livro não encontrada'
            ]);
        }
        //verificar se o campo existe na request
        if(isset($request->titulo)) {
            $livro->titulo = $request->titulo;
        }
        //verificar se o campo data_hora existe na request
        if(isset($request->data_nascimento)){
            $livro->ano_lancamento = $request->ano_lancamento;
        }
        //verificar se o campo descricao existe na request
        if(isset($request->genero)){
            $livro->genero = $request->genero;
        }
        

        $livro->update();

        return response()->json([
            'mensagem' => 'atualizada'
        ]);
    }

    public function show($id){
        //select * from tarefas where id = 1
        $livro = Livro::find($id);

        //verifica se a tarefa exsite ou se a variavel tarefa é nula
        if($livro == null){
            return response()->json([
                'erro' => 'Autor não encontrada'
            ]);
        }

        return response()->json($livro);
    }

    public function delete($id){
        $livro = Livro::find($id);

        if ($livro == null){
            return response()->json([
                'erro' => 'Autor não encontrada'
            ]);
        }

        $livro->delete();

        return response()->json([
            'mensagem' => 'excluida'
        ]);
    }
}

