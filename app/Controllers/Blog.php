<?php

namespace App\Controllers;

use App\Models\UserModel; 
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
    public function home()
    {

        return view('blog_home');
    }

    public function about()
    {

        return view('blog_about');
    }
    public function myposts()
    {
        $model = new BlogModel();
        
        // Get the current logged-in user's ID
        $userId = session()->get('user_id'); // Assuming user ID is stored in session
        
        // Get posts that belong to the logged-in user, ordered by created_at in descending order
        $data['posts'] = $model->where('user_id', $userId)
                               ->orderBy('created_at', 'desc')  // Sort by created_at in descending order
                               ->findAll(); // Filter posts by user_id
        
        return view('blog_myPosts', $data); // Pass filtered and sorted posts to the view
    }
    
    
    public function save()
{
    if (!session()->get('user_id')) {
        return redirect()->to('/login')->with('error', 'Please login first.');
    }

    $title = $this->request->getPost('title');
    $content = $this->request->getPost('content');
    $category = $this->request->getPost('category');
    $isAnonymous = $this->request->getPost('isAnonymous') ? 1 : 0; // Checkbox returns null if unchecked

    if (!$title || !$content) {
        return redirect()->back()->with('error', 'Title and Content are required.');
    }

    $media = $this->request->getFile('media');
    $mediaPath = null;

    if ($media->isValid() && !$media->hasMoved()) {
        $mediaName = $media->getRandomName();
        if ($media->move(ROOTPATH . 'public/uploads', $mediaName)) {
            $mediaPath = 'uploads/' . $mediaName;
        } else {
            log_message('error', 'Failed to move uploaded file.');
        }
    }

    $userId = session()->get('user_id');
    $userModel = new UserModel();
    $user = $userModel->find($userId);
    $username = $user ? $user['username'] : 'Unknown';

    $postData = [
        'title' => $title,
        'content' => $content,
        'user_id' => $userId,
        'username' => $isAnonymous ? 'Anonymous' : $username,
        'media' => $mediaPath,
        'category' => $category,
        'isAnonymous' => $isAnonymous
    ];

    $model = new BlogModel();
    if (!$model->save($postData)) {
        return redirect()->back()->with('error', 'Failed to save blog post to database.');
    }

    $newPost = [
        'id' => $model->getInsertID(),
        'title' => $title,
        'content' => $content,
        'user_id' => $userId,
        'username' => $isAnonymous ? 'Anonymous' : $username,
        'created_at' => date('Y-m-d H:i:s'),
        'media' => $mediaPath,
        'category' => $category,
        'isAnonymous' => $isAnonymous
    ];

    $posts = [];
    if (file_exists($this->dataFile)) {
        $posts = json_decode(file_get_contents($this->dataFile), true);
    }

    $posts[] = $newPost;

    file_put_contents($this->dataFile, json_encode($posts, JSON_PRETTY_PRINT));

    return redirect()->to('/blog/list');
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

    // Get all posts ordered by created_at DESC (newest first)
    $data['posts'] = $model->orderBy('created_at', 'DESC')->findAll();

    return view('blog_list', $data);
}

    // API to return all blog posts (from JSON file)
    public function api()
{
    // Get API key and username from the query parameters
    $apiKey = $this->request->getGet('api_key');
    $username = $this->request->getGet('username');  // Get username from query parameters

    // Check if the API key is valid
    if (!$this->checkApiKey($apiKey)) {
        return $this->response->setStatusCode(403, 'Forbidden')->setJSON(['error' => 'Invalid API key']);
    }

    // Set CORS headers to allow requests from other websites
    $this->response->setHeader('Access-Control-Allow-Origin', '*');
    $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    $this->response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');

    // Retrieve posts based on username if provided
    $model = new BlogModel();
    if ($username) {
        // Filter posts by the username
        $posts = $model->where('username', $username)->findAll();
    } else {
        // If no username, return all posts
        $posts = $model->findAll();
    }

    return $this->response->setJSON($posts);  // Return filtered posts as JSON
}


    public function search()
{
    $query = $this->request->getGet('query');  // Get the search query

    $model = new BlogModel();

    if ($query) {
        // If there is a query, perform the search
        $data['posts'] = $model->searchPosts($query);
    } else {
        // If no query, set an empty array or you can choose to load all posts
        $data['posts'] = [];  // Or you could load all posts: $model->findAll();
    }

    // Pass the search results and the query to the view
    return view('blog_list', ['posts' => $data['posts'], 'query' => $query]);
}


// Function to edit a blog post
public function update($id)
{
    $model = new BlogModel();

    // Fetch the post by ID
    $post = $model->find($id);

    if (!$post) {
        return redirect()->to('/blog/myposts')->with('error', 'Post not found.');
    }

    // Check if the logged-in user is the owner of the post
    if ($post['user_id'] != session()->get('user_id')) {
        return redirect()->to('/blog/myposts')->with('error', 'Unauthorized access.');
    }

    $title = $this->request->getPost('title');
    $content = $this->request->getPost('content');
    $category = $this->request->getPost('category');
    $isAnonymous = $this->request->getPost('isAnonymous') ? 1 : 0;

    if (!$title || !$content) {
        return redirect()->back()->with('error', 'Title and Content are required.');
    }

    // Handle media upload
    $media = $this->request->getFile('media');
    if ($media && $media->isValid() && !$media->hasMoved()) {
        $mediaName = $media->getRandomName();
        if ($media->move(ROOTPATH . 'public/uploads', $mediaName)) {
            $post['media'] = 'uploads/' . $mediaName; // Update the media path with the new file
        } else {
            log_message('error', 'Failed to move uploaded file.');
            return redirect()->back()->with('error', 'Failed to upload the image.');
        }
    }
    // If no new media is uploaded, retain the existing media
    else {
        $post['media'] = $post['media']; // Retain the existing media
    }

    // Update the post data
    $post['title'] = $title;
    $post['content'] = $content;
    $post['category'] = $category;
    $post['isAnonymous'] = $isAnonymous;

    // Update the username if anonymous is checked
    if ($isAnonymous) {
        $post['username'] = 'Anonymous';
    } else {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));
        $post['username'] = $user ? $user['username'] : 'Unknown';
    }

    if (!$model->save($post)) {
        return redirect()->back()->with('error', 'Failed to update the post.');
    }

    return redirect()->to('/blog/myposts')->with('success', 'Post updated successfully.');
}
public function getPost($id)
{
    $postModel = new \App\Models\BlogModel();
    $post = $postModel->find($id);

    if ($post) {
        return $this->response->setJSON($post);
    } else {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Post not found']);
    }
}
// Function to delete a blog post
public function delete($id)
{
    $model = new BlogModel();

    // Fetch the post by ID
    $post = $model->find($id);

    if (!$post) {
        return redirect()->to('/blog/myposts')->with('error', 'Post not found.');
    }

    // Check if the logged-in user is the owner of the post
    if ($post['user_id'] != session()->get('user_id')) {
        return redirect()->to('/blog/myposts')->with('error', 'Unauthorized access.');
    }

    // Delete the post
    if (!$model->delete($id)) {
        return redirect()->to('/blog/myposts')->with('error', 'Failed to delete the post.');
    }

    return redirect()->to('/blog/myposts')->with('success', 'Post deleted successfully.');
}


public function like($id)
{
    $model = new BlogModel();
    $post = $model->find($id);

    if (!$post) {
        return $this->response->setJSON(['error' => 'Post not found'], 404);
    }

    // Increment the like count
    $post['likes'] = isset($post['likes']) ? $post['likes'] + 1 : 1;

    if ($model->save($post)) {
        return $this->response->setJSON(['success' => true, 'likes' => $post['likes']]);
    }

    return $this->response->setJSON(['error' => 'Failed to like the post'], 500);
}

public function comment($id)
{
    $comment = $this->request->getPost('comment');
    if (!$comment) {
        return $this->response->setJSON(['error' => 'Comment cannot be empty'], 400);
    }

    $model = new BlogModel();
    $post = $model->find($id);

    if (!$post) {
        return $this->response->setJSON(['error' => 'Post not found'], 404);
    }

    // Add the comment to the post
    $post['comments'][] = [
        'user_id' => session()->get('user_id'),
        'comment' => $comment,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    if ($model->save($post)) {
        return $this->response->setJSON(['success' => true, 'comments' => $post['comments']]);
    }

    return $this->response->setJSON(['error' => 'Failed to add comment'], 500);
}
}    


