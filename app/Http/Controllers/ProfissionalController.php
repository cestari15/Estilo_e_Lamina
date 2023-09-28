<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\ProfissionalFormRequestUpdate;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request)
    {
        $profissional = Profissional::create([
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
            'salario'=>$request->salario,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "Profissional cadastrado com sucesso",
            "data" => $profissional
        ], 200);
    }


    public function pesquisarPorNome(Request $request)
    {
        $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status'=>false,
            'menssagens'=>'Não há resultados para pesquisa'
        ]);
    }


    public function delete($id)
    {
        $profissional= Profissional::find($id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "profissional não Sencontrado"
            ]);
        }

        $profissional->delete();
        return response()->json([
            'status' => true,
            'message' => "profissional excluido com sucesso"
        ]);

       
    }


    public function editar(ProfissionalFormRequestUpdate $request)

    {
        
        $profissional = Profissional::find($request->id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Usuario não Sencontrado"
            ]);
        }

        if (isset($request->nome)) {
            $profissional->nome = $request->nome;
        }

        if (isset($request->celular)) {
            $profissional->celular = $request->celular;
        }

        if (isset($request->email)) {
            $profissional->email = $request->email;
        }

        if (isset($request->cpf)) {
            $profissional->cpf = $request->cpf;
        }

        if (isset($request->dataNacimento)) {
            $profissional->dataNacimento = $request->dataNacimento;
        }

        if (isset($request->cidade)) {
            $profissional->cidade = $request->cidade;
        }

        if (isset($request->estado)) {
            $profissional->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $profissional->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissional->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $profissional->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $profissional->cep = $request->cep;
        }
        if (isset($request->complemento)) {
            $profissional->complemento = $request->complemento;
        }

        if (isset($request->salario)) {
            $profissional->salario = $request->salario;
        }

        if (isset($request->password)) {
            $profissional->password = $request->password;
        }



        
        $profissional->update();

        return response()->json([
            'status' => true,
            'message' => 'Serviço atualizado.'
        ]);

      
        
    }

    public function pesquisarPorCPF(Request $request)
    {
        $profissional = Profissional::where('cpf', 'like', '%' . $request->cpf . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status'=>false,
            'menssagens'=>'Não há resultados para pesquisa'
        ]);
    }

    public function pesquisarPorEmail(Request $request)
    {
        $profissional = Profissional::where('email', 'like', '%' . $request->email . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status'=>false,
            'menssagens'=>'Não há resultados para pesquisa'
        ]);
    }

    public function pesquisarPorCelular(Request $request)
    {
        $profissional = Profissional::where('celular', 'like', '%' . $request->celular . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status'=>false,
            'menssagens'=>'Não há resultados para pesquisa'
        ]);
    }
    public function pesquisarPorCep($cep){
        $profissional = Profissional::where('cep', '=', $cep)->first();

        if($profissional == null){
            return response()->json([
                'status'=>false,
                'data'=>"Cep não encontrado"
            ]);
        }

        return response()->json([
            'status'=>true,
            'data'=>$profissional
        ]);
    }

   
    public function recuperarSenha(Request $request){
        $profissional = Profissional::where('cpf','=', $request->cpf)->first();
      
       if(!isset($profissional)){
        return response()->json([
            'status'=>false,
            'data'=>"Profissional não encontrado"
          
        ]);
       } 

        return response()->json([
            'status'=>true,
            'password'=>Hash::make($profissional->cpf)
        ]);     
        
    }

}
