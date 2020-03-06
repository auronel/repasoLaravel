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
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'perfil' => ['nullable', 'image']
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Tienes que introducir un nombre',
            'apellidos.required' => 'Tienes que introducir un apellido',
            'perfil.image' => 'Debe ser de tipo imágen'
        ];
    }
}
