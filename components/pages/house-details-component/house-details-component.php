<?php
// Start the session and include database connection
// session_start();
require 'components/pages/login-component/db_connection.php';

$id = $_GET['id'] ?? null;

if (!$id) {
  echo 'Invalid property ID';
  exit();
}

// Check if username and user_id are set in the session
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
  $uname = $_SESSION['username'];

  if ($stmt = $conn->prepare('SELECT * FROM properties WHERE id = ?')) {
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      // Fetch the data and use it as needed
      $listing = $result->fetch_assoc();
    } else {
      echo 'Listing not found';
      exit();
    }

    $stmt->close();
  } else {
    echo 'Failed to prepare the statement';
    exit();
  }
} else {
  // If the session variables are not set, redirect back to the login form
  header("Location: /login");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];

  // Check availability
  $sql = "SELECT * FROM reservations WHERE property_id = ? AND (start_date <= ? AND end_date >= ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('iss', $id, $endDate, $startDate);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo 'unavailable';
  } else {
    echo 'available';
 
  }

  $stmt->close();
  $conn->close();
  exit();

     // Function to get the price per night from the database
     function getPricePerNight($propertyId)
     {
 
       $sql = "SELECT price_per_night FROM properties WHERE id = ?";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param('i', $propertyId);
       $stmt->execute();
       $stmt->bind_result($pricePerNight);
       $stmt->fetch();
 
       $stmt->close();
       $conn->close();
 
       return $pricePerNight;
     }
 
     // Function to calculate the final amount after applying a random discount
     function calculateFinalAmount($pricePerNight, $numNights)
     {
       // Calculate initial payment amount
       $initialAmount = $pricePerNight * $numNights;
 
       // Generate random discount percentage between 10 and 30
       $discountPercentage = rand(10, 30) / 100;
 
       // Calculate final payment amount
       $finalAmount = $initialAmount - ($initialAmount * $discountPercentage);
 
       return $finalAmount;
     }
}
?>

<?php include("components/layout/header.php"); ?>

<style>
  <?php include './components/pages/house-details-component/house-details.css'; ?>
</style>

<main>
  <div class="main-container">
    <div class="main-content">
      <div class="grid image-container">
        <div class="column">
          <img src="../assets/images/houses/house2.jpg" alt="House Image" class="image-right" />
        </div>
        <div class="column-grid">
          <img src="/assets/images/houses/house1.jpg" alt="" style="border-radius: 0em 0em 0em 1em" />
          <img src="/assets/images/houses/house3.jpg" alt="" />
          <img src="/assets/images/houses/house5.jpg" alt="" style="border-radius: 0em 0em 1em 0em" />
        </div>
      </div>
      <div class="description-container">
        <div class="house-details">
          <p><strong>Bedrooms:</strong> <?php echo htmlspecialchars($listing['num_rooms']); ?></p>
          <p><strong>Description:</strong> <?php echo htmlspecialchars($listing['description']); ?></p>
        </div>
        <div class="form-container">
          <h3>Select dates</h3>
          <form id="bookingForm" method="post" onsubmit="checkAvailability(event)">
            <label for="startDate">From Date:</label>
            <input type="date" id="startDate" name="startDate" required>
            <label for="endDate">To Date:</label>
            <input type="date" id="endDate" name="endDate" required>
            <button type="submit" class="book-btn">Book Now</button>
          </form>
        </div>
      </div>
      <div id="contact-info" style="display:none;">
        <h1>Στοιχεία Κράτησης</h1>
        <form id="userDetailsForm">
          Όνομα: <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required>
          Επώνυμο: <input type="text" id="lastName" name="lastName" value="Παπαδόπουλος" required> <!-- Αντικαταστήστε με το πραγματικό επώνυμο -->
          Email: <input type="email" id="email" name="email" value="giannis@example.com" required> <!-- Αντικαταστήστε με το πραγματικό email -->
          <button type="submit">Κράτηση</button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include("components/layout/foot.php"); ?>

<script>
  function checkAvailability(event) {
    event.preventDefault();

    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    if (!startDate || !endDate) {
      alert("Παρακαλώ επιλέξτε τις ημερομηνίες!");
      return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/listing-details?id=<?php echo $id; ?>', true); // Προσθήκη παραμέτρου ID
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText)
        if (xhr.responseText.trim() === 'available') {
          document.getElementById('contact-info').style.display = 'block';
          fillUserDetails();
        } else {
          alert('Το ακίνητο δεν είναι διαθέσιμο για τις επιλεγμένες ημερομηνίες. Παρακαλώ επιλέξτε άλλες ημερομηνίες.');
        }
      }
    };

    xhr.send(`startDate=${encodeURIComponent(startDate)}&endDate=${encodeURIComponent(endDate)}`);
  }

  function fillUserDetails() {
    document.getElementById('firstName').value = '<?php echo htmlspecialchars($_SESSION['firstName']); ?>';
    document.getElementById('lastName').value = '<?php echo htmlspecialchars($_SESSION['lastName']); ?>';
    document.getElementById('email').value = '<?php echo htmlspecialchars($_SESSION['email']); ?>';
    calculateExpense();
  }
</script>