<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;
use App\Domain\Users\ValueObject\UserName;

class UpdateUserUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $id, string $name, string $email): bool
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            return false;
        }

        $user->setName(new UserName($name));
        $user->setEmail($email);

        $this->userRepository->save($user);

        return true;
    }
}
