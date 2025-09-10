<?php

namespace App\Domain\PartidoPolitico\ValueObject;

use App\Domain\PartidoPolitico\Exception\DomainException;

class PartidoPoliticoNombre
{
    private string $valor;

    public function __construct(string $valor)
    {
        if (empty(trim($valor))) {
            throw new DomainException("El nombre no puede estar vacío");
        }
        $this->valor = $valor;
    }

    public function value(): string
    {
        return $this->valor;
    }
}
