<?php

namespace App\Http\Requests;

use App\Http\Requests\Api\ValidacaoDeEntradaUsuario;

class ValidarUsuarioRequest extends ValidacaoDeEntradaUsuario
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
            'nome' => 'required | min:6 | string',
            'email' => 'required | email| string | unique:pessoas,email',
            'nacionalidade' => 'required | min:6 | string',
            'profissao' => 'required | min:6 | string',
            'data_nascimento' => 'required|date',
        ];
    }
}