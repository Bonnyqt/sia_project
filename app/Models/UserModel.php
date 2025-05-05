<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'api_key'];
    protected $useTimestamps = true;

    // You can also add a method to generate API key if needed
    public function generateApiKey($userId)
    {
        // Generate a 64-character random string (API Key)
        $apiKey = bin2hex(random_bytes(32)); // Generates a secure API key
        $this->update($userId, ['api_key' => $apiKey]); // Save API key to the database for the user
        return $apiKey;
    }
}
