<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;



    }

    /**
     * Get the validation rules that apply to the request.
     * protected $fillable = ['data', 'hora', 'nome', 'descricao', 'local'];
     * @return array
     */
    public function rules()
    {
        $rules = [
            'data' => ['required'],
            'hora' => ['required'],
            'nome' => ['required', 'min:3','max:20'],
            'descricao' => ['required', 'min:1','max:40'],
            'local' => ['required', 'min:1','max:60'],
        ];
    }

    public function messages(){
        return [
            'required'              => 'Esse campo é obrigatório.',
            'min'                   => 'O valor inserido é inferior ao valor minimo',
            'max'                   => 'O valor inserido é superior ao valor maximo'
        ];
    }
}
