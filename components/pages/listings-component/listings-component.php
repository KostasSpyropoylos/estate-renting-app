<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('status') === 'success') {
        alert('Η καταχώρηση έγινε επιτυχώς!');
      }
    });
  </script>
</head>

<body>

  <?php include("components/layout/header.php"); ?>
  <?php require 'components/pages/login-component/db_connection.php'; ?>

  <style>
    main {
      padding-top: 20px;
      /* Adjust the space from the nav bar here */
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      padding: 20px;
      margin-top: 20px;
    }

    .card {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      text-align: left;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card img {
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      width: 100%;
    }

    a:link {
      text-decoration: none;
    }

    a:visited {
      text-decoration: none;
      color: black;
    }

    .content {
      padding: 20px;
    }

    .content h2 {
      font-size: 1.5em;
      margin: 0 0 10px;
      color: #000;
    }

    .content p {
      margin: 0 0 10px;
      color: #555;
    }

    .content .price {
      font-weight: bold;
      color: #000;
    }

    .book-button {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .book-button:hover {
      background-color: #0056b3;
    }

    @media (max-width: 768px) {
      .cards {
        grid-template-columns: 1fr;
        margin-top: 7em;
      }
    }
  </style>

  <main>
    <?php
    // Fetch properties from the database
    $propertiesPerPage = 4;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $propertiesPerPage;

    // Query to fetch properties from the database with pagination, ordered by creation date
    $query = "SELECT * FROM properties ORDER BY created_at DESC LIMIT $offset, $propertiesPerPage";
    $result = mysqli_query($conn, $query);

    // Display properties
    echo '<div class="cards">';
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<article class="card">';
      echo '<a href="/listing-details?id=' . $row['id'] . '">';
      echo '<img src="assets/images/houses/' . htmlspecialchars($row['photo']) . '" alt="House Image" />';
      echo '<div class="content">';
      echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
      echo '<p>Περιοχή: ' . htmlspecialchars($row['area']) . '</p>';
      echo '<p>Πλήθος δωματίων: ' . htmlspecialchars($row['num_rooms']) . '</p>';
      echo '<p class="price">Τιμή ανά διανυκτέρευση: €' . htmlspecialchars($row['price_per_night']) . '</p>';
      echo '<a href="/listing-details?id=' . $row['id'] . '" class="book-button">Κράτηση ακινήτου</a>';
      echo '</div>';
      echo '</a>';
      echo '</article>';
    }
    echo '</div>';
    // Pagination
    $totalRecords = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM properties"));
    $totalPages = ceil($totalRecords / $propertiesPerPage);
    echo '<div class="pagination" style="float:right; margin-bottom:2em;">';
    if ($page > 1) {
      echo '<a href="?page=' . ($page - 1) . '" class="prev">&laquo; Previous</a>';
    }
    if ($page < $totalPages) {
      echo '<a href="?page=' . ($page + 1) . '" class="next">Next &raquo;</a>';
    }
    echo '</div>';

    // Close database connection
    mysqli_close($conn);
    ?>
  </main>

  <?php include("components/layout/foot.php"); ?>

</body>

</html>
