<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlojamientoRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            return [
                'nombre' => ['required', 'unique:alojamientos,nombre,' . $this->alojamiento->id],
                'provincias' => ['required'],
                'foto' => ['image']
            ];
        } else {
            return [
                'nombre' => ['required', 'unique:alojamientos,nombre'],
                'provincias' => ['required'],
                'foto' => ['image']
            ];
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debes introducir un alojamiento',
            'nombre.unique' => 'Este alojamiento ya existe',
            'provincias.required' => 'Debes seleccionar una provincia',
            'foto.image' => 'El archivo tiene que ser de tipo imagen'
        ];
    }
}
