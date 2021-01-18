<?php
  include("php/phplogin.php");
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

    if(isset($_POST['set_learner_slot']))
    {
      $learner_dates=$_POST['learners_dates'];
      $learners_time=$_POST['learners_time'];
      $number_of_seatsL=$_POST['number_of_seats'];
      $slot_numberL=$_POST['slot_numberL'];

      try
      {
      $insert= $conn->prepare("INSERT INTO schedule(date,time,user_id,number_of_seats,license,slot_number)
      VALUES ('$learner_dates','$learners_time','$user_id','$number_of_seatsL','Learners','$slot_numberL')");
      $insert->execute();

      }

      catch(Exception $e)
      {
        $error="Error: ".$e->getMessage();
      }
    }

    elseif(isset($_POST['set_drivers_slot']))
    {
      $drivers_dates=$_POST['drivers_dates'];
      $drivers_time=$_POST['drivers_time'];
      $slot_number=$_POST['slot_numberD'];

      try
      {
      $insert=$conn->prepare("INSERT INTO schedule(date,time,user_id,number_of_seats,license,slot_number)
      VALUES ('$drivers_dates','$drivers_time','$user_id','1','Drivers','$slot_number')");
      $insert->execute();
      }

      catch(Exception $e)
      {
        $error="Error: ".$e->getMessage();
      }

    }
 ?>

<!DOCTYPE html>
<!--Administrators Interface-->
<html lang="en">
  <title>
    Mafikeng Traffic Department
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="images/gettyimages-807660962-2048x2048.jpg" alt="Me" width="1500" height="600">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1  style="top:50px; color:#5a97f2;"class="w3-hide-medium w3-hide-small w3-xxxlarge">Mafikeng</h1>
    <h5 class="w3-hide-large" style="white-space:nowrap color:#fcfafa;">North West</h5>
    <h3 class="w3-hide-medium w3-hide-small" style="color:#5a97f2;">Booking Management</h3>
  </div>

  <!-- Navigation bar (placed at the bottom of the header image) -->
  <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px;">
    <a href="adminindex.php" class="w3-bar-item w3-button">Home</a>
    <a href="users.php" class="w3-bar-item w3-button">View All Users</a>
    <a href="bookingsmade.php" class="w3-bar-item w3-button">View Bookings Made</a>
	  <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
  </div>
</header>

<!-- Navigation bar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
  <div class="w3-bar w3-light-grey">
    <a href="adminindex.php" class="w3-bar-item w3-button">Home</a>
    <a href="users.php" class="w3-bar-item w3-button">View All Users</a>
    <a href="bookingsmade.php" class="w3-bar-item w3-button">View Bookings Made</a>
    <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
  </div>
</div>

<!--Learner's-->
    <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="learners">
      <h3 class="w3-center">Set the learner's license testing slots below.</h3>
      <hr>

      <form action="" method="Post">
        <table style="padding:15px; border-spacing:10px;">
        <div class="w3-section">
          <tr>
            <td><label> Date for test</label></td>
            <td><input type="date" id="learners_dates" name="learners_dates"></td>
          </tr>
        </div>

        <div class="w3-section">
          <tr>
            <td><label>Time</label></td>
            <td><input type="time" id="learners_time" name="learners_time"></td>
          </tr>
        </div>

        <div class="w3-section">
          <tr>
            <td><label>Number Of Seats</label></td>
            <td><input type="number" id="number_of_seats" name="number_of_seats" required></td>
          </tr>
        </div>

        <div class="w3-section">
          <tr>
            <td><label>Slot Number</label></td>
            <td><input type="number" id="slot_numberL" name="slot_numberL" required></td>
          </tr>
        </div>
        </table>
        <button type="submit" class="w3-button w3-block w3-dark-grey" id="set_learner_slot" name="set_learner_slot" onclick="showAlert()">Set Slots</button>
      </form>
    </div>


    <!--Driver's-->
    <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="drivers">
      <h3 class="w3-center">Set the driver's license testing slots below.</h3>
      <hr>

      <form action="" method="POST">
        <table style="padding:15px; border-spacing:10px;">
          <div class="w3-section">
            <tr>
              <td><label>Date for test</label></td>
              <td><input type="date" id="drivers_dates" name="drivers_dates"></td>
            </tr>
          </div>

          <div class="w3-section">
            <tr>
              <td><label>Time</label></td>
              <td><input type="time" id="drivers_time" name="drivers_time"></td>
            </tr>
          </div>

          <div class="w3-section">
            <tr>
              <td><label>Slot Number</label></td>
              <td><input type="number" id="slot_numberD" name="slot_numberD" required></td>
            </tr>
          </div>
        </table>
          <button type="submit" name="set_drivers_slot" id="set_drivers_slot" class="w3-button w3-block w3-dark-grey" onclick="showAlert()">Set Slots</button>
      </form>
</body>
<script src="js/alerts.js">
</script>
</html>
