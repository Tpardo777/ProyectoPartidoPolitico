<?php
namespace App\Infrastructure\Adapters\Database\UnitOfWork;

use Illuminate\Support\Facades\DB;

class LaravelUnitOfWorkAdapter
{
    public function transaction(callable $fn)
    {
        return DB::transaction($fn);
    }
}
