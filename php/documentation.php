<?php
include('phplogin.php');
  //Eye Test
  if(isset($_POST['upload_eye_test']))
  {
    $user_id=$_SESSION['user_id'];

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
          $upload_eye_test= $conn->exec("INSERT INTO documentation(user_id, doc_type, url, doc_id)
                                        VALUES ('$user_id','Eye-Test','$file_name','')");
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
    //$user_id=$_SESSION['user_id'];
    $_SESSION['user_id']=$user_id;
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
        $file_path= 'documentation/'.$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->exec("INSERT INTO documentation (user_id, doc_type, url, doc_id)
                                          VALUES ('$user_id','Identity-Document','$new_file_name','')");
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
    //$user_id=$_SESSION['user_id'];
    $_SESSION['user_id']=$user_id;
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
        $new_file_name = $user_id."/Proof Of Payment.".$new_file_ext;
        $file_path= 'documentation/'.$new_file_name;

        if(move_uploaded_file($file_tmp_name, $file_path))
        {
          $upload_eye_test= $conn->exec("INSERT INTO documentation (user_id, doc_type, url, doc_id)
                                          VALUES ('$user_id','Proof Of Payment','$new_file_name','')");
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
