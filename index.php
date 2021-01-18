<?php
  include("php/phplogin.php");
  $first_name= $_SESSION['first_name'];
  if (!isset($_SESSION['user_id']))
  {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
  }

  if (isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['user_id']);
    header("location: login.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <title>
    Home
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="images/gettyimages-130884194-2048x2048.jpg" alt="Me" width="1500" height="600">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1  style="top:50px; color:#5a97f2;" class="w3-hide-medium w3-hide-small w3-xxxlarge">Welcome <?php echo $first_name; ?></h1>
    <h5 class="w3-hide-large" style="white-space:nowrap color:#0a0a0a;">North West</h5>
    <h3 class="w3-hide-medium w3-hide-small" style="color:#5a97f2;">Booking Management</h3>
  </div>

  <!-- Navigation bar (placed at the bottom of the header image) -->
  <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px;">
    <a href="make booking.php" class="w3-bar-item w3-button">Make Appointment</a>
    <a href="renewals.php" class="w3-bar-item w3-button">Make Renewal</a>
    <a href="view booking.php" class="w3-bar-item w3-button">View Booking</a>
	  <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
  </div>
</header>

<!-- Navigation bar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
  <div class="w3-bar w3-light-grey">
    <a href="make booking.php" class="w3-bar-item w3-button">Make Appointment</a>
    <a href="renewals.php" class="w3-bar-item w3-button">Make Renewal</a>
    <a href="view booking.php" class="w3-bar-item w3-button">View Booking</a>
    <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
  </div>
</div>

</body>
</html>
