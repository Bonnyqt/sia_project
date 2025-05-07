<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="/uploads/test.png">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   <title>Lost & Vocal</title>
</head>
<style>
   
   .featured-post {
  display: flex;
  flex-wrap: wrap;
  gap: 24px;
  background-color: #1e293b;
  border-radius: 12px;
  padding: 24px;
  align-items: center;
  position: relative; /* Ensure positioning context for the badge */
}

.badge {
  position: absolute;
  top: 15px; /* Adjust position from top */
  right: 15px; /* Move the badge to the right */
  background: #e91e63;
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 0.8em;
  font-weight: bold;
  z-index: 10; /* Make sure the badge stays on top of content */
}


.featured-post .featured-img {
  width: 100%;
  max-width: 550px;
  border-radius: 12px;
  object-fit: cover;
  flex: 1 1 50%;
}

.featured-post .content {
  flex: 1 1 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.featured-post .meta {
  font-size: 14px;
  color: #94a3b8;
  margin-bottom: 12px;
}

.featured-post h2 {
  font-size: 24px;
  color: #f8fafc;
  margin-bottom: 12px;
}

.featured-post p {
  font-size: 16px;
  color: #cbd5e1;
  margin-bottom: 16px;
}

.featured-post .author {
  display: flex;
  align-items: center;
  gap: 10px;
}

.featured-post .author img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
}


.meta {
  font-size: 12px;
  color: #94a3b8;
  margin-bottom: 6px;
}

h2, h5 {
  color: #f8fafc;
}

.author {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-top: 10px;
}

.blog-container {
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 12px;
}


.sub-posts-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
}

.sub-post {
  background-color: #1e293b;
  padding: 16px;
  border-radius: 12px;
}

.sub-post img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 10px;
}




.author img {
  width: 28px;
  height: 28px;
  border-radius: 50%;
}
.search-input::placeholder {
    color: white;
    opacity: 1;
  }
  /* Sticky Button */

</style>
<body>
<?= view('partials/header') ?><br>
<h1 style="color:white; font-family:myFirstFont; font-size:90px;">My Posts</h1>
<br>
<?php if (session()->get('api_key')): ?>
<div class="blog-container">
  <?php if (!empty($posts)): ?>

    <!-- Display search term above the posts -->
    <?php if (isset($query) && !empty($query)): ?>
      <div class="search-results-header" style="margin-bottom: 20px;">
        <h3>Showing results for: <strong><?= esc($query) ?></strong></h3>
      </div>
    <?php endif; ?>

    <!-- Featured Post -->
    <div class="featured-post mb-4">
    <span class="badge">Newest</span> 
      <?php if (!empty($posts[0]['media'])): ?>
        <?php if (preg_match('/\.(jpg|jpeg|png|gif|jfif)$/i', $posts[0]['media'])): ?>
          <img src="/<?= esc($posts[0]['media']) ?>" alt="Featured Image" class="featured-img">
        <?php elseif (preg_match('/\.(mp4|webm|ogg)$/i', $posts[0]['media'])): ?>
          <video controls class="featured-img">
            <source src="/<?= esc($posts[0]['media']) ?>">
            Your browser does not support the video tag.
          </video>
        <?php endif; ?>
      <?php endif; ?>
      
      <div class="content">
        <div class="meta"><?= esc($posts[0]['category'] ?? 'Category') ?> • <?= esc($posts[0]['created_at']) ?></div>
        <h2><?= esc($posts[0]['title']) ?></h2>
        <p><?= esc($posts[0]['content']) ?></p>
        <div class="author">
          <img src="/uploads/sss.jfif" alt="Author Image">
          <span><?= esc($posts[0]['username'] ?? '') ?></span>
        </div>
      </div>
    </div>

    <!-- All Other Posts -->
    <div class="sub-posts-grid">
      <?php foreach (array_slice($posts, 1) as $post): ?>
        <div class="sub-post">
          <?php if (!empty($post['media'])): ?>
            <?php if (preg_match('/\.(jpg|jpeg|png|gif|jfif)$/i', $post['media'])): ?>
              <img src="/<?= esc($post['media']) ?>" alt="Image">
            <?php elseif (preg_match('/\.(mp4|webm|ogg)$/i', $post['media'])): ?>
              <video controls width="100%">
                <source src="/<?= esc($post['media']) ?>">
                Your browser does not support the video tag.
              </video>
            <?php endif; ?>
          <?php endif; ?>

          <div class="meta"><?= esc($post['category'] ?? 'Category') ?> • <?= esc($post['created_at']) ?></div>
          <h5><?= esc($post['title']) ?></h5>
          <p><?= esc($post['content']) ?></p>
          <div class="author">
            <img src="/uploads/sss.jfif" alt="Author Image">
            <span><?= esc($post['username'] ?? '') ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  <?php else: ?>
    <p>No posts yet.</p>
  <?php endif; ?>
</div>
<?php else: ?>
  <div style="text-align:center; padding: 50px;">
    <h3>Unauthorized Access</h3>
    <p>You must have a valid API key to view this content.</p>
  </div>
<?php endif; ?>

<br><br><br><br>
</body>
</html>