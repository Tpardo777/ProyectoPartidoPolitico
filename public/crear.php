<?php
// Archivo: public/crear.php
require_once __DIR__ . '/../vendor/autoload.php';
// Importamos las clases necesarias
use App\Infrastructure\Adapters\Database\Eloquent\Repository\PartidoPoliticoRepository;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoNombre;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoPais;
use App\Domain\PartidoPolitico\ValueObject\PartidoPoliticoEslogan;
use Application\PartidoPolitico\Dto\Command\CreatePartidoPoliticoCommand;
use Application\PartidoPolitico\Port\In\CreatePartidoPoliticoUseCase;

// ✅ Validación básica de enteros
function validarEnteroNoNegativo($valor) {
    return isset($valor) && is_numeric($valor) && $valor >= 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $camposNumericos = [
        'num_presidentes',
        'num_gobernadores',
        'num_alcaldes',
        'num_concejales',
        'num_congresistas'
    ];

    foreach ($camposNumericos as $campo) {
        if (!validarEnteroNoNegativo($_POST[$campo])) {
            die("❌ Error: El campo '$campo' debe ser un número entero no negativo.");
        }
    }

    try {
        // ✅ Value Objects
        $nombre  = new PartidoPoliticoNombre($_POST['nombre']);
        $eslogan = new PartidoPoliticoEslogan($_POST['eslogan']);
        $pais    = new PartidoPoliticoPais($_POST['pais']);

        // ✅ Inyección del repositorio al caso de uso
        $repo = new PartidoPoliticoRepository();
        $useCase = new CreatePartidoPoliticoUseCase($repo);

        // ✅ Creamos el DTO Command
        $command = new CreatePartidoPoliticoCommand(
            (string)$nombre,
            (string)$eslogan,
            $_POST['presidente'],
            $_POST['secretario'],
            $_POST['tesorero'],
            (string)$pais,
            (int)$_POST['num_presidentes'],
            (int)$_POST['num_gobernadores'],
            (int)$_POST['num_alcaldes'],
            (int)$_POST['num_concejales'],
            (int)$_POST['num_congresistas']
        );

        // ✅ Ejecutamos el caso de uso
        $useCase->execute($command);

        $success = "El partido político fue creado correctamente 🎉";
        header("refresh:3; url=index.php");

    } catch (\Throwable $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Partido Político</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 to-purple-200 min-h-screen px-4 sm:px-6 py-6 font-sans">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-lg p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-purple-700 mb-6 text-center">🌸 Crear Partido Político</h1>

        // Incluimos la alerta para mensajes de éxito o error
        <?php include __DIR__ . '/partials/alert.php'; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Eslogan:</label>
                <input type="text" name="eslogan"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Presidente:</label>
                <input type="text" name="presidente" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Secretario:</label>
                <input type="text" name="secretario" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tesorero:</label>
                <input type="text" name="tesorero" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">País:</label>
                <input type="text" name="pais"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700"># Presidentes:</label>
                    <input type="number" name="num_presidentes" value="0" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700"># Gobernadores:</label>
                    <input type="number" name="num_gobernadores" value="0" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700"># Alcaldes:</label>
                    <input type="number" name="num_alcaldes" value="0" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700"># Concejales:</label>
                    <input type="number" name="num_concejales" value="0" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700"># Congresistas:</label>
                    <input type="number" name="num_congresistas" value="0" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
                </div>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded-full shadow hover:bg-pink-600 transition">
                    💾 Guardar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
