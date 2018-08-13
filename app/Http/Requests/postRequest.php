<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\Request;

class postRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            //
            'descricao' => 'required',
            'titulo' => array('max:20', 'required'),
            'slug' => 'unique',
            
        ];
    }

    public function messages(){
        return [
            'titulo.required' => 'Insira um titulo',
            'titulo.max' => 'O título deve conter no máximo 20 caracteres',
            'descricao.required' => 'Insira uma descricao',
            'slug.unique' => 'Titulo já existe',
        ];
    }
}
