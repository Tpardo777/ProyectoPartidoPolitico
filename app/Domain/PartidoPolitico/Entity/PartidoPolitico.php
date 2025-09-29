<?php
namespace App\Domain\PartidoPolitico\Entity;
// Aquí definimos la entidad PartidoPolitico

use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
// Aquí llamamos el ValueObject PartidoPoliticoNombre
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;
// Aquí llamamos el ValueObject PartidoPoliticoPais
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoEslogan;
// Aquí llamamos el ValueObject PartidoPoliticoEslogan

class PartidoPolitico
// Aquí definimos la entidad PartidoPolitico
{
    private ?int $id; // ID del PartidoPolítico, puede ser nulo para nuevos registros
    private PartidoPoliticoNombre $nombre; // Nombre del PartidoPolítico
    private PartidoPoliticoEslogan $eslogan;
    private string $presidente;
    private string $secretario;
    private string $tesorero;
    private PartidoPoliticoPais $pais;
    private int $num_presidentes;
    private int $num_gobernadores;
    private int $num_alcaldes;
    private int $num_concejales;
    private int $num_congresistas;

    // Constructor para inicializar todos los atributos
    public function __construct(
        PartidoPoliticoNombre $nombre,
        PartidoPoliticoEslogan $eslogan,
        string $presidente,
        string $secretario,
        string $tesorero,
        PartidoPoliticoPais $pais,
        int $num_presidentes = 0,
        int $num_gobernadores = 0,
        int $num_alcaldes = 0,
        int $num_concejales = 0,
        int $num_congresistas = 0,
        ?int $id = null
    ) { // Aquí asignamos todos los valores recibidos a los atributos de la clase
        $this->id = $id;
        $this->nombre = $nombre;
        $this->eslogan = $eslogan;
        $this->presidente = $presidente;
        $this->secretario = $secretario;
        $this->tesorero = $tesorero;
        $this->pais = $pais;
        $this->num_presidentes = $num_presidentes;
        $this->num_gobernadores = $num_gobernadores;
        $this->num_alcaldes = $num_alcaldes;
        $this->num_concejales = $num_concejales;
        $this->num_congresistas = $num_congresistas;
    }

    // Getters para acceder a los atributos de la entidad
    public function getId(): ?int { return $this->id; } 
    public function getNombre(): PartidoPoliticoNombre { return $this->nombre; } 
    public function getEslogan(): PartidoPoliticoEslogan { return $this->eslogan; }
    public function getPresidente(): string { return $this->presidente; }
    public function getSecretario(): string { return $this->secretario; }
    public function getTesorero(): string { return $this->tesorero; }
    public function getPais(): PartidoPoliticoPais { return $this->pais; }
    public function getNumPresidentes(): int { return $this->num_presidentes; }
    public function getNumGobernadores(): int { return $this->num_gobernadores; }
    public function getNumAlcaldes(): int { return $this->num_alcaldes; }
    public function getNumConcejales(): int { return $this->num_concejales; }
    public function getNumCongresistas(): int { return $this->num_congresistas; }
}
