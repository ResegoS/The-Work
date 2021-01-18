<?php
  include('phplogin.php');
  $user_id = $_SESSION['user_id'];
  $first_name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];

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

  if(isset($_POST['submit_disk']))
  {
    $license='License Disk';
    $query1= $conn->query("SELECT * FROM renewals WHERE user_id='$user_id' AND renewal='$license'");
    $verify_query1=$query1->rowCount();


    if($verify_query1<1)
    {
      $make_booking= $conn->prepare("INSERT INTO renewals(renewal_id, user_id, first_name, last_name, renewal)
      VALUES ('', '$user_id','$first_name','$last_name','$license')");
      $make_booking->execute();
    }

    else
    {
      echo "Booking has already been made.";
    }
  }

  if(isset($_POST['submit']))
  {
    $license='License';
    $query1= $conn->query("SELECT * FROM renewals WHERE user_id='$user_id' AND renewal='$license'");
    $verify_query1=$query1->rowCount();


    if($verify_query1<1)
    {
      $make_booking= $conn->prepare("INSERT INTO renewals(renewal_id, user_id, first_name, last_name, renewal)
      VALUES ('', '$user_id','$first_name','$last_name','$license')");
      $make_booking->execute();
    }

    else
    {
      echo "Booking has already been made.";
    }
  }

  if(isset($_POST['upload_license_disk']))
  {
    $user_id = $_SESSION['user_id'];
    //Upload license disk
    $file= $_FILES['disk'];
    $file_name= $_FILES['disk']['name'];
    $file_size= $_FILES['disk']['size'];
    $file_type= $_FILES['disk']['type'];
    $file_tmp_name= $_FILES['disk']['tmp_name'];
    $file_error= $_FILES['disk']['error'];

    $file_ext= explode('.', $file_name);
    $new_file_ext= strtolower(end($file_ext));

    $allowed= array('pdf','docx');

    if(in_array($new_file_ext, $allowed))
    {
      if($file_error===0)
      {
        $new_file_name = $user_id."/license_disk.".$new_file_ext;
        $file_path= 'documentation/'.$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->prepare("INSERT INTO documentation(user_id, doc_type, url, doc_id)
                                        VALUES ('$user_id','License Disk','$file_name','')");
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

  if(isset($_POST['upload_license']))
  {
    $user_id = $_SESSION['user_id'];
    //Upload license disk
    $file= $_FILES['license'];
    $file_name= $_FILES['license']['name'];
    $file_size= $_FILES['license']['size'];
    $file_type= $_FILES['license']['type'];
    $file_tmp_name= $_FILES['license']['tmp_name'];
    $file_error= $_FILES['license']['error'];

    $file_ext= explode('.', $file_name);
    $new_file_ext= strtolower(end($file_ext));

    $allowed= array('pdf','docx');

    if(in_array($new_file_ext, $allowed))
    {
      if($file_error===0)
      {
        $new_file_name = $user_id."/license.".$new_file_ext;
        $file_path= 'documentation/'.$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->prepare("INSERT INTO documentation(user_id, doc_type, url, doc_id)
                                        VALUES ('$user_id','Drivers License','$file_name','')");
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
?>
