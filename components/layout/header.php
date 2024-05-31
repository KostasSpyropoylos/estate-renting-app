<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/components/pages/house-details-component/house-details.css">
  <title>Spitoulis</title>
  <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f0f0f0;
}

nav {
    width: 100%;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    z-index: 1000;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    list-style-type: none;
    margin: 0;
    height: 60px;
}

.navbar .logo {
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
    color: #987070;
}

.flex-right {
    display: flex;
    align-items: center;
}

.search-container {
    margin-right: 20px;
}

.search-box {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 20px;
    overflow: hidden;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.search-input {
    border: none;
    padding: 0.5em;
    width: 250px;
    outline: none;
}

.search-button {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #987070;
    color: white;
    padding: 0.5em;
    cursor: pointer;
}

.search-button svg {
    fill: white;
}

.toggleOptions {
    position: relative;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.toggle-button {
    border: none;
    background: none;
    margin-right: 10px;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 40px;
    left: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 1000;
    height: 150px; /* Καθορισμένο ύψος για το dropdown menu */
    overflow-y: auto; /* Ενεργοποίηση κατακόρυφου scroll εάν το περιεχόμενο υπερβαίνει το ύψος */
}

.dropdown-menu.active {
    display: block;
}

.dropdown-menu a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #333;
}

.dropdown-menu a:hover {
    background-color: #f0f0f0;
}
  </style>
</head>
<?php
// Check if email and password are set in the session
if (isset($_SESSION['uname']) && isset($_SESSION['password'])) {
  $uname = $_SESSION['uname'];
  $password = $_SESSION['password'];
  $link;
} else {
  // If the session variables are not set, redirect back to the form
  header("Location: /login");
  exit();
}
?>


<body>
  <nav>
    <ul class="navbar">
      <li><a class="logo" href="/">Spitoulis</a></li>
      <div class="flex-right">
        <li class="search-container">
          <div class="search-box">
            <input type="text" placeholder="Search a listing" class="search-input" />
            <a class="search-button">
              <svg width="15px" height="15px" viewBox="0 0 24 24" fill="#987070" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </li>
        <li class="toggleOptions">
            <a href="#" class="toggle-button">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H20" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <a href="#" class="toggle-button">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#987070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#987070" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#987070" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            
            <div class="dropdown-menu">
                <a href='/create-listing'>Create Listing</a>
                <a href='/login'>Login</a>
                <a href='/register'>Register</a>
            </div>
            <span><?php echo $uname; ?></span>
        </li>
      </div>
    </ul>
  </nav>

  <script>
    // opens the dropbox
    document.querySelectorAll('.toggle-button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const dropdownMenu = this.parentElement.querySelector('.dropdown-menu');
        if (dropdownMenu) {
            dropdownMenu.classList.toggle('active');
        }
    });
});
// closes the dropbox
document.addEventListener('click', function(event) {
    const isClickInside = event.target.closest('.toggleOptions');
    if (!isClickInside) {
        document.querySelectorAll('.dropdown-menu.active').forEach(menu => {
            menu.classList.remove('active');
        });
    }
});
  </script>