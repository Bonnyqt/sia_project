<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog_posts'; 
    protected $primaryKey = 'id';  
    protected $allowedFields = ['title', 'content', 'user_id', 'username', 'media', 'category', 'isAnonymous'];
    protected $useTimestamps = true; 
    public function searchPosts($query)
    {
        return $this->like('title', $query)  
                    ->orLike('content', $query) 
                    ->orLike('username', $query) 
                    ->orLike('category', $query) 
                    ->orLike('username', $query) 
                    ->findAll();
    }
    
}
