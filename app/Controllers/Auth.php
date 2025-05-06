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
    
        // Generate API key
        $apiKey = bin2hex(random_bytes(32));
    
        // Save user
        $model->save([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'api_key' => $apiKey,
            'first_login' => true
        ]);
    
        // Fetch the saved user
        $user = $model->where('email', $email)->first();
    
        // Automatically log the user in
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'first_login' => $user['first_login'],
            'api_key' => $user['api_key']
        ]);
    
        // Redirect to home
        return redirect()->to('/');
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
            'first_login' => $user['first_login'],
            'api_key' => $user['api_key'] // Include API key in session
        ]);
        
        return redirect()->to('/');
    }

    // If authentication fails, redirect back with error
    return redirect()->back()->with('error', 'Invalid credentials.');
}
public function markFirstLoginDone()
{
    if ($this->request->isAJAX()) {
        log_message('debug', 'AJAX request received to mark first login as done.');

        $userId = session()->get('user_id');
        $model = new UserModel();
        $model->update($userId, ['first_login' => false]);

        session()->set('first_login', false);

        return $this->response->setJSON(['status' => 'success']);
    }

    return $this->response->setStatusCode(403)->setJSON(['status' => 'forbidden']);
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
