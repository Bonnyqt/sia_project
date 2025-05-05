

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog Grid Layout</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #1e293b;
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
      gap: 20px;
      list-style: none;
    }

    nav ul li {
      cursor: pointer;
      color: #94a3b8;
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

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
    }

    .card {
      background-color: #0f172a;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .card-content {
      padding: 16px;
    }

    .category-date {
      font-size: 12px;
      color: #94a3b8;
      margin-bottom: 8px;
    }

    .card-title {
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 8px;
    }

    .card-desc {
      font-size: 14px;
      color: #cbd5e1;
      margin-bottom: 12px;
    }

    .author {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .author img {
      width: 28px;
      height: 28px;
      border-radius: 50%;
    }

    .author span {
      font-size: 13px;
      color: #94a3b8;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">LV</div>
    <nav>
      <ul>
        <li>UI Design</li>
        <li>Front-end</li>
        <li>Back-end</li>
        <li>Library</li>
      </ul>
    </nav>
    <div class="search-box">
      <input type="text" placeholder="Search" />
    </div>
  </header>

  <div class="grid">
  <?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
    <div class="card">
      <img src="https://media.istockphoto.com/id/814423752/photo/eye-of-model-with-colorful-art-make-up-close-up.jpg?s=612x612&w=0&k=20&c=l15OdMWjgCKycMMShP8UK94ELVlEGvt7GmB_esHWPYE=" alt="Blog Image" />
      <div class="card-content">
     
        <div class="category-date"><?= esc($post['created_at']) ?></div>
        <div class="card-title"><?= esc($post['title']) ?></div>
        <div class="card-desc"><?= esc($post['content']) ?></div>
      
        <div class="author">
          <img src="https://media.istockphoto.com/id/814423752/photo/eye-of-model-with-colorful-art-make-up-close-up.jpg?s=612x612&w=0&k=20&c=l15OdMWjgCKycMMShP8UK94ELVlEGvt7GmB_esHWPYE=" alt="Avatar">
          <span>Leslie Alexander • UI Designer</span>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>No posts yet.</p>
    <?php endif; ?>
  </div>
</body>
</html>