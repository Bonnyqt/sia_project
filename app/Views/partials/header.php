<style>
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
      <li><a href="#" class="text-decoration-none text-light">About Us</a></li>
      <li><a href="#" class="text-decoration-none text-light">Library</a></li>
    </ul>
  </nav>

  <div class="d-flex align-items-center gap-4">
    <input type="text" placeholder="Search" class="search-input form-control form-control-sm bg-dark text-white border-0 rounded" style="width: 160px; align-items:center; margin-top:20px;">
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