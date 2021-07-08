<?php
require_once "../include/db.php";
$userEmail = $_POST["userEmail"];
$userName = $_POST["userName"];
$message = $_POST["message"];

 $query = "INSERT INTO contact(contact_name,contact_email,contact_message) ";
  $query .= "VALUES('$userName', ' $userEmail ', '$message')";
   
    $connection = mysqli_query($db_connection, $query);

    if (!$connection)
    {
        die(mysqli_error($db_connection));
    }

    else
    {
echo "Thanks for Contacting Us";
    }



?>