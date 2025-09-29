<?php
namespace App\Infrastructure\Providers;
// Importamos el ServiceProvider 


use Illuminate\Support\ServiceProvider;
use Application\PartidoPolitico\Port\Out\PartidoPoliticoRepositoryPort;
use App\Infrastructure\Adapters\Database\Eloquent\Repository\EloquentPartidoPoliticoRepositoryAdapter;
// Proveedor de servicios para el módulo de PartidoPolítico
class PartidoPoliticoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PartidoPoliticoRepositoryPort::class, EloquentPartidoPoliticoRepositoryAdapter::class);
    }
// Método boot, si es necesario inicializar algo al arrancar el servicio
    public function boot() {}
    
}
