<?php

namespace App\Models;

use App\Traits\HasApiTokens;
use Random\RandomException;

class User extends DB
{
    use HasApiTokens;

    /**
     * @throws RandomException
     */
    public function create(string $full_name, string $email, string $password): bool
    {
        $query = "INSERT INTO users (full_name, email, password, updated_at, created_at) VALUES (:fullName, :email, :password, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':fullName' => $full_name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        $userId = $this->conn->lastInsertId();
        $this->createApiToken($userId);
        return true;
    }

    /**
     * @throws RandomException
     */
    public function getUser(string $email, string $password): mixed
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
        ]);
        $user = $stmt->fetch();
        if($user && password_verify($password, $user->password)) {
            $this->createApiToken($user->id);
            return $user;
        }
        return null;
    }
    public function getUserById(int $id): mixed
    {
        $query = "SELECT id, full_name, email, updated_at, created_at FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':id' => $id,
        ]);
        return $stmt->fetch();
    }
}