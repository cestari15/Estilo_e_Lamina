<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Http\Requests\SupdateFormRequest;
use App\Models\Servicos;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store(ServicoFormRequest $request)
    {
        $servicos = Servicos::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco
        ]);

        return response()->json([
            "success" => true,
            "message" => "Serviço cadastrado com sucesso",
            "data" => $servicos
        ], 200);
    }

    public function pesquisarPorNome(Request $request)
    {
        $servicos = Servicos::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($servicos) > 0) {
            return response()->json([
                'status' => true,
                'data' => $servicos
            ]);
        }
        return response()->json([
            'status'=>false,
            'menssagens'=>'Não há resultados para pesquisa'
        ]);
    }

  

    public function delete($id)
    {
        $servicos= Servicos::find($id);

        if (!isset($servicos)) {
            return response()->json([
                'status' => false,
                'message' => "Corte não Sencontrado"
            ]);
        }

        $servicos->delete();
        return response()->json([
            'status' => true,
            'message' => "Corte excluido com sucesso"
        ]);

       
    }


    public function pesquisarPorId($id){
        $servicos =Servicos::find($id);


        if($servicos == null){
            return response()->json([
                'status'=>false,
                'message'=>"servicos não encontrado"
            ]);
        }

        return response()->json([
            'status'=>true,
            'data'=>$servicos
        ]);
    }


    public function editar(SupdateFormRequest $request)

    {
        
        $servicos = Servicos::find($request->id);

        if (!isset($servicos)) {
            return response()->json([
                'status' => false,
                'message' => "Usuario não Sencontrado"
            ]);
        }

        if (isset($request->nome)) {
            $servicos->nome = $request->nome;
        }

        if (isset($request->descricao)) {
            $servicos->descricao = $request->descricao;
        }

        if (isset($request->duracao)) {
            $servicos->duracao = $request->duracao;
        }

        if (isset($request->preco)) {
            $servicos->preco = $request->preco;
        }
        
        $servicos->update();

        return response()->json([
            'status' => true,
            'message' => 'Serviço atualizado.'
        ]);

      
        
    }


    public function retornarTodos(){
        $servicos = Servicos::all();
        if($servicos == null){
            return response()->json([
                'status'=>false,
                'message'=>'não foi encontrado'
            ]);
        }
        return response()->json([
            'status'=>true,
            'data'=>$servicos
        ]);
    }

}
