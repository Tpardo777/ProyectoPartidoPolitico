<?php
namespace App\Domain\PartidoPolitico\ValueObject;
//  ValueObject PartidoPoliticoNombre

use App\Domain\PartidoPolitico\Exception\PartidoPoliticoDomainException;
// Aquí llamamos la excepción PartidoPoliticoDomainException
class PartidoPoliticoNombre
// Aquí definimos el Value Object PartidoPoliticoNombre
{
    private string $nombre;
    // Nombre del PartidoPolítico

    public function __construct(string $nombre)
    // Aquí validamos y asignamos el nombre
    {
        if (empty(trim($nombre))) {
            throw new PartidoPoliticoDomainException("El nombre no puede estar vacío.");
        }
        $this->nombre = $nombre;
    } // Aquí asignamos el nombre validado al atributo de la clase

    public function value(): string
    // Método para obtener el valor del nombre
    {
        return $this->nombre;
    } // Aquí retornamos el nombre

    public function __toString(): string
    // Método para representar el nombre como cadena
    {
        return $this->nombre;
        // Aquí retornamos el nombre como cadena
    }
}

