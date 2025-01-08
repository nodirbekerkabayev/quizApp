<?php

namespace App\Traits;

use Random\RandomException;

trait HasApiTokens
{
    public string $api_tokens;
    protected string $duration;

    /**
     * @throws RandomException
     */
    public function createApiToken(int $userId): string
    {
        $query="INSERT INTO user_api_token (user_id, token,expires_at, created_at) VALUES (:userId, :token,:expiresAt, NOW())";
        $this->api_tokens=bin2hex(random_bytes(40));
        $this->duration=date('Y-m-d H:i:s',strtotime('+' . $_ENV["API_TOKEN_EXPIRATION"] . ' day'));
        $stmt=$this->conn->prepare($query);
        $stmt->execute([
            ":userId"=>$userId,
            ":token"=>$this->api_tokens,
            ":expiresAt"=>$this->duration
        ]);
        return $this->api_tokens;
    }
}