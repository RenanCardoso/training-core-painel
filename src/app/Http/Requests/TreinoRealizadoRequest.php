<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreinoRealizadoRequest extends FormRequest
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
//            'ficha_de_treino_id' => 'required',
//            'codigo_treino' => 'required',
//            'fltreinododia' => 'required',
//            'qtdrealizado' => 'required',
//            'datarealizado' => 'required',
//            'status' => 'required',
        ];
    }
}
