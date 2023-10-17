<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequestUpdate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public function rules(): array
    {
        return [
            'profissional' => '|integer',
            'cliente' => 'integer',
            'servico' => 'integer',
            'data_hora' => '|date',
            'tipo_pagamento' => '|max:20|min:3',
            'valor' => '|decimal:2,4'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'error' => $validator->errors()
            ])
        );
    }

    public function messages()
    {

        return [

        


            'cliente.integer' => 'Este campo deve ser inteiro',
            'servico.integer' => 'Este campo deve ser inteiro',

    
            'data_hora.date' => 'O campo data e hora está em formato inválido',

            'tipo_pagamento.required' => 'Coloque um metodo de pagamento',
            'tipo_pagamento.max' => 'Tipo de pagamento deve ter no maximo 20 caracteris',
            'tipo_pagamento.min' => 'Tipo de pagamento deve ter no minimo 3 caracteris',

        
            'valor.date' => 'O campo valor esta em informato inválido'
        ];
    }
}
