<?php

$Server_name= "localhost";
$DB_name= "voting";
$Username= "root";
$Password= "";

//Create connection
try
{
  $conn= new PDO("mysql:host=$Server_name; dbname=$DB_name", $Username, $Password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo "Happiness.";
}

catch(PDOException $e)
{
  echo "Connection failed: ".$e->getMessage();
}

?>
