<?php
  include('php/phpmake booking.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <title>
    Make Booking
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<!-- Header -->
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
    <a href="renewals.php" class="w3-bar-item w3-button">Make Renewal</a>
    <a href="view booking.php" class="w3-bar-item w3-button">View Booking</a>
	  <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
  </div>
</header>

<!-- Navigation bar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
  <div class="w3-bar w3-light-grey">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="renewals.php" class="w3-bar-item w3-button">Make Renewal</a>
    <a href="view booking.php" class="w3-bar-item w3-button">View Booking</a>
    <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
  </div>
</div>

<!--Learners-->
<div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="learners">
  <h3 class="w3-center">Book for your Learner's license below.</h3>
  <hr>

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="w3-section">
      <label>Time</label>
              <select name='Time-slotL'>
                <option>Select a suitable slot</option>
                <?php
                  $query= $conn->query("SELECT * FROM schedule WHERE license='Learners'");

                  if($query)
                  {
                      while($learners_data= $query->fetch(PDO::FETCH_ASSOC))
                      {
                          $license=$learners_data['Learners'];
                          $date=$learners_data['date'];
                          $time=$learners_data['time'];

                          echo "<option>$date At $time</br></option>";
                      }

                      $sql_number_of_seats--;
                      $update_seats= $conn->prepare("UPDATE schedule SET number_of_seats='$sql_number_of_seats'
                      WHERE date='$date' AND time='$time' AND license='Learners'");
                      $update_seats->execute();
                    }
                ?>
              </select>
    </div>

  </br>
  <div class="w3-section">
    Banking details:<br/>
    Account Number:<br/>
    Bank:<br/>
    Reference: "User Number, License"<br/>
  </div>
  <br/>

    <div class="w3-section">
      <label>Upload a certified copy of your eye-test certificate</label>
      <input type="file" name="certificate">
      <button type="submit" class="w3-button" name="upload_eye_test">Upload</button>
    </div>
  </br>

    <div class="w3-section">
      <label>Upload a certified copy of your ID</label>
      <input type="file" name="id">
      <button type="submit" class="w3-button" name="upload_id">Upload</button>
    </div>

  </br>
    <div class="w3-section">
      <label>Upload your Proof of Payment</label>
      <input type="file" name="POP">
      <button type="submit" class="w3-button" name="upload_POP">Upload</button>
    </div>

    <button type="submit" class="w3-button w3-block w3-dark-grey" name="set_learner_date" onclick="make_booking()">Send</button>
  </form>
</div>

<!--Drivers-->
<div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="drivers">
      <h3 class="w3-center">Book for your Driver's license below.</h3>
      <hr>

      <form action="" method="Post" enctype="multipart/form-data">
        <div class="w3-section">
          <form action="" method="Post">
            <div class="w3-section">
              <label>Time</label>
              <select name='Time-slotD'>
                <option>Select a suitable slot</option>
                <?php
                  $query= $conn->query("SELECT * FROM schedule WHERE license='Drivers'");

                  if($query)
                  {

                    while($drivers_data= $query->fetch(PDO::FETCH_ASSOC))
                    {
                      $sql_number_of_seats= $associated_fetched['number_of_seats'];
                        $license=$drivers_data['Drivers'];
                        $date=$drivers_data['date'];
                        $time=$drivers_data['time'];

                        echo "<option>$date At $time</br></option>";
                    }

                    $sql_number_of_seats--;
                    $update_seats= $conn->prepare("UPDATE schedule SET number_of_seats='$sql_number_of_seats'
                    WHERE date='$date' AND time='$time' AND license='Drivers'");
                    $update_seats->execute();
                  }
                ?>
              </select>
            </div>
        </div>

      </br>
        <div class="w3-section">
          <label>Upload a certified copy of an eye-test certificate</label>
          <input type="file" name="certificate">
          <button type="submit" class="w3-button" name="upload_eye_test_drivers">Upload</button>
        </div>
      </br>

        <div class="w3-section">
          <label>Upload your learner's license</label>
          <input type="file" name="id">
          <button type="submit" class="w3-button" name="upload_learners">Upload</button>
        </div>

      </br>
        <div class="w3-section">
          <label>Upload your Proof of Payment</label>
          <input type="file" name="POP">
          <button type="submit" class="w3-button" name="upload_POP">Upload</button>
        </div>

        <button type="submit" class="w3-button w3-block w3-dark-grey" name="set_drivers_date" onclick="make_booking()">Send</button>

      </form>
    </div>
  </div>

<!-- End page content -->
</div>

</body>
<script src="js/alerts.js">
</script>
</html>
