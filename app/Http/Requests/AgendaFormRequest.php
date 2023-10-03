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
            'profissional'=>'required|integer',
            'cliente'=>'integer',
            'servico'=>'integer',
            'data'=>'required|date',
            'hora'=>'required|time',
            'tipo_pagamento'=>'required|max:20|min:3',
            'valor'=>'required|decimal:2,4'
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
           
            
            'cliente.integer'=>'Este campo deve ser inteiro',
            'servico.integer'=>'Este campo deve ser inteiro',

            'data.required' =>  'data obrigatório',
            'data.date' => 'formato do campo data inválido',
            
            'tipo_pagamento.required'=>'Coloque um metodo de pagamento',
            'tipo_pagamento.max'=>'Tipo de pagamento deve ter no maximo 20 caracteris',
            'tipo_pagamento.min'=>'Tipo de pagamento deve ter no minimo 3 caracteris',

        ];
    }
}