<!DOCTYPE html>
<html>
  <head>
    <title>Sign in</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="components\pages\login-component\login-style.css" />
  </head>
  <body>
    <div class="main">
      <form action="/home" method="post">
        <div class="imgcontainer">
          <svg
            width="50px"
            height="50px"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z"
              stroke="#01204E"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z"
              stroke="#01204E"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
              stroke="#01204E"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>

        <div class="container">
          <div class="item">
            <input type="text" placeholder="Username" name="uname" required />
          </div>
          <div class="item">
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <div class="actions-container">
            <span class="psw">Not a member yet?</span>
            <a href="/components/pages/signup-component/signup-component.html" class="signup">Signup</a>
          </div>
          <div class="item login-btn">
            <button href="#" class="login-btn">Login</button>
          </div>
        </div>
      </form>
    </div>
  </body>

  <?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    // Store email and password in session variables
    $_SESSION['uname'] = $uname;
    $_SESSION['password'] = $password;

    // Redirect to a welcome page or any other page
    
    header("Location: /home");
    exit();
} else {
    // If the form is not submitted, redirect back to the form
    // header("Location: ../../../index.php");
    exit();
}
?>
</html>
