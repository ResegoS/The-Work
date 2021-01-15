<?php
  include('php/phplogin.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="utf-8">
    <title>
      Login
    </title>
  </head>

  <body style="background-image: url('images/gettyimages-1184421719-2048x2048.jpg');">
    <div class="nbody" style="margin: 50px 500px; overflow: hidden; width: 500px; height:800px">
      <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="login_form">

        <form action="" method="POST" enctype="multipart/form-data">
          <table style="padding:15px; border-spacing:10px;">
            <th style="text-align:center; font-size:18px;" colspan="2">Welcome! Sign In below</th>
            <div class="w3-section">
              <tr>
                <td><label>User ID</label></td>
                <td><input type="text" name="user_id" id="user_id" required></td>
              </tr>
            </div>

            <div class="w3-section">
              <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password" id="password" required></td>
              </tr>
            </div>
          </table>

          <input type="submit" id="login" name="login" class="w3-button w3-block w3-dark-grey" style="padding: 5px 10px; border-radius:4px; width:20%; position:relative; left:100px;" value="Sign In"/>

          <p>
            <a href="registration.php" style="font-weight:bold; position:relative; left:28px;">
              New? Sign Up
            </a>
          </p>
        </form>
      </div>
    </div>

      <!--<script src="JS/login.js"></script>-->
  </body>
</html>
