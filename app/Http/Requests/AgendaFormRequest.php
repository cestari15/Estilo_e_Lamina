<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id'=>'required|integer',
            'data_hora'=>'required|date',
           // 'tipo_pagamento'=>'required|max:20|min:3',
           // 'valor'=>'required|decimal:2,4'
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
            'profissional.required' => 'Preencha o campo nome',
           

            'data_hora.required'=>'O campo data e hora é obrigatório',
            'data_hora.date'=>'O campo data e hora está em formato inválido',
            
            'tipo_pagamento.required'=>'Coloque um metodo de pagamento',
            'tipo_pagamento.max'=>'Tipo de pagamento deve ter no maximo 20 caracteris',
            'tipo_pagamento.min'=>'Tipo de pagamento deve ter no minimo 3 caracteris',

            'valor.required'=>'O campo valor é onrigatório',
            'valor.date'=>'O campo valor esta em informato inválido',
            'valor.decimal'=>'O campo valorsó aceita valores decimais'

        ];
    }
}
