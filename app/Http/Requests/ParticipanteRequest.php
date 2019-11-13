<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipanteRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()){
            case 'POST':{
                return [
                    'nome'             => 'string|required',
                    'rg'               => 'required|',
                    'cpf'              => 'required|unique:participante,cpf,'.$this->route('participante'),
                    'email'            => 'required|email|unique:participante,email,'.$this->route('participante'),
                    'telefone'         => 'required|',
                    'data_nascimento'  => 'required',
                    'organizacao'      => 'required|string'

                ];
            }
            case 'PUT':{
                    return [
                        'nome'             => 'string|required',
                        'rg'               => 'required|',
                        'cpf'              => 'required|unique:participante,cpf,'.$this->route('participante'),
                        'email'            => 'required|email|unique:participante,email,'.$this->route('participante'),
                        'telefone'         => 'required|',
                        'data_nascimento'  => 'required',
                        'organizacao'      => 'required|string'
                    ];
            }
        };
    }

    public function messages(){
        return[
            'data_nascimento'     => 'O campo data deve ter o formato dd/mm/aaaa',
            'required'            => 'O campo :attribute é obrigatório!',
            'min'                 => 'Minimo de :min caracteres!',
            'max'                 => 'Máximo de :max caracteres!',
            'unique'              => ':attribute já cadastrado!',
        ];
    }
}
