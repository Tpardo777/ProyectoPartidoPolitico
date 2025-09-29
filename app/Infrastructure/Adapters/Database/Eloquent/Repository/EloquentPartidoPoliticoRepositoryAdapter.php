<?php
namespace App\Infrastructure\Adapters\Database\Eloquent\Repository;

use Application\PartidoPolitico\Port\Out\PartidoPoliticoRepositoryPort;
use App\Domain\PartidoPolitico\Entity\PartidoPolitico;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;
use App\Infrastructure\Adapters\Database\Eloquent\Model\PartidoPoliticoModel;

class EloquentPartidoPoliticoRepositoryAdapter implements PartidoPoliticoRepositoryPort
{
    public function save(PartidoPolitico $partido): void
    {
        PartidoPoliticoModel::create([
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
        ]);
    }

    public function update(int $id, PartidoPolitico $partido): void
    {
        $model = PartidoPoliticoModel::findOrFail($id);
        $model->update([
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
        ]);
    }

    public function delete(int $id): void
    {
        PartidoPoliticoModel::destroy($id);
    }

    public function findById(int $id): ?PartidoPolitico
    {
        $m = PartidoPoliticoModel::find($id);
        if (!$m) return null;

        return new PartidoPolitico(
            new PartidoPoliticoNombre($m->nombre),
            $m->eslogan,
            $m->presidente,
            $m->secretario,
            $m->tesorero,
            new PartidoPoliticoPais($m->pais),
            (int)$m->num_presidentes,
            (int)$m->num_gobernadores,
            (int)$m->num_alcaldes,
            (int)$m->num_concejales,
            (int)$m->num_congresistas
        );
    }

    public function findAll(): array
    {
        $rows = PartidoPoliticoModel::orderBy('id','desc')->get();
        $out = [];
        foreach ($rows as $m) {
            $out[] = new PartidoPolitico(
                new PartidoPoliticoNombre($m->nombre),
                $m->eslogan,
                $m->presidente,
                $m->secretario,
                $m->tesorero,
                new PartidoPoliticoPais($m->pais),
                (int)$m->num_presidentes,
                (int)$m->num_gobernadores,
                (int)$m->num_alcaldes,
                (int)$m->num_concejales,
                (int)$m->num_congresistas
            );
        }
        return $out;
    }
}
