<?php

namespace App\Domain\PartidoPolitico\ValueObject;

use App\Domain\PartidoPolitico\Exception\DomainException;

class PartidoPoliticoPais
{
    private string $codigo;

    public function __construct(string $codigo)
    {
        if (empty(trim($codigo))) {
            throw new DomainException("El país no puede estar vacío");
        }
        $this->codigo = strtoupper($codigo);
    }

    public function value(): string
    {
        return $this->codigo;
    }
}
