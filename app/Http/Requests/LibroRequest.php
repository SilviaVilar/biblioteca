<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'titulo' => 'required|min:3',
		    'editorial' => 'required',
		    'precio' => 'required|numeric|min:0'
        ];
    }

    public function messages(){
        return [
            'titulo.min:3' => 'El título debe tener como mínimo 3 caracteres',
            'titulo.required' => 'El título es obligatorio',
            'editorial.required' => 'La editorial es obligatoria',
            'precio.required' => 'El precio es obligatorio',
            
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min:0' => 'El precio debe ser un número igual o mayor que cero'
        ];
    }
}
