<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    // Store email and password in session variables
    $_SESSION['uname'] = $uname;
    $_SESSION['password'] = $password;
    echo $uname;
    header("Location: /");
    exit();
} else {
    // If the form is not submitted, redirect back to the login form
    header("Location: /login");
    exit();
}
?>