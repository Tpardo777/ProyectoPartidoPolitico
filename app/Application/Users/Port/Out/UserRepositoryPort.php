<?php

namespace App\Application\Users\Port\Out;

use App\Domain\Users\Entity\User;

interface UserRepositoryPort
{
    public function save(User $user): void;

    public function findById(string $id): ?User;

    public function findByEmail(string $email): ?User;

    public function delete(string $id): void;

    public function findAll(): array;
}
