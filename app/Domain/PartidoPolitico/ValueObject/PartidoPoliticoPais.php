<?php
namespace App\Domain\PartidoPolitico\ValueObject;
//  Value Object PartidoPoliticoPais

use App\Domain\PartidoPolitico\Exception\PartidoPoliticoDomainException;
// Aquí llamamos la excepción PartidoPoliticoDomainException

class PartidoPoliticoPais
// Aquí definimos el Value Object PartidoPoliticoPais
{
    private string $pais;
    // País del PartidoPolítico

    public function __construct(string $pais)
    // Aquí validamos y asignamos el país
    {
        $pais = trim($pais);
        //

        if (empty($pais)) {
            throw new PartidoPoliticoDomainException("El país no puede estar vacío.");
        }// Aquí validamos que el país no esté vacío

        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $pais)) {
            throw new PartidoPoliticoDomainException("El país solo puede contener letras y espacios.");
        }// Aquí validamos que el país solo contenga letras y espacios

        if (strlen($pais) < 2 || strlen($pais) > 50) {
            throw new PartidoPoliticoDomainException("El país debe tener entre 2 y 50 caracteres.");
        } // Aquí validamos que el país tenga entre 2 y 50 caracteres

        $this->pais = $pais; // Aquí asignamos el país validado al atributo de la clase
    }

    public function value(): string
    {
        return $this->pais;
    } // Aquí retornamos el país

    public function __toString(): string
    {
        return $this->pais;
    } // Aquí retornamos el país como cadena
}
