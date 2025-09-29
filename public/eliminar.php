<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Adapters\Database\Eloquent\Repository\PartidoPoliticoRepository;
use Application\PartidoPolitico\Port\In\DeletePartidoPoliticoUseCase;

// ✅ Instanciamos el repositorio (infraestructura)
$repo = new PartidoPoliticoRepository();

// ✅ Pasamos el repo al caso de uso (aplicación)
$useCase = new DeletePartidoPoliticoUseCase($repo);

// ✅ Validamos que venga el ID
if (!isset($_GET['id'])) {
    die("❌ ID no proporcionado.");
}

$id = (int) $_GET['id'];

// ✅ Ejecutamos el caso de uso
$useCase->execute($id);

// ✅ Redirigimos al listado
header("Location: index.php");
exit;
