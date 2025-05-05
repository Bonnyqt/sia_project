<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Blog Post</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 600;
            color: #444;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin: 20px 0;
            color: red;
            font-weight: bold;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #555;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #007bff;
        }

        @media (max-width: 640px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            button {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
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

        <!-- Link to view all posts -->
        <a href="/blog/list" class="back-link">📖 View All Posts</a>

        <!-- Logout Link -->
        <?php if (session()->get('user_id')): ?>
            <a href="/logout" class="logout-link">Logout</a>
        <?php endif; ?>
    </div>
</body>


</html>
