<?php
  include('phplogin.php');
  $user_id = $_SESSION['user_id'];
  $first_name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];
  //echo $user_id;

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

  if(isset($_POST['upload_eye_test']))
  {
    $user_id = $_SESSION['user_id'];
    //Upload Documentation
    $file= $_FILES['certificate'];
    $file_name= $_FILES['certificate']['name'];
    $file_size= $_FILES['certificate']['size'];
    $file_type= $_FILES['certificate']['type'];
    $file_tmp_name= $_FILES['certificate']['tmp_name'];
    $file_error= $_FILES['certificate']['error'];

    $file_ext= explode('.', $file_name);
    $new_file_ext= strtolower(end($file_ext));

    $allowed= array('pdf','docx');

    if(in_array($new_file_ext, $allowed))
    {
      if($file_error===0)
      {
        $new_file_name = $user_id."/Eye-Test.".$new_file_ext;
        $file_path= 'documentation/'.$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->prepare("INSERT INTO documentation(user_id, doc_type, url, doc_id)
                                        VALUES ('$user_id','Eye-Test','$file_name','')");
                                        $upload_eye_test->execute();
        }

        else
        {
          echo "File was not uploaded.";
        }
      }
    }

    else
    {
      echo"File type invalid.";
    }
  }

  //Identity Document
  if(isset($_POST['upload_id']))
  {
    $user_id = $_SESSION['user_id'];
    //Upload Documentation
    $file= $_FILES['id'];
    $file_name= $_FILES['id']['name'];
    $file_size= $_FILES['id']['size'];
    $file_type= $_FILES['id']['type'];
    $file_tmp_name= $_FILES['id']['tmp_name'];
    $file_error= $_FILES['id']['error'];

    $file_ext= explode('.', $file_name);
    $new_file_ext= strtolower(end($file_ext));

    $allowed= array('pdf','docx');

    if(in_array($new_file_ext, $allowed))
    {
      if($file_error===0)
      {
        $new_file_name = $user_id."/Identity-Document.".$new_file_ext;
        $file_path= "documentation/".$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->prepare("INSERT INTO documentation (user_id, doc_type, url, doc_id)
                                          VALUES ('$user_id','Identity-Document','$new_file_name','')");
                                          $upload_eye_test->execute();
        }

        else
        {
          echo "File was not uploaded.";
        }
      }
    }

    else
    {
      echo"File type invalid.";
    }
  }

  //Proof of Payment
  if(isset($_POST['upload_POP']))
  {
    $user_id = $_SESSION['user_id'];
    //Upload Documentation
    $file= $_FILES['POP'];
    $file_name= $_FILES['POP']['name'];
    $file_size= $_FILES['POP']['size'];
    $file_type= $_FILES['POP']['type'];
    $file_tmp_name= $_FILES['POP']['tmp_name'];
    $file_error= $_FILES['POP']['error'];

    $file_ext= explode('.', $file_name);
    $new_file_ext= strtolower(end($file_ext));

    $allowed= array('pdf','docx');

    if(in_array($new_file_ext, $allowed))
    {
      if($file_error===0)
      {
        $new_file_name = $user_id."/Proof Of Payment".$new_file_ext;
        $file_path= 'documentation/'.$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->prepare("INSERT INTO documentation (user_id, doc_type, url, doc_id)
                                          VALUES ('$user_id','Proof Of Payment','$new_file_name','')");
                                          $upload_eye_test->execute();
        }

        else
        {
          echo "File was not uploaded.";
        }
      }
    }

    else
    {
      echo"File type invalid.";
    }
  }

  //Booking learners appointment
  if(isset($_POST['set_learner_date']))
  {
    if(isset($_POST['Time-slotL']))
    {
      $selectedL= $_POST['Time-slotL'];
      $license='Learners';
      $query1= $conn->query("SELECT * FROM bookings_made WHERE user_id='$user_id' AND license='$license'");
      $verify_query1=$query1->rowCount();

      if($verify_query1<1)
      {
        $make_booking= $conn->prepare("INSERT INTO bookings_made(slot_id, user_id, first_name, last_name, booking, license)
        VALUES ('', '$user_id','$first_name','$last_name','$selectedL','Learners')");
        $make_booking->execute();
      }

      else
      {
        echo "Booking has already been made.";
      }
    }
  }

  //Bookign driver appointment
  if(isset($_POST['set_drivers_date']))
    {
      if(isset($_POST['Time-slotD']))
      {
        $selectedD= $_POST['Time-slotD'];
        $license='Drivers';
        $query1= $conn->query("SELECT * FROM bookings_made WHERE user_id='$user_id' AND license='$license'");
        $verify_query1=$query1->rowCount();


        if($verify_query1<1)
        {
          $make_booking= $conn->prepare("INSERT INTO bookings_made (slot_id, user_id, first_name, last_name, booking, license)
          VALUES ('', '$user_id','$first_name','$last_name','$selectedD','Drivers')");
          $make_booking->execute();
        }

        else
        {
          echo "Booking has already been made.";
        }
      }
    }
?>
