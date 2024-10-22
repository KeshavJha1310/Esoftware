<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" type="image" href="images\favicon.ico.png"> 
    <title>Completed</title>
    <!-- <link rel="stylesheet" href="./global.css" /> -->
    <link rel="stylesheet" href="./thank.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@700&display=swap"
    />
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <style>
      @keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

      </style>
  </head>
  <body>
    <div class="history">
      <div class="history-child"></div>
      <div class="history-item"><a href="./history.php">History</a></div>
      <div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
      <div class="history-inner"></div>
      <div class="line-div"></div>
      <div class="history-child1"></div>
      <div class="history-child2"></div>
      <div class="history-child3"></div>
      <div class="history-child4"></div>
      <b class="water"><a href="./water.php" style="text-decoration: none;color: black;">Water</a></b>
      <b class="fuel-gas" id="fuelGas"> <a href="./fuel.php" style="text-decoration: none;color: black;">Fuel & Gas</a> </b>
      <b class="electricity" id="electricityText"> <a href="./electricity.php" style="text-decoration: none;color: black;">Electricity</a> </b>
      <b class="about-us" id="aboutUsText" ><a href="./aboutUs.php" style="text-decoration: none;color: black;"> About Us</a></b>
      <b class="history1"> <a href="./history.php" style="text-decoration: none;color: black;"> History</a></b>
      <div class="rectangle-div"><a href="./history.php" style="text-decoration: none;color: black;">History</a></div>

      <div class="history2" style="animation: blink 1s infinite;">Thank You !</div>

      <?php
      session_start(); // Start the session
      if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
      } else {
      // Check if the session variables are se (isset($_SESSION['result']) && isset($_SESSION['notification'])) {
   
          $username = $_SESSION['username'];
          $string = "All for to day";
          // Output the result and notification on this page
          echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;'>"; // Centering container
      echo "<h1 style='font-size: 40px;z-index: inherit ;position:relative;top: -50px;left: 200px; font-family: TimesNewRoman; '>$username </h1>
     <p1 style='font-size: 36px; position:relative;top: 50px;left: 200px;font-family: TimesNewRoman; color: black> $string</p1>";
      echo "</div>"; // Close centering container
      
          
          // Clear the session variables
          // unset($_SESSION['result']);
          // unset($_SESSION['notification']);
      }
      ?>
      <b class="next" id="nextText">Next</b>
      <!-- <img class="vector-icon" alt="" src="./public/vector.svg" /> -->
    </div>

    <script>
      var waterText = document.getElementById("waterText");
      if (waterText) {
        waterText.addEventListener("click", function (e) {
          // Please sync "Calculation" to the project
        });
      }
      
      var fuelGas = document.getElementById("fuelGas");
      if (fuelGas) {
        fuelGas.addEventListener("click", function (e) {
          // Please sync "CalculationF" to the project
        });
      }
      
      var electricityText = document.getElementById("electricityText");
      if (electricityText) {
        electricityText.addEventListener("click", function (e) {
          // Please sync "CalculationE" to the project
        });
      }
      
      var aboutUsText = document.getElementById("aboutUsText");
      if (aboutUsText) {
        aboutUsText.addEventListener("click", function (e) {
          // Please sync "About Us " to the project
        });
      }
      
      var nextText = document.getElementById("nextText");
      if (nextText) {
        nextText.addEventListener("click", function (e) {
          // Please sync "About Us " to the project
        });
      }
      </script>
  </body>
</html>
