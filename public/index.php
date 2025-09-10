<?php
require __DIR__ . '/../vendor/autoload.php';

use Application\PartidoPolitico\Dto\Command\CreatePartidoPoliticoCommand;
use Application\PartidoPolitico\Port\In\CreatePartidoPoliticoUseCase;

$command = new CreatePartidoPoliticoCommand(
    'Partido Ejemplo',
    'Un futuro mejor',
    'Ana Pérez',
    'Luis Gómez',
    'María López',
    'CO',
    1,
    2,
    3,
    10,
    5
);

$useCase = new CreatePartidoPoliticoUseCase();
$partido = $useCase->execute($command);

echo "✅ Partido creado:\n";
echo "Nombre: " . $partido->getNombre()->value() . "\n";
echo "Eslogan: " . $partido->getEslogan() . "\n";
echo "Presidente: " . $partido->getPresidente() . "\n";
echo "Secretario: " . $partido->getSecretario() . "\n";
echo "Tesorero: " . $partido->getTesorero() . "\n";
echo "País: " . $partido->getPais()->value() . "\n";
echo "Presidentes: " . $partido->getNumPresidentes() . "\n";
echo "Gobernadores: " . $partido->getNumGobernadores() . "\n";
echo "Alcaldes: " . $partido->getNumAlcaldes() . "\n";
echo "Concejales: " . $partido->getNumConcejales() . "\n";
echo "Congresistas: " . $partido->getNumCongresistas() . "\n";

