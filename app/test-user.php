<?php

require_once __DIR__ . '/Domain/Users/ValueObject/UserId.php';
require_once __DIR__ . '/Domain/Users/ValueObject/UserName.php';
require_once __DIR__ . '/Domain/Users/Entity/User.php';

use App\Domain\Users\ValueObject\UserId;
use App\Domain\Users\ValueObject\UserName;
use App\Domain\Users\Entity\User;

try {
    $userId = new UserId('123e4567-e89b-12d3-a456-426614174000');
    $userName = new UserName('Carlos');
    $user = new User($userId, $userName, 'carlos@email.com', '123456');

    echo "✅ Usuario creado exitosamente:\n";
    echo "ID: " . $user->id() . "\n";
    echo "Nombre: " . $user->name() . "\n";
    echo "Email: " . $user->email() . "\n";
} catch (Exception $e) {
    echo "❌ Error al crear el usuario: " . $e->getMessage();
}
