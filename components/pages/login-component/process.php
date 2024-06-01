<?php
// Start the session
session_start();
require 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['uname']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Username or password cannot be empty.";
        exit;
    }
    if ($stmt = $conn->prepare('SELECT id, username, password FROM users WHERE username = ?')) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashed_password);
            $stmt->fetch();
                // echo $stmt;
                echo $hashed_password;
            if ($password== $hashed_password) {
                // Password is correct
                
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header('Location: /'); // Redirect to a welcome page or dashboard
                exit;
            } else {
                echo "Invalid username or password1.";
            }
        } else {
            echo "Invalid username or password2.";
        }
    
        $stmt->close();
    } else {
        echo "Failed to prepare statement.";
    }
} else {
    // If the form is not submitted, redirect back to the login form
    echo "Invalid request method.";
}


?>
