<?php
namespace App\Infrastructure\Entrypoint\Rest\PartidoPolitico\Request;
// Importamos la clase base de las requests
use Illuminate\Foundation\Http\FormRequest;
// Clase para manejar la validación de la request HTTP para actualizar un partido político
class UpdatePartidoPoliticoHttpRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'eslogan' => 'nullable|string|max:150',
            'presidente' => 'required|string|max:100',
            'secretario' => 'required|string|max:100',
            'tesorero' => 'required|string|max:100',
            'pais' => 'required|string|max:50',
            'num_presidentes' => 'nullable|integer|min:0',
            'num_gobernadores' => 'nullable|integer|min:0',
            'num_alcaldes' => 'nullable|integer|min:0',
            'num_concejales' => 'nullable|integer|min:0',
            'num_congresistas' => 'nullable|integer|min:0',
        ];
    }
}
