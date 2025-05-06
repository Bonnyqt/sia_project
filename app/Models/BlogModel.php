<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog_posts'; 
    protected $primaryKey = 'id';  
    protected $allowedFields = ['title', 'content', 'user_id', 'media'];  // Include 'media' here
    protected $useTimestamps = true; 
   
}
