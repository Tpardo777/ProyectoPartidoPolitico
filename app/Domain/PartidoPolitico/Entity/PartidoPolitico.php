<?php

namespace App\Domain\PartidoPolitico\Entity;

use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;
use App\Domain\PartidoPolitico\Exception\PartidoPoliticoDomainException;

class PartidoPolitico
{
    private PartidoPoliticoNombre $nombre;
    private string $eslogan;
    private string $presidente;
    private string $secretario;
    private string $tesorero;
    private PartidoPoliticoPais $pais;
    private int $numPresidentes;
    private int $numGobernadores;
    private int $numAlcaldes;
    private int $numConcejales;
    private int $numCongresistas;

    public function __construct(
        PartidoPoliticoNombre $nombre,
        string $eslogan,
        string $presidente,
        string $secretario,
        string $tesorero,
        PartidoPoliticoPais $pais,
        int $numPresidentes,
        int $numGobernadores,
        int $numAlcaldes,
        int $numConcejales,
        int $numCongresistas
    ) {
        if ($numPresidentes < 0 || $numGobernadores < 0 || $numAlcaldes < 0 || $numConcejales < 0 || $numCongresistas < 0) {
            throw new PartidoPoliticoDomainException("Los números de cargos no pueden ser negativos");
        }

        $this->nombre = $nombre;
        $this->eslogan = $eslogan;
        $this->presidente = $presidente;
        $this->secretario = $secretario;
        $this->tesorero = $tesorero;
        $this->pais = $pais;
        $this->numPresidentes = $numPresidentes;
        $this->numGobernadores = $numGobernadores;
        $this->numAlcaldes = $numAlcaldes;
        $this->numConcejales = $numConcejales;
        $this->numCongresistas = $numCongresistas;
    }

    public function getNombre(): PartidoPoliticoNombre
    {
        return $this->nombre;
    }

    public function getPais(): PartidoPoliticoPais
    {
        return $this->pais;
    }
    public function getEslogan(): string
{
    return $this->eslogan;
}

public function getPresidente(): string
{
    return $this->presidente;
}

public function getSecretario(): string
{
    return $this->secretario;
}

public function getTesorero(): string
{
    return $this->tesorero;
}

public function getNumPresidentes(): int
{
    return $this->numPresidentes;
}

public function getNumGobernadores(): int
{
    return $this->numGobernadores;
}

public function getNumAlcaldes(): int
{
    return $this->numAlcaldes;
}

public function getNumConcejales(): int
{
    return $this->numConcejales;
}

public function getNumCongresistas(): int
{
    return $this->numCongresistas;
}


   }
