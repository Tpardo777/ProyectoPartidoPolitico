<?php
namespace App\Domain\PartidoPolitico\ValueObject;
// Value Object PartidoPoliticoEslogan
use App\Domain\PartidoPolitico\Exception\PartidoPoliticoDomainException;
// Aquí llamamos la excepción PartidoPoliticoDomainException

class PartidoPoliticoEslogan
// Aquí definimos el Value Object PartidoPoliticoEslogan
{
    private string $eslogan;
    // Eslogan del PartidoPolítico

    public function __construct(string $eslogan)
    // Aquí validamos y asignamos el eslogan
    {
        if (empty(trim($eslogan))) {
            throw new PartidoPoliticoDomainException("El eslogan no puede estar vacío.");
        }// Aquí validamos que el eslogan no esté vacío

        if (strlen($eslogan) < 3) {
            throw new PartidoPoliticoDomainException("El eslogan debe tener al menos 3 caracteres.");
        } // Aquí validamos que el eslogan tenga al menos 3 caracteres

        $this->eslogan = $eslogan;
        // Aquí asignamos el eslogan validado al atributo de la clase
    }

    public function value(): string
    // Método para obtener el valor del eslogan
    {
        return $this->eslogan;
      // Aquí retornamos el eslogan
    }

    public function __toString(): string
    // Método para representar el eslogan como cadena
    {
        return $this->eslogan;
        // Aquí retornamos el eslogan como cadena
    }
}
