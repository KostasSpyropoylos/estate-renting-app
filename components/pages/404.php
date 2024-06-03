<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
}

header h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #0071c2; /* Booking.com blue */
}

header p {
    font-size: 18px;
    margin-bottom: 20px;
}

.image-container img {
    max-width: 100%;
    border-radius: 10px;
    margin-bottom: 20px;
}

.search-container input,
.search-container button {
    padding: 10px;
    margin: 5px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.search-container button {
    background-color: #ff5a5f; /* Airbnb red */
    color: #fff;
    border: none;
    cursor: pointer;
}

.buttons a {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    text-decoration: none;
    border-radius: 5px;
}

.buttons .explore {
    background-color: #ff5a5f; /* Airbnb red */
    color: #fff;
}

.buttons .homepage {
    background-color: #0071c2; /* Booking.com blue */
    color: #fff;
}

footer p {
    font-size: 14px;
    margin-top: 20px;
}

footer a {
    color: #0071c2; /* Booking.com blue */
    text-decoration: none;
}

</style>
<body>
    <div class="container">
        <header>
            <h1>Oops! We couldn't find that page.</h1>
            <p>Looks like the page you're trying to visit isn't available. But don't worry, we have plenty of amazing places for you to discover.</p>
        </header>
        <div class="image-container">
            <img src="cozy-home.jpg" alt="Cozy stay">
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search destination">
            <input type="date" placeholder="Check-in">
            <input type="date" placeholder="Check-out">
            <input type="number" placeholder="Guests">
            <button>Search</button>
        </div>
        <div class="buttons">
            <a href="/" class="explore">Explore Homes</a>
            <a href="/" class="homepage">Go to Homepage</a>
        </div>
        <footer>
            <p>Need help? Visit our <a href="#">Help Center</a> or <a href="#">Contact Support</a>.</p>
        </footer>
    </div>
</body>
</html>
