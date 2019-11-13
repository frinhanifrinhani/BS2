<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:80',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|max:1',
            'estado' => 'max:2',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo :attribute deve ser preenchido',
            'nome.max' => 'O campo :attribute deve ser preenchido com no máximo 80 caracteres',

            'data_nascimento.required' => 'O campo data de nascimento deve ser preenchido',
            'data_nascimento.date' => 'O campo :attribute deve ser preenchido com uma data válida',

            'sexo.required' => 'O campo :attribute deve ser preenchido',
            'sexo.max' => 'O campo :attribute deve ser preenchido com apenas 1 caractere, M para Masculino ou F para Feminino',

            'estado.max' => 'O campo :attribute deve ser preenchido com 2 caractere'
        ];
    }

}
