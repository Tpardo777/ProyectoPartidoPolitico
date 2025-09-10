<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;

class RequestPasswordResetUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $email): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return false;
        }

        // Aquí podrías generar token y enviarlo por email
        return true;
    }
}
