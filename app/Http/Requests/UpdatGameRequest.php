<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatGameRequest extends FormRequest
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
            'game_name'=>'required|min:10|max:255',
            'game_phrase'=>'required|min:10|max:255',
            'theme_highlight_text'=>'required|min:10|max:255',
            'background_image'=>'image'

        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute é de preenchimento obrigatorio.',
            'min'=>':attribute deve conter uma quantidade maior de caracteres.',
            'max'=>':attribute não pode conter mais que 250 caracteres.',
            'image'=>':attribute invalido.'
        ];
    }
}
