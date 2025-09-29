<?php 
require __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Adapters\Database\Eloquent\Repository\PartidoPoliticoRepository;
use Application\PartidoPolitico\Port\In\ListPartidoPoliticoUseCase;

// 🔹 Inyectamos el repositorio en el caso de uso
$repo = new PartidoPoliticoRepository();
$listUseCase = new ListPartidoPoliticoUseCase($repo);

// 🔹 Ejecutamos el caso de uso
$partidos = $listUseCase->execute();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Partidos Políticos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 to-purple-200 min-h-screen px-4 sm:px-6 py-6 font-sans">
    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-lg p-4 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-purple-700 mb-6 text-center">🌸 Lista de Partidos Políticos</h1>
 
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-300 rounded-lg">
                <thead class="bg-purple-600 text-white text-sm sm:text-base">
                    <tr>
                  
                        <th class="px-2 py-2">ID</th>
                        <th class="px-2 py-2">Nombre</th>
                        <th class="px-2 py-2">Eslogan</th>
                        <th class="px-2 py-2">Presidente</th>
                        <th class="px-2 py-2">Secretario</th>
                        <th class="px-2 py-2">Tesorero</th>
                        <th class="px-2 py-2">País</th>
                        <th class="px-2 py-2"># Presidentes</th>
                        <th class="px-2 py-2"># Gobernadores</th>
                        <th class="px-2 py-2"># Alcaldes</th>
                        <th class="px-2 py-2"># Concejales</th>
                        <th class="px-2 py-2"># Congresistas</th>
                        <th class="px-2 py-2">Acciones</th>
                    </tr>
                </thead>
            <tbody class="bg-white text-gray-700">
                <?php if (empty($partidos)): ?>
                    <tr>
                        <td colspan="13" class="text-center py-4 text-pink-600 font-semibold">No hay partidos registrados</td>
                    </tr>
                <?php else: ?>
       
                    <?php foreach ($partidos as $p): ?>
                        <tr class="hover:bg-pink-50 transition">
                           
                            <td class="px-4 py-2"><?= $p->getId() ?? '-' ?></td>
                            <td class="px-4 py-2"><?= $p->getNombre() ?></td>
                            <td class="px-4 py-2"><?= $p->getEslogan() ?></td>
                            <td class="px-4 py-2"><?= $p->getPresidente() ?></td>
                            <td class="px-4 py-2"><?= $p->getSecretario() ?></td>
                            <td class="px-4 py-2"><?= $p->getTesorero() ?></td>
                            <td class="px-4 py-2"><?= $p->getPais() ?></td>
                            <td class="px-4 py-2"><?= $p->getNumPresidentes() ?></td>
                            <td class="px-4 py-2"><?= $p->getNumGobernadores() ?></td>
                            <td class="px-4 py-2"><?= $p->getNumAlcaldes() ?></td>
                            <td class="px-4 py-2"><?= $p->getNumConcejales() ?></td>
                            <td class="px-4 py-2"><?= $p->getNumCongresistas() ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="editar.php?id=<?= $p->getId() ?>" class="text-blue-600 hover:underline">✏️ Editar</a>
                                <a href="eliminar.php?id=<?= $p->getId() ?>" class="text-red-600 hover:underline">🗑️ Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="mt-6 text-center">
            <a href="crear.php" class="inline-block bg-pink-500 text-white px-6 py-2 rounded-full shadow hover:bg-pink-600 transition">
                ➕ Crear nuevo partido
            </a>
        </div>
    </div>
</body>
</html>
