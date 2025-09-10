<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;

class DeleteUserUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $id): void
    {
        $this->userRepository->delete($id);
    }
}
