<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;
use App\Domain\Users\Service\Contracts\PasswordHasher;

class LoginUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordHasher $passwordHasher;

    public function __construct(UserRepositoryPort $userRepository, PasswordHasher $passwordHasher)
    {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function execute(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return false;
        }

        return $this->passwordHasher->check($password, $user->getPassword());
    }
}
