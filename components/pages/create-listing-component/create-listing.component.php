<?php
  include("components\layout\header.php");
    ?> 
    <style>
        <?php include('components\pages\create-listing-component\create-listing.style.css')?>
    </style>
   <div class="main">
    <div class="container">
        <h1>Δημιουργία Αγγελίας</h1>
        <form id="listingForm" enctype="multipart/form-data">
            <label for="photo">Φωτογραφία του ακινήτου:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required><br>

            <label for="title">Τίτλος:</label>
            <input type="text" id="title" name="title" pattern="[A-Za-zα-ωΑ-Ω ]+" required><br>

            <label for="location">Περιοχή:</label>
            <input type="text" id="location" name="location" pattern="[A-Za-zα-ωΑ-Ω ]+" required><br>

            <label for="rooms">Πλήθος δωματίων:</label>
            <input type="number" id="rooms" name="rooms" min="1" required><br>

            <label for="price">Τιμή ανά διανυκτέρευση:</label>
            <input type="number" id="price" name="price" min="1" required><br>

            <button type="submit">Αποθήκευση</button>
        </form>
        <p id="message"></p>
    </div>
    </div> 
</body>
</html>
