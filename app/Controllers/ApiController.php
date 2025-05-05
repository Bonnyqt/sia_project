<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;
use App\Models\UserModel;

class ApiController extends BaseController
{
    // Function to check the API key
    private function checkApiKey($apiKey)
    {
        $model = new UserModel();

        // Query the database to find the user by their API key
        $user = $model->where('api_key', $apiKey)->first();

        if (!$user) {
            return false; // API key is invalid
        }

        // Optionally, set the user session or data for the authenticated user
        session()->set('user_id', $user['id']);
        return true;
    }

    // Function to fetch blog posts using API key
    public function getData()
    {
        $apiKey = $this->request->getHeaderLine('X-API-KEY');

        if (!$apiKey || !$this->checkApiKey($apiKey)) {
            // If the API key is not valid, return a 401 Unauthorized response
            return $this->response->setJSON(['error' => 'Invalid API key'], 401); 
        }

        // Fetch blog posts from the database using BlogModel
        $model = new BlogModel();
        $posts = $model->findAll(); // You can adjust this query to fit your needs

        // Return the fetched posts in JSON format
        return $this->response->setJSON($posts);
    }

    // Example for storing data (if needed)
    public function storeData()
    {
        $apiKey = $this->request->getHeaderLine('X-API-KEY');

        if (!$apiKey || !$this->checkApiKey($apiKey)) {
            // If the API key is not valid, return a 401 Unauthorized response
            return $this->response->setJSON(['error' => 'Invalid API key'], 401); 
        }

        // Store your data (e.g., save to database)
        $data = $this->request->getPost('data'); // Get data from the post request

        // Data storing logic goes here (e.g., insert into the database)
        // Example: Save to a table (for demonstration purposes, modify as necessary)
        $model = new BlogModel();
        $model->save([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => session()->get('user_id'), // Assuming user is logged in
        ]);

        return $this->response->setJSON(['success' => 'Data stored successfully']);
    }
}
