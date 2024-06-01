<?php

$host = 'localhost';
$db = 'ds_estate';
$user = 'root';
$pass = 'Kostas2001!';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>