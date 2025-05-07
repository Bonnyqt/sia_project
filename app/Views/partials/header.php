<link rel="icon" type="image/x-icon" href="/uploads/test.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

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


    @font-face {
  font-family: myFirstFont;
  src: url(../uploads/webFont.ttf);
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
      font-size:23px;
      font-family: myFirstFont;
    }

    nav ul li {
      cursor: pointer;
      color:rgb(255, 255, 255);
    }

    nav ul li:hover {
      color: #f8fafc;
    }
    input[type="text"],
textarea,
input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-top: 6px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: box-shadow 0.3s ease, transform 0.3s ease;
}

input[type="text"]:focus,
textarea:focus,
input[type="file"]:focus {
  outline: none;
  box-shadow: 0 0 8px rgba(0, 123, 255, 0.4);
  transform: scale(1.02);
}
@keyframes slideUpFade {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.container {
  animation: slideUpFade 0.6s ease-out;
}
    .search-box input {
      background-color: #334155;
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      color: white;
    }

    header {
    background-color: rgba(128, 128, 128, 0.2); /* semi-transparent grey */
    padding: 15px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px); /* for Safari support */
    position: relative;
    transition: all 0.3s ease-in-out;
}

.sticky {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
    border-radius: 0px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    animation: slideDown 0.3s ease-in-out;
}

@keyframes slideDown {
    from {
        transform: translateY(-100%);
    }
    to {
        transform: translateY(0);
    }
}
nav a {

    transition: all 0.3s ease;
}

nav a:hover, nav a:focus {
    color: #fff; /* Keep the text white on hover */
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6), 0 0 30px rgba(255, 255, 255, 0.4);
}

nav a:active {
    text-shadow: 0 0 15px rgba(255, 255, 255, 0.9), 0 0 25px rgba(255, 255, 255, 0.7), 0 0 35px rgba(255, 255, 255, 0.5);
}

nav a.active {
    color: #fff;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6), 0 0 30px rgba(255, 255, 255, 0.4);
}
#stickyBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  padding: 15px 30px;
  background-color:rgb(45, 31, 122);
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
.modal {
  backdrop-filter: blur(8px); /* NEW */
  -webkit-backdrop-filter: blur(8px); /* Safari support */
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
  background: linear-gradient(135deg, #ffffff, #f0f4f8); /* NEW */
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

.form-group {
        margin-bottom: 1rem;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #333;
    }

    select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        background-color: #f9f9f9;
        color: #333;
    }

    select:focus {
        border-color: #007BFF;
        outline: none;
        background-color: #fff;
    }
</style>


<header class="d-flex justify-content-between align-items-center mb-4">

  <div class="d-flex align-items-center">
  <img src="/uploads/test.png" alt="" style="height:50px; width:50px;">
    <h4 class="ms-2 mt-2" style="font-family: myFirstFont;">Lost & Vocal</h4>
  </div>

  <nav class="flex-grow-1 text-center" >
    <ul class="d-inline-flex mb-0 list-unstyled justify-content-center">
      <li><a href="/" class="text-decoration-none text-light">Home</a></li>
      <li><a href="/blog/list" class="text-decoration-none text-light">Blogs</a></li>
      <li><a href="/blog/about" class="text-decoration-none text-light">About Us</a></li>
      <li><a href="/blog/myposts" class="text-decoration-none text-light">My Posts</a></li>
    </ul>
  </nav>

  <div class="d-flex align-items-center gap-4">
  <?php if (session()->get('api_key')): ?>
 <form method="GET" action="/blog/search">
    <input type="text" name="query" placeholder="Search" class="search-input form-control form-control-sm bg-dark text-white border-0 rounded" style="width: 160px; align-items:center;">
</form><?php endif; ?>
  <style>
      .search-input::placeholder {
        color: white;
        opacity: 1;
        font-family: myFirstFont;
        font-size:20px;
      }
    </style>

    <?php if (!session()->get('user_id')): ?>
        <a href="/login" style="font-family: myFirstFont; font-size:20px; color:white; text-decoration: none; margin-right:10px;">Login</a>
    <?php else: ?>
        <span class="text-white small" style="font-family: myFirstFont; font-size:20px;">Hello, <?= esc(session()->get('username')) ?></span>
        <a href="/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#eb6363" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg></a>
    <?php endif; ?>
  </div>


</header>


<button id="stickyBtn" class="btn"><i class="fas fa-plus"></i> Share your story</button>

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
    <input type="file" name="media" id="media" accept="image/*,video/*,.gif,.avif,.jfif" required>

    <div class="form-group">
    <label for="category">Category</label>
    <select name="category" id="category" required>
        <option value="">-- Select Category --</option>
        <option value="General">General</option>
        <option value="Technology">Technology</option>
        <option value="Education">Education</option>
        <option value="Lifestyle">Lifestyle</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Health">Health</option>
        <option value="Travel">Travel</option>
    </select>
</div>

    <label for="isAnonymous">
        <input type="checkbox" name="isAnonymous" id="isAnonymous" value="true">
        Post as Anonymous
    </label>

    <button type="submit">Save Post</button>
</form>

  </div>
</div>
</div>



<?php if (session()->get('first_login')): ?>
  <!-- Modal HTML -->
  <div id="firstLoginModal" style="
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: linear-gradient(to right, #364050, #192130);
  backdrop-filter: blur(4px);
  z-index: 1000;
  animation: fadeIn 0.4s ease-in-out;
">
  <div class="modal-content" style="
      background: rgba(255, 255, 255, 0.95);
      padding: 30px 25px;
      width: 90%;
      max-width: 400px;
      border-radius: 16px;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
      text-align: center;
      animation: slideUp 0.4s ease-in-out;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  ">
      <h2 style="color: #333; margin-bottom: 15px;">🎉 Welcome!</h2>
      <p style="color: #444;">Here is your unique API key:</p>
      <code style="
          display: block;
          background: #f3f4f6;
          padding: 12px 15px;
          margin: 15px 0;
          font-size: 0.95rem;
          font-family: 'Courier New', Courier, monospace;
          color: #111;
          word-break: break-word;
          border: 1px solid #ddd;
          border-radius: 8px;
      "><?= esc(session()->get('api_key')) ?></code>
      <button id="closeModal" style="
          margin-top: 15px;
          padding: 10px 25px;
          background: #6c5ce7;
          color: #fff;
          font-weight: 600;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          transition: background 0.3s ease;
      " onmouseover="this.style.background='#5a4bcf'" onmouseout="this.style.background='#6c5ce7'">
          Close
      </button>
  </div>
</div>

<style>
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
@keyframes slideUp {
  from { transform: translateY(40px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}
</style>

<script>
document.getElementById('closeModal').addEventListener('click', function () {
  document.getElementById('firstLoginModal').style.display = 'none';
});
</script>

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


<script>
    // Listen for the scroll event and add/remove the sticky class
window.onscroll = function() {
    var header = document.querySelector("header");
    if (window.scrollY > 100) { // Adjust the scroll threshold if needed
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
};
// Add active class to the current page's link
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("nav a");
    links.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add("active");
        }
    });
});

</script>
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