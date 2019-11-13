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
        return true;



    }

    /**
     * Get the validation rules that apply to the request.
     * protected $fillable = ['data', 'hora', 'nome', 'descricao', 'local'];
     * @return array
     */
    public function rules()
    {
        return [
            'data' => ['required'],
            'hora' => ['required','date_format:H:i'],
            'nome' => ['required', 'min:3','max:20'],
            'descricao' => ['required', 'min:1','max:40'],
            'local' => ['required', 'min:1','max:60'],
        ];
    }

    public function messages(){
        return [
            'required'              => 'O campo :attribute é obrigatório.',
            'min'                   => 'O valor inserido no campo :attribute é inferior ao valor minimo',
            'max'                   => 'O valor inserido no campo :attribute é superior ao valor maximo'
        ];
    }
}
