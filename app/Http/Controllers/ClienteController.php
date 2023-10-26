<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Http\Requests\ClienteFormRequestUpdate;
use App\Http\Requests\CupdateFormRequest;
use App\Models\Cliente;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request)
    {
        $clientes = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $clientes
        ], 200);
    }

    public function pesquisarPorCep($cep)
    {
        $clientes = Cliente::where('cep', '=', $cep)->first();

        if ($clientes == null) {
            return response()->json([
                'status' => false,
                'data' => "Cep não encontrado"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }



    public function pesquisarPorNome(Request $request)
    {
        $clientes = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }
        return response()->json([
            'status' => false,
            'menssagens' => 'Não há resultados para pesquisa'
        ]);
    }

    public function delete2($id)
    {
        $clientes = Cliente::find($id);

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não Sencontrado"
            ]);
        }

        $clientes->delete();
        return response()->json([
            'status' => true,
            'message' => "Cliente excluido com sucesso"
        ]);


    }



    public function editar(ClienteFormRequestUpdate $request)
    {

        $clientes = Cliente::find($request->id);

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'message' => "Usuario não Sencontrado"
            ]);
        }

        if (isset($request->nome)) {
            $clientes->nome = $request->nome;
        }

        if (isset($request->celular)) {
            $clientes->celular = $request->celular;
        }

        if (isset($request->email)) {
            $clientes->email = $request->email;
        }

        if (isset($request->cpf)) {
            $clientes->cpf = $request->cpf;
        }

        if (isset($request->dataNacimento)) {
            $clientes->dataNacimento = $request->dataNacimento;
        }

        if (isset($request->cidade)) {
            $clientes->cidade = $request->cidade;
        }

        if (isset($request->estado)) {
            $clientes->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $clientes->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $clientes->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $clientes->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $clientes->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $clientes->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $clientes->complemento = $request->complemento;
        }
        if (isset($request->password)) {
            $clientes->password = $request->password;
        }




        $clientes->update();

        return response()->json([
            'status' => true,
            'message' => 'Serviço atualizado.'
        ]);



    }


    public function pesquisarPorCPF(Request $request)
    {
        $clientes = Cliente::where('cpf', 'like', '%' . $request->cpf . '%')->get();

        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }
        return response()->json([
            'status' => false,
            'menssagens' => 'Não há resultados para pesquisa'
        ]);
    }

    public function pesquisarPorEmail(Request $request)
    {
        $clientes = Cliente::where('email', 'like', '%' . $request->email . '%')->get();

        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }
        return response()->json([
            'status' => false,
            'menssagens' => 'Não há resultados para pesquisa'
        ]);
    }

    public function pesquisarPorCelular(Request $request)
    {
        $clientes = Cliente::where('celular', 'like', '%' . $request->celular . '%')->get();

        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }
        return response()->json([
            'status' => false,
            'menssagens' => 'Não há resultados para pesquisa'
        ]);
    }

    public function recuperarSenha(Request $request)
    {

        $profissional = Profissional::where('cpf', '=', $request->cpf)->first();

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'data' => "Profissional não encontrado"

            ]);
        }

        return response()->json([
            'status' => true,
            'password' => Hash::make($profissional->cpf)
        ]);

    }

    public function retornarTodos(){
        $clientes = Cliente::all();

        if($clientes == null){
            return response()->json([
                'status'=>false,
                'message'=>'não tem ninguem'
            ]);
        }
        return response()->json([
            'status'=>true,
            'data'=>$clientes
        ]);
    }


}