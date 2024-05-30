
  <style>
  
    .cards {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      /* grid-template-columns: repeat(auto-fill, minmax(230px, 1fr)); */
      grid-gap: 20px;
    }

    .card {
      display: grid;
      grid-template-rows: max-content 200px 1fr;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
        0 6px 20px 0 rgba(0, 0, 0, 0.19);
      width: 430px;
      text-align: center;
    }

    .card img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
    footer {
      background-color: black;
      color: white;
    }
    h2 {
      margin: 0 0 8px;
      font-size: 1.5em;
      color: #333;
    }
    p {
      margin: 4px 0;
      color: #666;
    }
    .price {
      font-weight: bold;
      color: #000;
    }
    .book-button {
      display: block;
      width: 100%;
      padding: 10px 0px;
      text-align: center;
      background-color: #28a745;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-top: 12px;
    }
  </style>
      <?php
    session_start();

    include("components\layout\header.php");
      ?> 
    <main>
      <div class="cards">
        <article class="card">
          <a 
            href="components\pages\house-details-component\house-details-component.php"
          >
            <img src="/assets/images/houses/house1.jpg" srcset="" />
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
          <img src="/assets/images/houses/house1.jpg" srcset="" />
          <div class="content">
            <h2>Τίτλος Ακινήτου</h2>
            <p>Περιοχή: Αθήνα</p>
            <p>Πλήθος δωματίων: 3</p>
            <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
            <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
          </div>
        </article>
        <article class="card">
          <a
            href="/components/pages/house-details-component/house-details-component.html"
          >
            <header>
              <h2>A short heading</h2>
            </header>
            <img src="/assets/images/houses/house1.jpg" srcset="" />
            <div class="content">
              <p>
                The idea of reaching the North Pole by means of balloons appears
                to have been entertained many years ago.
              </p>
            </div>
          </a>
        </article>
        <article class="card">
          <img src="/assets/images/houses/house1.jpg" srcset="" />
          <div class="content">
            <h2>Τίτλος Ακινήτου</h2>
            <p>Περιοχή: Αθήνα</p>
            <p>Πλήθος δωματίων: 3</p>
            <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
            <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
          </div>
        </article>
        <article class="card">
          <img src="/assets/images/houses/house1.jpg" srcset="" />
          <div class="content">
            <h2>Τίτλος Ακινήτου</h2>
            <p>Περιοχή: Αθήνα</p>
            <p>Πλήθος δωματίων: 3</p>
            <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
            <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
          </div>
        </article>
        <article class="card">
          <img src="/assets/images/houses/house1.jpg" srcset="" />
          <div class="content">
            <h2>Τίτλος Ακινήτου</h2>
            <p>Περιοχή: Αθήνα</p>
            <p>Πλήθος δωματίων: 3</p>
            <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
            <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
          </div>
        </article>
        <article class="card">
          <img src="/assets/images/houses/house1.jpg" srcset="" />
          <div class="content">
            <h2>Τίτλος Ακινήτου</h2>
            <p>Περιοχή: Αθήνα</p>
            <p>Πλήθος δωματίων: 3</p>
            <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
            <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
          </div>
        </article>
        <article class="card">
          <img src="/assets/images/houses/house1.jpg" srcset="" />
          <div class="content">
            <h2>Τίτλος Ακινήτου</h2>
            <p>Περιοχή: Αθήνα</p>
            <p>Πλήθος δωματίων: 3</p>
            <p class="price">Τιμή ανά διανυκτέρευση: €100</p>
            <a href="interface3.html" class="book-button">Κράτηση ακινήτου</a>
          </div>
        </article>
      </div>
    </main>


  </body>

</html>
