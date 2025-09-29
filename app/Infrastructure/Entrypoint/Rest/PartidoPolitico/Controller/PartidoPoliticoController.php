<?php
/**
 * Controlador para gestionar partidos políticos
 * Maneja la creación, actualización, eliminación y consulta de partidos políticos
 */

namespace App\Infrastructure\Controller;
// Importamos los casos de uso necesarios   

use Application\PartidoPolitico\Port\In\CreatePartidoPoliticoUseCase;
use Application\PartidoPolitico\Port\In\UpdatePartidoPoliticoUseCase;
use Application\PartidoPolitico\Port\In\DeletePartidoPoliticoUseCase;
use Application\PartidoPolitico\Port\In\GetPartidoPoliticoByIdUseCase;
use Application\PartidoPolitico\Port\In\ListPartidoPoliticoUseCase;
// Importamos los DTO Commands
use Application\PartidoPolitico\Dto\Command\CreatePartidoPoliticoCommand;
use Application\PartidoPolitico\Dto\Command\UpdatePartidoPoliticoCommand;

class PartidoPoliticoController
// Controlador para gestionar partidos políticos
{
    private CreatePartidoPoliticoUseCase $createUseCase;// Caso de uso para crear partidos
    private UpdatePartidoPoliticoUseCase $updateUseCase; // Caso de uso para actualizar partidos
    private DeletePartidoPoliticoUseCase $deleteUseCase; // Caso de uso para eliminar partidos
    private GetPartidoPoliticoByIdUseCase $getByIdUseCase;
    private ListPartidoPoliticoUseCase $listUseCase;

    // Inyección de dependencias a través del constructor
    public function __construct(
        CreatePartidoPoliticoUseCase $createUseCase,
        UpdatePartidoPoliticoUseCase $updateUseCase,
        DeletePartidoPoliticoUseCase $deleteUseCase,
        GetPartidoPoliticoByIdUseCase $getByIdUseCase,
        ListPartidoPoliticoUseCase $listUseCase
    ) {
        
        $this->createUseCase   = $createUseCase;
        $this->updateUseCase   = $updateUseCase;
        $this->deleteUseCase   = $deleteUseCase;
        $this->getByIdUseCase  = $getByIdUseCase;
        $this->listUseCase     = $listUseCase;
    }

    /**
     * Crear un partido político
     */
    public function create(array $data): string
    {
        try {
            $this->validateData($data);

            $command = new CreatePartidoPoliticoCommand(
                $data['nombre'],
                $data['eslogan'],
                $data['presidente'],
                $data['secretario'],
                $data['tesorero'],
                $data['pais'],
                (int)$data['num_presidentes'],
                (int)$data['num_gobernadores'],
                (int)$data['num_alcaldes'],
                (int)$data['num_concejales'],
                (int)$data['num_congresistas']
            );

            $this->createUseCase->execute($command);

            return "✅ Partido creado correctamente.";
        } catch (\Exception $e) {
            return "❌ Error al crear partido: " . $e->getMessage();
        }
    }

    /**
     * Actualizar un partido político
     */
    public function update(int $id, array $data): string
    {
        try {
            $this->validateData($data);

            $command = new UpdatePartidoPoliticoCommand(
                $id,
                $data['nombre'],
                $data['eslogan'],
                $data['presidente'],
                $data['secretario'],
                $data['tesorero'],
                $data['pais'],
                (int)$data['num_presidentes'],
                (int)$data['num_gobernadores'],
                (int)$data['num_alcaldes'],
                (int)$data['num_concejales'],
                (int)$data['num_congresistas']
            );

            $this->updateUseCase->execute($command);

            return "✅ Partido actualizado correctamente.";
        } catch (\Exception $e) {
            return "❌ Error al actualizar partido: " . $e->getMessage();
        }
    }

    /**
     * Eliminar un partido político
     */
    public function delete(int $id): string
    {
        try {
            $this->deleteUseCase->execute($id);
            return "🗑️ Partido eliminado correctamente.";
        } catch (\Exception $e) {
            return "❌ Error al eliminar partido: " . $e->getMessage();
        }
    }

    /**
     * Obtener un partido político por su ID
     */
    public function getById(int $id)
    {
        try {
            $partido = $this->getByIdUseCase->execute($id);
            if (!$partido) {
                throw new \Exception("Partido no encontrado.");
            }
            return $partido;
        } catch (\Exception $e) {
            return "❌ Error al obtener partido: " . $e->getMessage();
        }
    }

    /**
     * Listar todos los partidos políticos
     */
    public function listAll(): array
    {
        return $this->listUseCase->execute();
    }

    /**
     * Validar que los datos requeridos estén presentes
     */
    private function validateData(array $data): void
    {
        $required = [
            'nombre', 'eslogan', 'presidente', 'secretario', 'tesorero', 'pais',
            'num_presidentes', 'num_gobernadores', 'num_alcaldes',
            'num_concejales', 'num_congresistas'
        ];

        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                throw new \InvalidArgumentException("Falta el campo requerido: $field");
            }
        }
    }
}
