<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
            'frase_characters'=>'required|min:10|max:100',
            'characters_description'=>'required|min:10|max:250',
            'characters_name'=>'required|min:10|max:255',
            'image'=>'required|image'           

        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute é de preenchimento obrigatorio.',
            'min'=>':attribute não pode conter menos que 10 caracteres',
            'max'=>':attribute não pode conter mais que 250 caracteres'
        ];
    }
}
