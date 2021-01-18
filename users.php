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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <!-- Header -->
  <title>
    Bookings Made
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="the work/css/testees.css">

  <header class="w3-display-container w3-content w3-center" style="max-width:1500px">
    <img class="w3-image" src="images/gettyimages-1205509316-2048x2048.jpg" alt="Me" width="1500" height="600">
    <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
      <h1  style="top:50px; color:#5a97f2;"class="w3-hide-medium w3-hide-small w3-xxxlarge">Mafikeng</h1>
      <h5 class="w3-hide-large" style="white-space:nowrap">North West</h5>
      <h3 class="w3-hide-medium w3-hide-small" style="color:#5a97f2;">Booking Management</h3>
    </div>

    <!-- Navigation bar (placed at the bottom of the header image) -->
    <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px;">
      <a href="adminindex.php" class="w3-bar-item w3-button">Home</a>
      <a href="set slots.php" class="w3-bar-item w3-button">Set Appointment Times</a>
      <a href="bookingsmade.php" class="w3-bar-item w3-button">View Bookings Made</a>
      <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
    </div>

    <!-- Navigation bar on small screens -->
    <div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
      <div class="w3-bar w3-light-grey">
        <a href="adminindex.php" class="w3-bar-item w3-button">Home</a>
        <a href="set slots.php" class="w3-bar-item w3-button">Set Appointment Times</a>
        <a href="bookingsmade.php" class="w3-bar-item w3-button">View Bookings Made</a>
        <a href="login.php" class="w3-bar-item w3-button" name="logout">Logout</a>
      </div>
    </div>
  </header>

  <body>
    <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="users">
      <h3 class="w3-center">Below is a list of all the users registered in the system.</h3>
      <hr>

      <form action="users.php" method="POST">
        <div class="w3-section">
          <div class="w3-table w3-bordered">
            <table id="members" name="members">
              <th>User ID</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>User Type</th>
              <?php
                      //Employees and Clients
                $query= $conn->query("SELECT * FROM users");

                  while($user_data= $query->fetch(PDO::FETCH_ASSOC))
                  {
                    $user_type=$user_data['user_type'];
                    $last_name=$user_data['last_name'];
                    $first_name=$user_data['first_name'];
                    $user_id=$user_data['user_id'];

                    echo
                      "<tr>
                        <td>$user_id</td>
                        <td>$last_name</td>
                        <td>$first_name</td>
                        <td>$user_type</td>
                        <td><select name='roles'>
                            <option>Select Role</option>
                            <option>Admin</option>
                            <option>Employee</option>
                            <option>Client</option>
                        </select></td>
                        <td><button name='role'>Change Role</button></td>
                      </tr>";
                  }

                if(isset($_POST['role']))
                {
                  $selected= $_POST['roles'];

                  $query= $conn->query("UPDATE users SET user_type='$selected' WHERE user_id='$user_id'");
                }
              ?>
            </table>
          </div>
        </div>
      </form>
</div>
  </body>
</html>
