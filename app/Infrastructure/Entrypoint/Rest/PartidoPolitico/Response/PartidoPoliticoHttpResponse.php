<?php
namespace App\Infrastructure\Entrypoint\Rest\PartidoPolitico\Response;
// Importamos la entidad PartidoPolitico
use App\Domain\PartidoPolitico\Entity\PartidoPolitico;
// Clase para transformar la entidad PartidoPolitico en una respuesta HTTP
class PartidoPoliticoHttpResponse
{
    public static function fromEntity(PartidoPolitico $partido): array
    {
        return [
            'nombre' => (string)$partido->getNombre(),
            'eslogan' => $partido->getEslogan(),
            'presidente' => $partido->getPresidente(),
            'secretario' => $partido->getSecretario(),
            'tesorero' => $partido->getTesorero(),
            'pais' => (string)$partido->getPais(),
            'num_presidentes' => $partido->getNumPresidentes(),
            'num_gobernadores' => $partido->getNumGobernadores(),
            'num_alcaldes' => $partido->getNumAlcaldes(),
            'num_concejales' => $partido->getNumConcejales(),
            'num_congresistas' => $partido->getNumCongresistas(),
        ];
    }
}
