<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5|',
            'celular' => 'required|max:11|min:10|',
            'email' => 'required|max:120|unique:profissionals,email|',
            'cpf' => 'required|max:11|min:11|unique:profissionals,cpf|',
            'dataNascimento'=>'required|date',
            'cidade' => 'required|max:120|',
            'estado' => 'required|max:2|min:2|',
            'pais' => 'required|max:80|',
            'rua' => 'required|max:120|',
            'numero' => 'required|max:10|',
            'bairro' => 'required|max:100|',
            'cep' => 'required|max:8|min:8|',
            'complemento' => 'max:150',
            'salario'=>'required|decimal:2,4',
            'password' => 'required|'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'success'=>false,
                'error'=>$validator->errors()
            ])
            );
    }

    public function messages(){
        return [
            'nome.required' => 'Preencha o campo nome',
            'nome.max' => 'Este campo deve conter no maximo 120 caractéris',
            'nome.min' => 'Este campo deve conter no minimo 5 caractéris',
            


            'celular.required' => 'Preencha o campo celular',
            'celular.max' => 'Este campo deve conter no maximo 11 caractéris',
            'celular.min' => 'Este campo deve conter no minimo 10 caractéris',
           

            'email.required' =>  'email obrigatório',
            'email.email' => 'formato inválido',
            'email.unique'=>'este email já esta cadastrado no sistema',
            'email.max' => 'Este campo deve conter no maximo 120 caractéris',

            'cpf.required' => 'preencha o campo',
            'cpf.max' => 'o campo deve conter 11 caracteris',
            'cpf.min' => 'o campo deve no minimo 11 caracteris',
            'cpf.unique'=>'O cpf já foi cadastrado no sistema',
           

            'dataNascimento.required'=>'Preencha esse campo com sua data de nascimento',
            'dataNascimento.date'=>'coloque sua data corretamente',

            'cidade.required' => 'Preencha o campo cidade',
            'cidade.max' => 'Este campo deve conter no maximo 120 caractéris',
            

            'estado.required' => 'Preencha o campo estado',
            'estado.max' => 'Este campo deve conter no maximo 2 caractéris',
            'estado.min' => 'Este campo deve conter no minimo 2 caractéris',
           
            'pais.required' => 'Preencha o campo pais',
            'pais.max' => 'Este campo deve conter no maximo 80 caractéris',
          
            'rua.required' => 'Preencha o campo rua',
            'rua.max' => 'Este campo deve conter no maximo 120 caractéris',
           

            'numero.required' => 'Preencha o campo numero',
            'numero.max' => 'Este campo deve conter no maximo 10 caractéris',
           

            'bairro.required' => 'Preencha o campo bairro',
            'bairro.max' => 'Este campo deve conter no maximo 100 caractéris',
            

            'cep.required' => 'Preencha o campo cep',
            'cep.max' => 'Este campo deve conter no maximo 8 caractéris',
            'cep.min' => 'o campo deve no minimo 8 caracteris',
           
            'complemento.max' => 'Este campo deve conter no maximo 150 caractéris',

            'salario.required'=>'O salario é obrigatório',
            'salario.decimal'=>'O campo deve ser preenchido com numeros decimais',

            'password.required' => 'Senha obrigatória'
        ];
    }
}
