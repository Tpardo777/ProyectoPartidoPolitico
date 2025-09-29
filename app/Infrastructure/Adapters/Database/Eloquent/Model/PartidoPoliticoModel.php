<?php
/**
 * Modelo Eloquent para la tabla 'partido_politico'.
 *
 * Permite interactuar con la base de datos usando el ORM Eloquent de Laravel.
 *
 * Propiedades:
 * - $table: Nombre de la tabla asociada en la base de datos.
 * - $fillable: Campos que pueden ser asignados masivamente.
 * - $timestamps: Indica si se gestionan automáticamente los campos 'created_at' y 'updated_at'.
 *
 * Ejemplo de uso:
 *   PartidoPoliticoModel::create([...]);
 *   PartidoPoliticoModel::find($id);
 *   PartidoPoliticoModel::all();
 */
namespace App\Infrastructure\Adapters\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

class PartidoPoliticoModel extends Model
{
    protected $table = 'partido_politico';
    protected $fillable = [
        'nombre','eslogan','presidente','secretario','tesorero','pais',
        'num_presidentes','num_gobernadores','num_alcaldes','num_concejales','num_congresistas'
    ];
    public $timestamps = true;
}
