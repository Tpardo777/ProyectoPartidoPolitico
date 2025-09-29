<?php

namespace App\Infrastructure\Entrypoint\Rest\PartidoPolitico\Mapper;
// Importamos los DTO Commands
use Application\PartidoPolitico\Dto\Command\CreatePartidoPoliticoCommand;
// Mapper para convertir datos HTTP a comandos de aplicación
class PartidoPoliticoHttpMapper
{
    /**
     * Convierte una request HTTP (por ejemplo $_POST) en un comando para el caso de uso
     */
    public static function fromHttpRequest(array $request): CreatePartidoPoliticoCommand
    {
        return new CreatePartidoPoliticoCommand(
            $request['nombre'] ?? '',
            $request['eslogan'] ?? '',
            $request['presidente'] ?? '',
            $request['secretario'] ?? '',
            $request['tesorero'] ?? '',
            $request['pais'] ?? '',
            (int)($request['numPresidentes'] ?? 0),
            (int)($request['numGobernadores'] ?? 0),
            (int)($request['numAlcaldes'] ?? 0),
            (int)($request['numConcejales'] ?? 0),
            (int)($request['numCongresistas'] ?? 0)
        );
    }
}
