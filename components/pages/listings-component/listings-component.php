<?php
include("components\layout\header.php");
?>


<style>
  main {
    padding-top: 20px;
    /* Adjust the space from the nav bar here */
  }

  .cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
    margin-top: 20px;
  }

  .card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin: 10px;
    width: calc(33% - 40px);
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

  .content {
    padding: 20px;
  }

  .content h2 {
    font-size: 1.5em;
    margin: 0 0 10px;
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
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
  }

  .book-button:hover {
    background-color: #0056b3;
  }

  @media (max-width: 768px) {
    .card {
      width: calc(50% - 40px);
    }
  }

  @media (max-width: 480px) {
    .card {
      width: 100%;
    }
  }
</style>


<main>
  <div class="cards">
    <!-- Row 1 -->
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <!-- Row 2 -->
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <!-- Row 3 -->
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
    <article class="card">
      <a href="/listing-details">
        <img src="/assets/images/houses/house1.jpg" alt="House Image" />
        <div class="content">
          <h2>Τίτλος Ακινήτου</h2>
          <p>Περιοχή: Αθήνα</p>
          <p>Πλήθος δωματίων: 3</p>
          <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
          <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
        </div>
      </a>
    </article>
  </div>
</main>

</body>

</html>