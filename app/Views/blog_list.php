

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog Grid Layout</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @font-face {
  font-family: myFirstFont;
  src: url(../uploads/webFont.ttf);
}
  

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Inter', sans-serif;
  background-image: linear-gradient(to bottom, #364050, #192130);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  color: #f1f5f9;
  padding: 40px;
}

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
    }

    nav ul {
      display: flex;
      gap: 100px;
      margin-left:40px;
      list-style: none;
      font-size:20px;
      font-family: myFirstFont;
    }

    nav ul li {
      cursor: pointer;
      color:rgb(255, 255, 255);
    }

    nav ul li:hover {
      color: #f8fafc;
    }

    .search-box input {
      background-color: #334155;
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      color: white;
    }

   

    .featured-post {
  display: flex;
  flex-wrap: wrap;
  gap: 24px;
  background-color: #1e293b;
  border-radius: 12px;
  padding: 24px;
  align-items: center;
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

.meta {
  font-size: 12px;
  color: #94a3b8;
  margin-bottom: 8px;
}

h2, h5 {
  color: #f8fafc;
  margin: 0 0 8px;
}

p {
  font-size: 14px;
  color: #cbd5e1;
}

.author {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 10px;
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
#stickyBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  padding: 15px 30px;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  z-index: 9999;
  transition: background-color 0.3s ease;
}

#stickyBtn:hover {
  background-color: #0056b3;
}


.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 10000;
  opacity: 0;
  animation: fadeIn 0.4s forwards;
  overflow: hidden;
}

/* Modal Content */
.modal-content {
  background-color: white;
  padding: 30px;
  width: 50%;
  max-width: 600px;
  margin: 0 auto;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  animation: scaleIn 0.5s ease-out forwards;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(1); /* Final state */
}

/* Background fade-in */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Content scale-in while centered */
@keyframes scaleIn {
  from {
    transform: translate(-50%, -50%) scale(0.7); /* Centered and small */
    opacity: 0;
  }
  to {
    transform: translate(-50%, -50%) scale(1); /* Centered and full size */
    opacity: 1;
  }
}


/* Close Button Styles */
.close-btn {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Container for the form and other content */
.container {
  max-width: 600px;
  margin: 0 auto;
}

h1 {
  font-size: 1.8em;
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

/* Form Elements Styling */
label {
  font-weight: bold;
  margin-top: 10px;
  display: block;
  color: #333;
}

input[type="text"],
textarea,
input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 1em;
}

textarea {
  resize: vertical;
}

button[type="submit"] {
  background-color: #007bff;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  font-size: 1.2em;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

/* Error message styling */
.message {
  color: red;
  text-align: center;
  margin: 10px 0;
  font-weight: bold;
}

  </style>
</head>
<body>
  
<?= view('partials/header') ?>
<?php if (session()->get('first_login')): ?>
    <!-- Modal HTML -->
    <div id="firstLoginModal" style="display:block;position:fixed; top:0; left:0; width:100%; height:100%; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background:#fff; padding:20px; width:300px; border-radius:8px; text-align:center;">
            <h2 style="color:black;">Welcome!</h2>
            <p>This is your API key:</p>
            <code style="display:block; background:#f0f0f0; padding:10px; word-break:break-all;">
                <?= esc(session()->get('api_key')) ?>
            </code>
            <button id="closeModal" style="margin-top:15px; padding:10px 20px;">Close</button>
        </div>
    </div>
    <script>
document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('firstLoginModal').style.display = 'none';

    fetch('/auth/markFirstLoginDone', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin' // Important to include session cookies
    })
    .then(response => response.json())
    .then(data => {
        console.log('Server response:', data);
    })
    .catch(error => {
        console.error('AJAX error:', error);
    });
});
</script>

   
<?php endif; ?>

<button id="stickyBtn" class="btn btn-primary">Open Modal</button>

<!-- Modal -->
<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="container">
        <h1>Create a New Blog Post</h1>

        <!-- Show any error messages -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="message"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Blog Post Form -->
        <form method="post" action="/blog/save" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="6" required></textarea>

            <label for="media">Upload Image or Video</label>
            <input type="file" name="media" id="media" accept="image/*,video/*">

            <button type="submit">Save Post</button>
        </form>
    </div>
  </div>
</div>

<br><br>

<?php if (session()->get('api_key')): ?>
<div class="blog-container">
  <?php if (!empty($posts)): ?>
    
    <!-- Featured Post -->
    <div class="featured-post mb-4">
      <img src="/uploads/sss.jfif" alt="Featured Image" class="featured-img">
      <div class="content">
        <div class="meta"><?= esc($posts[0]['category'] ?? 'Category') ?> • <?= esc($posts[0]['created_at']) ?></div>
        <h2><?= esc($posts[0]['title']) ?></h2>
        <p><?= esc($posts[0]['content']) ?></p>
        <div class="author">
          <img src="/uploads/sss.jfif" alt="">
          <span><?= esc($posts[0]['author'] ?? 'Author') ?></span>
        </div>
      </div>
    </div>

    <!-- All Other Posts -->
    <div class="sub-posts-grid">
      <?php foreach (array_slice($posts, 1) as $post): ?>
        <div class="sub-post">
          <img src="/uploads/sss.jfif" alt="Image">
          <div class="meta"><?= esc($post['category'] ?? 'Category') ?> • <?= esc($post['created_at']) ?></div>
          <h5><?= esc($post['title']) ?></h5>
          <p><?= esc($post['content']) ?></p>
          <div class="author">
            <img src="/uploads/sss.jfif" alt="">
            <span><?= esc($post['author'] ?? '') ?></span>
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



</body>
<script>
// Get the modal and button elements
var modal = document.getElementById("myModal");
var btn = document.getElementById("stickyBtn"); // Assuming you have a sticky button to open the modal
var closeBtn = document.getElementsByClassName("close-btn")[0];

// Open the modal when the button is clicked
btn.onclick = function() {
    modal.style.display = "block";
    modal.style.opacity = "1"; // Ensure the modal has full opacity when shown
}

// Close the modal when the "x" is clicked
closeBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>
</html>