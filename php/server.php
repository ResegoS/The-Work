<?php
  include('Connection.php');
  //use PHPMailer\PHPMailer;
  session_start();
  //Registration
  if(isset($_POST['register']))
  {
      //declare variables
      $user_id='';
      $first_name=$_POST['first_name'];
      $last_name=$_POST['last_name'];
      $password= $_POST['password'];
      $confirm_password=$_POST['confirm_password'];
      $email=$_POST['email'];
      $confirm_email=$_POST['confirm_email'];
      $id_number=$_POST['id_number'];
      $nationality=$_POST['nationality'];

      try
      {
        //verifying user
        //checking database
        $query= $conn->query("SELECT email FROM users WHERE email='$email'");
        $user_email= $query->rowCount();

        //verifying email
        if($user_email == 0)
        {
          if($password==$confirm_password)
          {
            if($email==$confirm_email)
            {
              $id_query= $conn->query("SELECT id_number FROM users WHERE id_number='$id_number'");
              $count_id= $id_query->rowCount();

              if($count_id == 0)
              {
                $user_type='Client';

                do
                {
                  //Randomizing the ID
                  $user_id= rand(11111111,99999999);

                  //checking if user ID exists
                  $user_id_query=$conn->query("SELECT user_id FROM users WHERE user_id=$user_id");
                  $user_count= $user_id_query->rowCount();
                  if($user_count==0)
                  {
                    $user_count++;
                  }

                  else
                  {
                    $user_count=0;
                  }
                }while($user_count=0);

                //$hashed_password= password_hash($password, PASSWORD_DEFAULT);

                //Storing data
                $sql=$conn->prepare("INSERT INTO users(user_id,first_name,last_name,password,user_type,email,id_number,nationality)
                VALUES ('$user_id','$first_name','$last_name','$password','$user_type','$email','$id_number','$nationality')");
                $sql->execute();


                /*include('PHPMailer\PHPMailer\PHPmailer.php');

                $mail= new PHPMailer();
                $mail->From='sisiresego.rsg@gmail.com';
                $mail->addAddress='$user_email';
                $mail->Subject= "Greetings";
                $mail->Body="Testing testing";

                if($mail->send())
                {
                  $message="Happiness";
                }

                else{$message="error";}*/

                $_SESSION['user_id'] = $user_id;
                $_SESSION['first_name']=$first_name;

                // Welcome message
                $_SESSION['success'] = "You Have Successfully Registered";
                header('location:welcome.php');
              }

              else {
                echo "Identity Number already exists";
              }
            }

            else
            {
              echo "Emails do not match!";
            }
          }

          else
          {
            echo "Password do not match!";
          }
        }

        else
        {
          echo "Email already exists.";
        }
      }

      catch(PDOException $e)
      {
        $error= "Error: ".$e->getMessage();
      }
  }
