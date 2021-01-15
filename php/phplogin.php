<?php
  include('Connection.php');
  //Start a session
  session_start();

  //Login Code
  if(isset($_POST['login']))
  {
      //Creating some variables
      $first_name='';
      $user_type='';
      $last_name='';
      $user_id= $_POST['user_id'];
      $password= $_POST['password'];

      //Validating User
      $checking_user= $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
      $user_id_check= $checking_user->rowCount();

      //Fetching user's data
      $user_data= $checking_user->fetch();
      $user_type = $user_data['user_type'];
      $first_name = $user_data['first_name'];
      $last_name = $user_data['last_name'];
      $hashed_password = $user_data['password'];

      if($user_id_check== 1)
      {
        //$verified_password= password_verify($password,$hashed_password);
        $password_verifying= $conn->query("SELECT * FROM users WHERE password='$password'");
        $user_password_check=$password_verifying->rowCount();

        if($user_password_check==1)
        {
          if($user_type=="Client")
          {
            $_SESSION['success'] = "happiness";
            $_SESSION['user_id'] = $user_id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            header('location:index.php');
          }

          else
          {
            $_SESSION['success'] = "happiness";
            $_SESSION['user_id'] = $user_id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            header('location:adminindex.php');
          }
        }

        else
        {
          echo"Password Incorrect.";
        }
      }

      else
      {
        echo"Account Does Not Exist!";
      }
  }
?>
