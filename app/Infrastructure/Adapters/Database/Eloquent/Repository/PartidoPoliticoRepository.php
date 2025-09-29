<?php
namespace App\Infrastructure\Adapters\Database\Eloquent\Repository;

use Application\PartidoPolitico\Port\Out\PartidoPoliticoRepositoryPort;
use App\Domain\PartidoPolitico\Entity\PartidoPolitico;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoEslogan;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;
use mysqli;

class PartidoPoliticoRepository implements PartidoPoliticoRepositoryPort
{
    private mysqli $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "partidoPolitico");

        if ($this->conn->connect_error) {
            die("❌ Error de conexión: " . $this->conn->connect_error);
        }
    }

    // CREATE
    public function save(PartidoPolitico $partido): void
    {
        $stmt = $this->conn->prepare("
            INSERT INTO partido_politico 
            (nombre, eslogan, presidente, secretario, tesorero, pais, 
             num_presidentes, num_gobernadores, num_alcaldes, num_concejales, num_congresistas) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $nombre          = (string)$partido->getNombre();
        $eslogan         = (string)$partido->getEslogan();
        $presidente      = $partido->getPresidente();
        $secretario      = $partido->getSecretario();
        $tesorero        = $partido->getTesorero();
        $pais            = (string)$partido->getPais();
        $num_presidentes = $partido->getNumPresidentes();
        $num_gobernadores= $partido->getNumGobernadores();
        $num_alcaldes    = $partido->getNumAlcaldes();
        $num_concejales  = $partido->getNumConcejales();
        $num_congresistas= $partido->getNumCongresistas();

        $stmt->bind_param(
            "ssssssiiiii",
            $nombre,
            $eslogan,
            $presidente,
            $secretario,
            $tesorero,
            $pais,
            $num_presidentes,
            $num_gobernadores,
            $num_alcaldes,
            $num_concejales,
            $num_congresistas
        );

        $stmt->execute();
        $stmt->close();
    }

    // READ ALL
    public function findAll(): array
    {
        $res = $this->conn->query("SELECT * FROM partido_politico ORDER BY id DESC");
        $out = [];

        while ($m = $res->fetch_assoc()) {
            $out[] = new PartidoPolitico(
                new PartidoPoliticoNombre($m['nombre']),
                new PartidoPoliticoEslogan($m['eslogan']),
                $m['presidente'],
                $m['secretario'],
                $m['tesorero'],
                new PartidoPoliticoPais($m['pais']),
                (int)$m['num_presidentes'],
                (int)$m['num_gobernadores'],
                (int)$m['num_alcaldes'],
                (int)$m['num_concejales'],
                (int)$m['num_congresistas'],
                (int)$m['id']
            );
        }
        return $out;
    }

    // READ BY ID
    public function findById(int $id): ?PartidoPolitico
    {
        $stmt = $this->conn->prepare("SELECT * FROM partido_politico WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $m = $result->fetch_assoc();
        $stmt->close();

        if (!$m) {
            return null;
        }

        return new PartidoPolitico(
            new PartidoPoliticoNombre($m['nombre']),
            new PartidoPoliticoEslogan($m['eslogan']),
            $m['presidente'],
            $m['secretario'],
            $m['tesorero'],
            new PartidoPoliticoPais($m['pais']),
            (int)$m['num_presidentes'],
            (int)$m['num_gobernadores'],
            (int)$m['num_alcaldes'],
            (int)$m['num_concejales'],
            (int)$m['num_congresistas'],
            (int)$m['id']
        );
    }

    // UPDATE
    public function update(int $id, PartidoPolitico $partido): void
    {
        $sql = "UPDATE partido_politico SET 
            nombre = ?, eslogan = ?, presidente = ?, secretario = ?, tesorero = ?, pais = ?, 
            num_presidentes = ?, num_gobernadores = ?, num_alcaldes = ?, num_concejales = ?, num_congresistas = ?
            WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $nombre     = (string)$partido->getNombre();
        $eslogan    = (string)$partido->getEslogan();
        $presidente = $partido->getPresidente();
        $secretario = $partido->getSecretario();
        $tesorero   = $partido->getTesorero();
        $pais       = (string)$partido->getPais();
        $numPres    = $partido->getNumPresidentes();
        $numGob     = $partido->getNumGobernadores();
        $numAlc     = $partido->getNumAlcaldes();
        $numConce   = $partido->getNumConcejales();
        $numCongre  = $partido->getNumCongresistas();

        $stmt->bind_param(
            "ssssssiiiiii",
            $nombre,
            $eslogan,
            $presidente,
            $secretario,
            $tesorero,
            $pais,
            $numPres,
            $numGob,
            $numAlc,
            $numConce,
            $numCongre,
            $id
        );

        $stmt->execute();
        $stmt->close();
    }

    // DELETE
    public function delete(int $id): void
    {
        $stmt = $this->conn->prepare("DELETE FROM partido_politico WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
