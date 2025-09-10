<?php

namespace App\Application\Users\Port\In;

class LogoutUseCase
{
    public function execute(): void
    {
        // Aquí podrías limpiar sesión/token
        // Ejemplo básico si usaras Laravel: auth()->logout();
    }
}
