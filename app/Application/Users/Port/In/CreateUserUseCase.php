<?php

namespace App\Application\Users\Port\In;

use App\Domain\Users\Entity\User;
use App\Domain\Users\Service\Contracts\PasswordHasher;
use App\Domain\Users\ValueObject\UserId;
use App\Domain\Users\ValueObject\UserName;
use App\Application\Users\Port\Out\UserRepositoryPort;

class CreateUserUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordHasher $passwordHasher;

    public function __construct(UserRepositoryPort $userRepository, PasswordHasher $passwordHasher)
    {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function execute(string $name, string $email, string $plainPassword): User
    {
        $hashedPassword = $this->passwordHasher->hash($plainPassword);
        $user = new User(
            UserId::generate(),  // O genera UUID desde aquí
            new UserName($name),
            $email,
            $hashedPassword
        );

        $this->userRepository->save($user);

        return $user;
    }
}
