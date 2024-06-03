<?php
// Start the session
session_start();
// Get the request URI and remove any query string
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
// Define your routes
$routes = [
    '/' => 'components/pages/listings-component/listings-component.php',
    '/listing-details' => 'components\pages\house-details-component\house-details-component.php',
    '/create-listing' => 'components\pages\create-listing-component\create-listing.component.php',
    '/login' => 'components/pages/login-component/login-component.php',
    '/process' => 'components/pages/login-component/process.php',
    '/logout' => 'components\layout\logout.php',
    '/register' => 'components\pages\signup-component\signup-component.php',
];

// Check if the request URI matches a defined route
if (array_key_exists($requestUri, $routes)) {
    include $routes[$requestUri];
} else {
    // Handle 404 Not Found
    http_response_code(404);
    require ('components\pages\404.php');
    die();
}
