<?php
// Start the session



// Get the request URI and remove any query string
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');

// Define your routes
$routes = [
    '/' => 'components\pages\login-component\login-component.php',
    // '/login' => '../views/login.php',
    // '/process' => '../views/process.php',
    '/home' => 'index.php',
    '/logout' => 'components\layout\logout.php',
    // Add more routes as needed
];

// Check if the request URI matches a defined route
if (array_key_exists($requestUri, $routes)) {
    include $routes[$requestUri];
} else {
    // Handle 404 Not Found
    http_response_code(404);
    echo "404 Not Found";
}
?>
