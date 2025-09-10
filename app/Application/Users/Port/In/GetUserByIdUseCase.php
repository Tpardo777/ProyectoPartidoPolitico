<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;
use App\Domain\Users\Entity\User;

class GetUserByIdUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $id): ?User
    {
        return $this->userRepository->findById($id);
    }
}
