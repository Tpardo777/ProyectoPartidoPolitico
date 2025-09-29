<?php
namespace App\Infrastructure\Entrypoint\Rest\PartidoPolitico\Request;
// Importamos la clase base de las requests 
use Illuminate\Foundation\Http\FormRequest;

class DeletePartidoPoliticoHttpRequest extends FormRequest
// Clase para manejar la validación de la request HTTP para eliminar un partido político
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'id' => 'required|integer|exists:partido_politico,id'
        ];
    }
}
