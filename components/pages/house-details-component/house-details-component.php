<?php
// Start the session

// Check if email and password are set in the session
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $uname = $_SESSION['username'];
} else {
    // If the session variables are not set, redirect back to the form
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
        <!-- <div class="header">
          <h3>Villa Aktaia, 4 br & private pool close to Parikia</h3>
        </div> -->
        <div class="main-content">
          <div class="grid image-container">
            <div class="column">
              <img
                src="/assets/images/houses/house2.jpg"
                alt=""
                class="image-right"
              />
            </div>
            <div class="column-grid">
              <img
                src="/assets/images/houses/house1.jpg"
                alt=""
                style="border-radius: 0em 0em 0em 1em"
              />
              <img src="/assets/images/houses/house3.jpg" alt="" />
              <img
                src="/assets/images/houses/house5.jpg"
                alt=""
                style="border-radius: 0em 0em 1em 0em"
              />
            </div>
            <div class="column actions">
              <input
                type="date"
                name=""
                placeholder="Select Your Dates"
                id=""
              />
              <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">1 Guest</button>

                <div class="dropdown-content">
                  <div class="guests-container">
                    <div class="guest">
                      <span>Adults</span>
                      <div class="actions">
                        <button
                          class="removeGuest"
                          onclick="removeGuest(event.currentTarget)"
                        >
                          -
                        </button>
                        <span class="adultGuest">1</span>
                        <button
                          class="addGuest"
                          onclick="addGuest(event.currentTarget)"
                        >
                          +
                        </button>
                      </div>
                    </div>
                    <hr class="dotted" />
                    <div class="children">
                      <span>Children</span>
                      <div class="actions">
                        <button class="removeGuest">-</button>
                        <span class="childrenGuest">0</span>
                        <button class="addGuest" onclick="addGuest(event.currentTarget)">+</button>
                      </div>
                    </div>
                    <hr class="dotted" />
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
            <p><strong>Address:</strong> 1234 Maple Street, Springfield, IL</p>
            <p><strong>Bedrooms:</strong> 4</p>
            <p><strong>Bathrooms:</strong> 3</p>
            <p><strong>Square Footage:</strong> 2,500 sq ft</p>
            <p><strong>Lot Size:</strong> 0.5 acres</p>
            <p>
              <strong>Description:</strong> This beautiful family home is
              located in a quiet suburban neighborhood. It features a spacious
              living room, a modern kitchen, and a large backyard perfect for
              entertaining. The master bedroom includes an en-suite bathroom and
              a walk-in closet.
            </p>
            <p>
              <strong>Contact Information:</strong> For more information or to
              schedule a viewing, please contact Jane Doe at (555) 123-4567 or
              jane.doe@example.com.
            </p>
          </div>
        </div>
      </div>

      <script>
        function removeGuest(currentTarget) {
          if (currentTarget.classList.contains("removeGuest")) {
            let adult = document.querySelector(".adultGuest");
            if (Number(adult.innerHTML > 1)) {
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
        function myFunction() {
          document.querySelector(".dropdown-content").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
          if (!event.target.matches(".dropbtn")) {
            var dropdowns = document.querySelector(".dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
              }
            }
          }
        };
      </script>
    </main>
  </body>
</html>
