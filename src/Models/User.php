<?php

namespace App\Models;

class User extends DB
{
    public function create(string $full_name, string $email, string $password): void
    {
        $query = "INSERT INTO users (full_name, email, password, updated_at, created_at) VALUES (:fullName, :email, :password, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':fullName' => $full_name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
    }

    public function getUser(string $email, string $password): bool
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':email' => $email,
        ]);
        $user = $stmt->fetch();
        if($user && password_verify($password, $user->password)){
            return true;
        }
        else{
            return false;
        }
    }
}