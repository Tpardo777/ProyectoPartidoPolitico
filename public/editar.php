<?php
require_once __DIR__ . '/../vendor/autoload.php';
// Importamos las clases necesarias

use Application\PartidoPolitico\Port\In\GetPartidoPoliticoByIdUseCase;
use App\Infrastructure\Adapters\Database\Eloquent\Repository\PartidoPoliticoRepository;
use App\Domain\PartidoPolitico\Entity\PartidoPolitico;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoEslogan;

$repo = new PartidoPoliticoRepository();
$getPartidoUseCase = new GetPartidoPoliticoByIdUseCase($repo);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$partido = $getPartidoUseCase->execute($id);

if (!$partido) {
    die("❌ Partido no encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // ✅ Value Objects
        $nombre  = new PartidoPoliticoNombre($_POST['nombre']);
        $eslogan = new PartidoPoliticoEslogan($_POST['eslogan']);
        $pais    = new PartidoPoliticoPais($_POST['pais']);

        // ✅ Construimos un nuevo PartidoPolitico con los datos actualizados
        $partidoActualizado = new PartidoPolitico(
            $nombre,
            $eslogan,
            $_POST['presidente'],
            $_POST['secretario'],
            $_POST['tesorero'],
            $pais,
            (int)$_POST['num_presidentes'],
            (int)$_POST['num_gobernadores'],
            (int)$_POST['num_alcaldes'],
            (int)$_POST['num_concejales'],
            (int)$_POST['num_congresistas'],
            $id // 👈 importante mantener el ID
        );

        // ✅ Actualizamos usando el repositorio (que debe aceptar un PartidoPolitico)
        $repo->update($id, $partidoActualizado);


        $success = "El partido político fue actualizado correctamente 🎉";
        header("refresh:1; url=index.php");
        exit;

    } catch (\Throwable $e) {
        $error = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Partido Político</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 to-purple-200 min-h-screen px-4 py-6 font-sans">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-lg p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-purple-700 mb-6 text-center">🌸 Editar Partido Político</h1>
          <?php include __DIR__ . '/partials/alert.php'; ?>
        <form method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" value="<?= $partido->getNombre() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Eslogan:</label>
                <input type="text" name="eslogan" value="<?= $partido->getEslogan() ?>"  maxlength="50"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Presidente:</label>
                <input type="text" name="presidente" value="<?= $partido->getPresidente() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Secretario:</label>
                <input type="text" name="secretario" value="<?= $partido->getSecretario() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tesorero:</label>
                <input type="text" name="tesorero" value="<?= $partido->getTesorero() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">País:</label>
                <input type="text" name="pais" value="<?= $partido->getPais() ?>"  title="Solo letras y espacios"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <!-- Campos numéricos con min/max -->
            <div>
                <label class="block text-sm font-medium text-gray-700"># Presidentes:</label>
                <input type="number" name="num_presidentes" value="<?= $partido->getNumPresidentes() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700"># Gobernadores:</label>
                <input type="number" name="num_gobernadores" value="<?= $partido->getNumGobernadores() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700"># Alcaldes:</label>
                <input type="number" name="num_alcaldes" value="<?= $partido->getNumAlcaldes() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700"># Concejales:</label>
                <input type="number" name="num_concejales" value="<?= $partido->getNumConcejales() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700"># Congresistas:</label>
                <input type="number" name="num_congresistas" value="<?= $partido->getNumCongresistas() ?>" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="col-span-1 sm:col-span-2 text-center mt-6">
                <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded-full shadow hover:bg-pink-600 transition">
                    💾 Actualizar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
