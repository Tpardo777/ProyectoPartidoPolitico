<?php
namespace Application\PartidoPolitico\Dto\Command;

class CreatePartidoPoliticoCommand
{
    public string $nombre;
    public string $eslogan;
    public string $presidente;
    public string $secretario;
    public string $tesorero;
    public string $pais;
    public int $num_presidentes;
    public int $num_gobernadores;
    public int $num_alcaldes;
    public int $num_concejales;
    public int $num_congresistas;

    public function __construct(
        string $nombre,
        string $eslogan,
        string $presidente,
        string $secretario,
        string $tesorero,
        string $pais,
        int $num_presidentes,
        int $num_gobernadores,
        int $num_alcaldes,
        int $num_concejales,
        int $num_congresistas
    ) {
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
}
