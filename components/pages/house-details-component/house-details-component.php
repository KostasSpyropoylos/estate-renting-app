<?php
// Start the session
require 'components\pages\login-component\db_connection.php';


$id = $_GET['id'];

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
      // Your logic to display or process the listing data
    } else {
      echo 'Listing not found';
    }

    $stmt->close();
  } else {
    echo 'Failed to prepare the statement';
  }
} else {
  // If the session variables are not set, redirect back to the login form
  header("Location: /login");
  exit();
}
?>

<?php
include("components\layout\header.php");
?>


<style>
  <?php include './components/pages/house-details-component/house-details.css'; ?>
</style>
<main>
  <div class="main-container">
    <div class="main-content">
      <div class="grid image-container">
        <div class="column">
          <img src="../assets/images/houses/house2.jpg/" alt="House Image" class="image-right" />
        </div>
        <div class="column-grid">
          <img src="/assets/images/houses/house1.jpg" alt="" style="border-radius: 0em 0em 0em 1em" />
          <img src="/assets/images/houses/house3.jpg" alt="" />
          <img src="/assets/images/houses/house5.jpg" alt="" style="border-radius: 0em 0em 1em 0em" />
        </div>
        <div class="column actions">
          <input type="date" id="datePicker" name="datePicker">

          <div class="dropdown">
            <button class="dropbtn">1 Guest</button>
            <div class="dropdown-content">
              <div class="guests-container">
                <div class="guest">
                  <span>Adults</span>
                  <div class="actions">
                    <button class="removeGuest">-</button>
                    <span class="adultGuest">1</span>
                    <button class="addGuest" onclick="addGuest(event.currentTarget)">+</button>
                  </div>
                </div>
                <hr class="dotted">
                <div class="children">
                  <span>Children</span>
                  <div class="actions">
                    <button class="removeGuest">-</button>
                    <span class="childrenGuest">0</span>
                    <button class="addGuest">+</button>
                  </div>
                </div>
                <hr class="dotted">
                <div class="dogs">
                  <span>Dogs</span>
                  <div class="actions">
                    <button class="removeGuest">-</button>
                    <span>0</span>
                    <button class="addGuest">+</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="house-details">
        <p><strong>Bedrooms:</strong> <?php echo $listing['num_rooms']; ?></p>
        <p>
          <strong>Description:</strong> <?php echo $listing['description']; ?>
        </p>

        </p>
      </div>
    </div>
  </div>
</main>



<?php
include("components/layout/foot.php");
?>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    const dateRangePickerElement = document.getElementById('daterange');

    new daterangepicker(dateRangePickerElement, {
      opens: 'left'
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    })
  });

  function removeGuest(currentTarget) {
    if (currentTarget.classList.contains("removeGuest")) {
      let adult = document.querySelector(".adultGuest");
      if (Number(adult.innerHTML) > 1) {
        let btn = document.querySelector(".dropbtn");
        adult.innerHTML = Number(adult.innerHTML) - 1;
        if (Number(adult.innerHTML) > 1) {
          btn.innerHTML = Number(adult.innerHTML) + " Guests";
        } else {
          btn.innerHTML = adult.innerHTML + " Guest";
        }
      }
    }
  }

  function addGuest(currentTarget) {
    if (currentTarget.classList.contains("addGuest")) {
      let adult = document.querySelector(".adultGuest");
      let btn = document.querySelector(".dropbtn");
      adult.innerHTML = Number(adult.innerHTML) + 1;
      if (Number(adult.innerHTML) > 1) {
        btn.innerHTML = adult.innerHTML + " Guests";
      } else {
        btn.innerHTML = adult.innerHTML + " Guest";
      }
    }
  }
  document.querySelector(".dropbtn").addEventListener("click", function() {
    document.querySelector(".dropdown-content").classList.toggle("show");
  });

  window.addEventListener("click", function(event) {
    if (!event.target.matches(".dropbtn")) {
      var dropdowns = document.querySelectorAll(".dropdown-content");
      dropdowns.forEach(function(dropdown) {
        if (dropdown.classList.contains("show")) {
          dropdown.classList.remove("show");
        }
      });
    }
  });
</script>


</body>

</html>