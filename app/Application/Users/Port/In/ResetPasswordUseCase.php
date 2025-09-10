<?php

namespace App\Application\Users\Port\In;

use App\Application\Users\Port\Out\UserRepositoryPort;
use App\Domain\Users\Service\Contracts\PasswordHasher;

class ResetPasswordUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordHasher $passwordHasher;

    public function __construct(UserRepositoryPort $userRepository, PasswordHasher $passwordHasher)
    {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function execute(string $email, string $newPassword): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return false;
        }

        $hashedPassword = $this->passwordHasher->hash($newPassword);
        $user->setPassword($hashedPassword);

        $this->userRepository->save($user);

        return true;
    }
}
