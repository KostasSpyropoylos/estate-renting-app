<?php
// Start the session
session_start();
require 'db_connection.php'; // Assuming this file contains your database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['uname']); // Assuming the username field in the form is 'uname'
    $password = trim($_POST['password']); // Assuming the password field in the form is 'password'

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Username or password cannot be empty.";
        exit;
    }

    // Prepare SQL statement to fetch user details
    if ($stmt = $conn->prepare('SELECT id, username, first_name, last_name, password,email FROM users WHERE username = ?')) {
        $stmt->bind_param('s', $username); // Bind parameters
        $stmt->execute(); // Execute the prepared statement
        $stmt->store_result(); // Store the result set

        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $first_name, $last_name, $hashed_password, $email); // Bind result variables
            $stmt->fetch(); // Fetch the result

            // Verify the password
            if ($password == $hashed_password) {
                // Password is correct
                $_SESSION['user_id'] = $id; // Store user ID in session
                $_SESSION['username'] = $username; // Store username in session
                $_SESSION['firstName'] = $first_name; // Store first name in session
                $_SESSION['lastName'] = $last_name; // Store last name in session
                $_SESSION['email'] = $email; // Store email in session

                header('Location: /'); // Redirect to a welcome page or dashboard
                exit;
            } else {
                echo "Invalid username or password."; // Incorrect password
            }
        } else {
            echo "Invalid username or password."; // User not found
        }

        $stmt->close(); // Close the prepared statement
    } else {
        echo "Failed to prepare statement."; // Error preparing statement
    }
} else {
    // If the form is not submitted via POST, redirect back to the login form or handle as needed
    echo "Invalid request method."; // Error for invalid request method
}
