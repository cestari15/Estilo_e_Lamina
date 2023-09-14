<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
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
            'nome' => 'required|max:80|min:5|unique:servicos,nome',
            'descricao' => 'required|max:200|min:10',
            'duracao' => 'required|numeric',
            'preco' => 'required|decimal:2,4'

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'error' => $validator->errors()
            ])
        );
    }

    public function messages()
    {
        return  [
            'nome.required' => 'Preencha o campo nome',
            'nome.max' => 'Este campo deve conter no maximo 80 caractéris',
            'nome.min' => 'Este campo deve conter no minimo 5 caractéris',
            'nome.unique' => 'Este nome já esta cadastrado',
            'nome.string' => 'Este campo só aceita letras',
            'descricao.required' => 'Preencha o campo descricao',
            'descricao.max' => 'Este campo deve conter no maximo 200 caractéris',
            'descricao.min' => 'Este campo deve conter no minimo 10 caractéris',
            'duracao.required' => 'Preencha o campo duracao',
            'duracao.numeric' => 'Este campo recebe apenas numeros',
            'preco.required' => 'Preencha o campo preco',
            'preco.decimal' => 'Este campo recebe apenas numeros decimais ',
        ];
    }
}
