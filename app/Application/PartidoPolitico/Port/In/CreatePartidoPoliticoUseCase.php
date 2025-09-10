<?php
namespace Application\PartidoPolitico\Port\In;

use Application\PartidoPolitico\Dto\Command\CreatePartidoPoliticoCommand;
use App\Domain\PartidoPolitico\Entity\PartidoPolitico;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;

class CreatePartidoPoliticoUseCase
{
    public function execute(CreatePartidoPoliticoCommand $command): PartidoPolitico
    {
        return new PartidoPolitico(
            new PartidoPoliticoNombre($command->nombre),
            $command->eslogan,
            $command->presidente,
            $command->secretario,
            $command->tesorero,
            new PartidoPoliticoPais($command->pais),
            $command->num_presidentes,
            $command->num_gobernadores,
            $command->num_alcaldes,
            $command->num_concejales,
            $command->num_congresistas
        );
    }
}
