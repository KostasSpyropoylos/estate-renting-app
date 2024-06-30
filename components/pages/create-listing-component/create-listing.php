<?php
// session_start();
require 'components/pages/login-component/db_connection.php';


// Checks where user is logged in
if (!isset($_SESSION['user_id'])) {
    $response['message'] = 'Πρέπει να συνδεθείτε για να καταχωρήσετε μια αγγελία.';
    echo json_encode($response);
    exit();
}

try {
    $user_id = $_SESSION['user_id'];

    // Get the data from the form
    $photo = $_FILES['photo'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $rooms = $_POST['rooms'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $photo_tmp_name = $photo['tmp_name'];
    $photo_name = basename($photo['name']);
    $photo_dir = 'assets/images/houses/' . $photo_name;

    // Creates the file to desired location on server and executes the script
    if (move_uploaded_file($photo_tmp_name, $photo_dir)) {
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO properties (photo, title, area, num_rooms, price_per_night, `description`, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissss", $photo_name, $title, $location, $rooms, $price, $description, $created_at, $updated_at);

        if ($stmt->execute()) {
            header('Location: /?status=success');
        } else {
        }

        $stmt->close();
    }
} catch (Exception $e) {
    echo $e;
}

$conn->close();
