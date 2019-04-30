<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVoluntarioRequest extends FormRequest
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
            'nombre1'=>'required','apellido1'=>'required',
            'correo'=>'required|email',
            'direccion'=>'required',
            'contrasena'=>'required',
            'idRol'=>'required|integer'
        ];
    }
}
