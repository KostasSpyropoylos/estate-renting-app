<?php

// Destroy the session
session_destroy();

// Redirect to the login form
header("Location: /");
exit();
?>
