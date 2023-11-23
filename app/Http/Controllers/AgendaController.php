<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\AgendaFormRequestUpdate;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgendaController extends Controller
{
    public function store(AgendaFormRequest $request)
    {
        $agenda = Agenda::create([
            'profissional_id' => $request->profissional_id,
            'data_hora' => $request->data_hora,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor' => $request->valor
        ]);

        return response()->json([
            "success" => true,
            "message" => " Agendamento feito com sucesso",
            "data" => $agenda
        ], 200);
    }

    public function pesquisarPorNome(Request $request)
    {
        $agenda = Agenda::where('profissional', 'like', '%' . $request->profissional . '%')->get();

        if (count($agenda) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agenda
            ]);
        }
        return response()->json([
            'status' => false,
            'menssagens' => 'Não há resultados para pesquisa'
        ]);
    }

    
    public function delete($id)
    {
        $agenda = Agenda::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não Sencontrado"
            ]);
        }

        $agenda->delete();
        return response()->json([
            'status' => true,
            'message' => "Cliente e servico cadastrado com sucesso"
        ]);


    }

    public function editar(AgendaFormRequestUpdate $request)
    {

        $agenda = Agenda::find($request->id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Usuario não Sencontrado"
            ]);
        }

        if (isset($request->profissional)) {
            $agenda->profissional = $request->profissional;
        }

        if (isset($request->cliente)) {
            $agenda->cliente = $request->cliente;
        }

        if (isset($request->servico)) {
            $agenda->servico = $request->servico;
        }

        if (isset($request->data_hora)) {
            $agenda->data_hora = $request->data_hora;
        }
        if (isset($request->tipo_pagamento)) {
            $agenda->tipo_pagamento = $request->tipo_pagamento;
        }
        if (isset($request->valor)) {
            $agenda->valor = $request->valor;
        }
       
        $agenda->update();

        return response()->json([
            'status' => true,
            'message' => 'agenda atualizado.'
        ]);



    }

    public function retornarTodos(){
        $agenda = Agenda::all();


        if(count($agenda)==0){
            return response()->json([
                'status'=>false,
                'message'=>'Agendamento não foi concluido'
            ]);
        }

        return response()->json([
            'status'=>true,
            'data'=>$agenda
        ]);
    }

    public function pesquisarPorId($id){
        $agenda =Cliente::find($id);


        if($clientes == null){
            return response()->json([
                'status'=>false,
                'message'=>"agenda não encontrado"
            ]);
        }

        return response()->json([
            'status'=>true,
            'data'=>$agenda
        ]);
    }


}
