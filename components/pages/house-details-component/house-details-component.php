<?php
//Include database connection
require 'components/pages/login-component/db_connection.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo 'Invalid property ID';
    exit();
}

/*
  Check if username and user_id are set in the session
  Then fetch the right listing by the id passed in the url
*/ 
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $uname = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];

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
        echo 'Something went wrong with the statement';
        exit();
    }
} else {
    // If the session variables are not set, redirect back to the login form
    header("Location: /login");
    exit();
}
/* Checks which form triggered the post request
  If firstForm triggered the event then search db if there is availability
  If secondForm triggered the event insert the values to reservation table
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $step = $_POST['step'] ?? 'firstForm';
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    if ($step == 'firstForm') {
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
    } elseif ($step == 'secondForm') {
        $name = $_POST['firstName'];
        $surname = $_POST['lastName'];
        $email = $_POST['email'];
        $pricePerNight = $listing['price_per_night'];
        // this converts the date difference from msecs to actual days
        $days = (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
        $totalAmount = $days * $pricePerNight;

        // Insert reservation into the database
        $sql = "INSERT INTO reservations (user_id, property_id, start_date, end_date, total_price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iissd', $user_id, $id, $startDate, $endDate, $totalAmount);

        if ($stmt->execute()) {
            // Redirect to the same listing by id with a success message
            header("Location: /listing-details?id=$id&status=success");
            exit();
        } else {
            echo 'Failed to make the reservation';
        }

        $stmt->close();
        $conn->close();
        exit();
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
            <input type="hidden" name="step" value="firstForm">
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
        <form id="userDetailsForm" method="post" action="/listing-details?id=<?php echo $id; ?>">
          <input type="hidden" name="step" value="secondForm">
          <input type="hidden" name="startDate" id="step2StartDate">
          <input type="hidden" name="endDate" id="step2EndDate">
          Όνομα: <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>" required>
          Επώνυμο: <input type="text" id="lastName" name="lastName" value="Παπαδόπουλος" required>
          Email: <input type="email" id="email" name="email" value="giannis@example.com" required>
          <p>Συνολικό Ποσό: <span id="totalAmount"></span> &euro;</p>
          <button type="submit">Κράτηση</button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include("components/layout/foot.php"); ?>

<script>
  // Gets the value from the date fields and 
  function checkAvailability(event) {
    event.preventDefault();

    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    if (!startDate || !endDate) {
      alert("Παρακαλώ επιλέξτε τις ημερομηνίες!");
      return;
    }
    // Initialisation of AJΑΧ request to pass data for backend
    const xhr = new XMLHttpRequest();
    // Sends the data to the  URL /listing-details?id=
    xhr.open('POST', '/listing-details?id=<?php echo $id; ?>', true); 
    // Encodes data 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xhr.onreadystatechange = function() {
      /* 
      xhr.readyState=== 4 the state is finished
      xhr.status === 200 is successfull
      */
      if (xhr.readyState === 4 && xhr.status === 200) {
        if (xhr.responseText.trim() === 'available') {
          document.getElementById('contact-info').style.display = 'block';
          document.getElementById('step2StartDate').value = startDate;
          document.getElementById('step2EndDate').value = endDate;

          fillUserDetails();

          const startDateObj = new Date(startDate);
          const endDateObj = new Date(endDate);
          const pricePerNight = <?php echo json_encode($listing['price_per_night']); ?>;
          const days = Math.ceil((endDateObj - startDateObj) / (1000 * 60 * 60 * 24));
          const totalAmount = days * pricePerNight;
          document.getElementById('totalAmount').textContent = totalAmount;
        } else {
          alert('Το ακίνητο δεν είναι διαθέσιμο για τις επιλεγμένες ημερομηνίες. Παρακαλώ επιλέξτε άλλες ημερομηνίες.');
        }
      }
    };
    // sends the dates through the url in order to be checked for availability
    xhr.send(`startDate=${encodeURIComponent(startDate)}&endDate=${encodeURIComponent(endDate)}`);
  }
// Sets the details of logged in user
  function fillUserDetails() {
    document.getElementById('firstName').value = '<?php echo htmlspecialchars($_SESSION['firstName'] ?? ''); ?>';
    document.getElementById('lastName').value = '<?php echo htmlspecialchars($_SESSION['lastName'] ?? ''); ?>';
    document.getElementById('email').value = '<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>';
  }
  // Listener that informs user that the reservation was successful
  window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
      alert('Η κράτησή σας ήταν επιτυχής!');
    }else if (urlParams.get('status') === 'success') {
      alert('Κάτι πήγε στραβά!');
    }
  };
</script>
