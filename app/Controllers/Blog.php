<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;

class Blog extends BaseController
{
    private $dataFile = WRITEPATH . 'blog_posts.json'; // Path for JSON file

    // Show the blog post form
    public function index()
    {
        helper('form');
        return view('blog_form');
    }

    // Save blog post to MySQL and JSON
    public function save()
    {
        // Check if the user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }
        
        // Get title and content from form input
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
    
        if (!$title || !$content) {
            return redirect()->back()->with('error', 'Title and Content are required.');
        }
    
        // Handle file upload (image or video)
        $media = $this->request->getFile('media');
        $mediaPath = null;
        
        // Check if a file is uploaded
        if ($media->isValid() && !$media->hasMoved()) {
            // Generate a unique name for the file
            $mediaPath = 'uploads/' . $media->getRandomName();
            
            // Move the file to the public/uploads directory
            $media->move(WRITEPATH . 'public/' . $mediaPath);
        }
    
        // Save to MySQL using BlogModel
        $model = new BlogModel();
    
        // Prepare data for MySQL insert
        $postData = [
            'title' => $title,
            'content' => $content,
            'user_id' => session()->get('user_id'), // Get user_id from session
            'media' => $mediaPath // Save the media path
        ];
    
        // Save post to MySQL
        if (!$model->save($postData)) {
            return redirect()->back()->with('error', 'Failed to save blog post to database.');
        }
    
        // Now, save the same data to the JSON file
    
        // Get the MySQL ID of the new post
        $newPost = [
            'id' => $model->getInsertID(), // Get the ID from MySQL
            'title' => $title,
            'content' => $content,
            'user_id' => session()->get('user_id'), // Add user_id to JSON
            'created_at' => date('Y-m-d H:i:s'), // Add created_at timestamp
            'media' => $mediaPath // Add media path to JSON
        ];
    
        // Read the existing posts from the JSON file
        $posts = [];
        if (file_exists($this->dataFile)) {
            $posts = json_decode(file_get_contents($this->dataFile), true);
        }
    
        // Add the new post to the JSON posts array
        $posts[] = $newPost;
    
        // Write the updated posts array back to the JSON file
        file_put_contents($this->dataFile, json_encode($posts, JSON_PRETTY_PRINT));
    
        return redirect()->to('/'); // Redirect to the list of blog posts
    }
    
private function checkApiKey($apiKey)
{
    log_message('debug', 'Received API Key: ' . $apiKey);  // Log the received API key
    $model = new UserModel();
    $user = $model->where('api_key', $apiKey)->first();

    if (!$user) {
        return false; // API key is invalid
    }

    session()->set('user_id', $user['id']);
    return true;
}

    // List all blog posts (from MySQL)
    public function list()
    {
        $model = new BlogModel();
        $data['posts'] = $model->findAll(); // Get all blog posts from MySQL

        return view('blog_list', $data); // Pass data to the view
    }

    // API to return all blog posts (from JSON file)
    public function api()
    {
        if (!file_exists($this->dataFile)) {
            return $this->response->setJSON([]);
        }

        $posts = json_decode(file_get_contents($this->dataFile), true);
        return $this->response->setJSON($posts); // Return JSON response
    }
}
