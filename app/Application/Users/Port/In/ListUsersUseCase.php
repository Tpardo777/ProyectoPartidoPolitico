<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;
use App\Domain\Users\Entity\User;

class ListUsersUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return User[]
     */
    public function execute(): array
    {
        return $this->userRepository->findAll();
    }
}
