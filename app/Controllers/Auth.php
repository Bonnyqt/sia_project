<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function signup()
    {
        helper(['form']);
        return view('signup');
    }

    public function register()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        if (!$username || !$email || !$password) {
            return redirect()->back()->with('error', 'All fields are required.');
        }
    
        $model = new UserModel();
    
        // Check for duplicate email
        if ($model->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Email is already registered.');
        }
    
        // Generate API key (if needed)
        $apiKey = bin2hex(random_bytes(32));
    
        // Save user with API key
        $model->save([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'api_key' => $apiKey  // Save the generated API key
        ]);
    
        return view('api_key', ['apiKey' => $apiKey]);

    }
    


    public function login()
    {
        helper(['form']);
        return view('login');
    }

    public function doLogin()
{
    // Get the posted username and password
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Load the User model
    $model = new UserModel();

    // Check if user exists with the given username
    $user = $model->where('username', $username)->first();

    // If the user exists and the password is correct, set session data
    if ($user && password_verify($password, $user['password'])) {
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
        ]);
        return redirect()->to('/blog');
    }

    // If authentication fails, redirect back with error
    return redirect()->back()->with('error', 'Invalid credentials.');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
