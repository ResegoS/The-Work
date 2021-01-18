<?php
  include('php/phplogin.php');
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

  $user_id=$_SESSION['user_id'];
  $first_name=$_SESSION['first_name'];
  $last_name=$_SESSION['last_name'];
  $booking='';
  $license='';

  $query= $conn->query("SELECT * FROM bookings_made WHERE user_id='$user_id'");
  $verify=$query->rowCount();
  if($verify==1)
  {
    $booking_data=$query->fetch(PDO::FETCH_ASSOC);
    $user_id=$booking_data['user_id'];
    $first_name=$booking_data['first_name'];
    $last_name=$booking_data['last_name'];
    $booking=$booking_data['booking'];
    $license=$booking_data['license'];
  }

  else
  {
    $verify="Data non-existent";
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <title>
  View Booking
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <body>

    <!-- Header -->
    <header class="w3-display-container w3-content w3-center" style="max-width:1500px">
      <img class="w3-image" src="images/gettyimages-130884194-2048x2048.jpg" alt="Me" width="1500" height="600">
      <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
        <h1  style="top:50px; color:#0a0a0a;" class="w3-hide-medium w3-hide-small w3-xxxlarge"></h1>
        <h5 class="w3-hide-large" style="white-space:nowrap color:#0a0a0a;">North West</h5>
        <h3 class="w3-hide-medium w3-hide-small" style="color:#5a97f2;">Booking Management</h3>
      </div>

      <!-- Navigation bar (placed at the bottom of the header image) -->
      <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px;">
        <a href="index.php" class="w3-bar-item w3-button">Home</a>
        <a href="make booking.php" class="w3-bar-item w3-button">Make Appointment</a>
        <a href="renewals.php" class="w3-bar-item w3-button">Make Renewal</a>
    	  <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
      </div>
    </header>

    <!-- Navigation bar on small screens -->
    <div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
      <div class="w3-bar w3-light-grey">
        <a href="index.php" class="w3-bar-item w3-button">Home</a>
        <a href="make booking.php" class="w3-bar-item w3-button">Make Appointment</a>
        <a href="renewals.php" class="w3-bar-item w3-button">Make Renewal</a>
        <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
      </div>
    </div>

    <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="booking">
      <h3 class="w3-center">Below is your appointment for your test.</h3>
      <hr>

      <div class="w3-section">
        <label>User ID: </label>
        <?php echo "<label>$user_id</label>";?>
        <br/>

        <label>Name: </label>
        <?php echo "$first_name $last_name";?>
        <br/>

        <label>Booking: </label>
        <?php echo "$booking";?>
        <br/>

        <label>License: </label>
        <?php echo "$license";?>
        <br/>
      </div>

    </div>
  </body>
</html>
