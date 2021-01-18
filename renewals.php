<?php
  include('php/phprenewals.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <title>
      Renewals
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <body>
    <header class="w3-display-container w3-content w3-center" style="max-width:1500px">
      <img class="w3-image" src="images/gettyimages-130884194-2048x2048.jpg" alt="Me" width="1500" height="600">
      <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
        <h1  style="top:50px; color:#5a97f2;" class="w3-hide-medium w3-hide-small w3-xxxlarge"></h1>
        <h5 class="w3-hide-large" style="white-space:nowrap color:#0a0a0a;">North West</h5>
        <h3 class="w3-hide-medium w3-hide-small" style="color:#5a97f2;">Booking Management</h3>
      </div>

      <!-- Navigation bar (placed at the bottom of the header image) -->
      <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px;" >
        <a href="index.php" class="w3-bar-item w3-button">Home</a>
        <a href="make booking.php" class="w3-bar-item w3-button">Make Booking</a>
        <a href="view booking.php" class="w3-bar-item w3-button">View Booking</a>
    	  <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
      </div>
    </header>

    <!-- Navigation bar on small screens -->
    <div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
      <div class="w3-bar w3-light-grey">
        <a href="index.php" class="w3-bar-item w3-button">Home</a>
        <a href="make booking.php" class="w3-bar-item w3-button">Make Booking</a>
        <a href="view booking.php" class="w3-bar-item w3-button">View Booking</a>
        <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
      </div>
    </div>

    <!--License disk renewal-->
    <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="disk">
      <h3 class="w3-center">Renew your license disk below.</h3>
      <hr>

      <form action="" method="POST" enctype="multipart/form-data">
        <table style="padding:15px; border-spacing:10px;">

          <div class="w3-section">
            <tr>
              <td><label>Registration Number</label></td>
              <td><input type="text" id="registration_num" name="registration_num" required></td>
            </tr>
          </div>

        </br>
          <div class="w3-section">
            <label>Upload a certified copy of the license disk</label>
            <input type="file" name="disk">
            <button type="submit" class="w3-button" name="upload_license_disk">Upload</button>
          </div>

        </table>
        <button type="submit" class="w3-button w3-block w3-dark-grey" id="submit_disk" name="submit_disk" onclick="renew_disk()">Submit</button>
      </form>

    </div>

    <!--License renewal-->
    <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="license">
      <h3 class="w3-center">Renew your license below.</h3>
      <hr>

      <form action="" method="POST" enctype="multipart/form-data">
        <table style="padding:15px; border-spacing:10px;">

          <div class="w3-section">
            <tr>
              <td><label>Registration Number</label></td>
              <td><input type="text" id="registration_num" name="registration_num" required></td>
            </tr>
          </div>

        </br>
          <div class="w3-section">
            <label>Upload a certified copy of your eye-test certificate</label>
            <input type="file" name="certificate">
            <button type="submit" class="w3-button" name="upload_eye_test_drivers">Upload</button>
          </div>

        </br>
          <div class="w3-section">
            <label>Upload a certified copy of your Driver's License</label>
            <input type="file" name="license">
            <button type="submit" class="w3-button" name="upload_license">Upload</button>
          </div>

        </table>
        <button type="submit" class="w3-button w3-block w3-dark-grey" id="submit" name="submit" onclick="renew_disk()">Submit</button>
      </form>

    </div>
  </body>
  <script src="js/alerts.js">
  </script>
</html>
