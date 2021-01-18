<?php
  include('php/server.php');

  $first_name= $_SESSION['first_name'];
  $user_id= $_SESSION['user_id'];
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
  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>
      Welcome
    </title>
    <meta charset="UTF-8">
  </head>

  <body style="background-image: url('images/gettyimages-1023304270-2048x2048.jpg');">
    <div class="nbody" style="margin: 100px 400px; overflow: hidden; width: 600px;">
      <form method="GET" action="login.php">
        <h1> Welcome <?php echo $first_name; ?></h1>
        <p>
          Your login details are as stated below.<br/><br/>
         User ID: <?php echo $user_id; ?></p>

        <button type="submit" name="login" id="login" class="w3-button w3-block w3-dark-grey" style="padding: 5px 10px; border-radius:4px; width:20%; position:relative; left:10px;">Login</button>
    </div>
  </body>
</html>
