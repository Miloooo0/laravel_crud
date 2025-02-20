<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\isNan;

class UpdateAlumnoRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que todos los usuarios puedan usar este request
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'dni' => ['required', 'string', 'size:9', function ($value, $fail) {
                $numero = substr($value, 0, 8);
                $letra = strtoupper(substr($value, -1));
                $letrasDni = "TRWAGMYFPDXBNJZSQVHLCKE";
                if (is_numeric($numero)) {
                    if ($letra !== $letrasDni[$numero % 23]) {
                        $fail("El DNI no es válido.");
                    }
                }
            }],
            'email' => 'required|email|max:255',
            'fechaNacimiento' => 'required|date|after:1980-01-01',
            'idiomas' => 'Numeric|Between:1,5',
        ];
    }

    public function messages()
    {
        return [
            // 'nombre.required' => 'El nombre es obligatorio.', ESTOS SON OMISIBLES POR SER POR DEFECTO
            // 'dni.required' => 'El DNI es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'fechaNacimiento.before' => 'La fecha de nacimiento debe ser antes de 1980.',
            'dni' => 'El DNI no es válido. El formato debe ser 8 números y una letra',
            'idiomas' => 'Idiomas debe contener un valor entre 1 y 5',
        ];
    }
}
