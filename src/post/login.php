<?php
session_start();
ob_start();
require_once "../include/db.php";
if (isset($_POST['login_submit']))
    {  
        if (!empty($_POST['user_email']) && !empty($_POST['user_pass']))
        {
           $userEmail = htmlspecialchars(mysqli_real_escape_string($db_connection, $_POST['user_email']));
            $userPassword = htmlspecialchars(mysqli_real_escape_string($db_connection, $_POST['user_pass']));
            $query = "SELECT * FROM register WHERE user_email = '$userEmail'";
            $connection = mysqli_query($db_connection, $query);
            $count = mysqli_num_rows($connection);
             $row = mysqli_fetch_assoc($connection);
             $attempts = $row['attempts'];
             $user_id = $row['user_id'];
             if ($attempts == 0){

             	$error_Time = $row['error_time'];
             	$time =  strftime('%Y-%m-%d %H:%M:%S', strtotime($error_Time));
             	date_default_timezone_set("Asia/Kolkata");
                $current = date("Y-m-d H:i:s");
	            $after_time = date("Y-m-d H:i:s",strtotime($time."+2 mins"));

	            if ($current >= $after_time) {
	            	$Query = "UPDATE register SET attempts = 3 WHERE user_id = '$user_id'";
                $Connection = mysqli_query($db_connection,$Query);
                if(!$Connection){
                   die(mysqli_error($Connection));
               }
               else{

               	$_SESSION['attempt'] = "You can now login";
             	header("Location: ../login.php");
               }
	            }
               else{
             	$_SESSION['attempt'] = "You have no attempt left. Come back again after 30 mins.";
             	header("Location: ../login.php");
            }
             } 
          else{
            if ($count == 1)
            {
               
                $db_pass = $row['user_pass'];
                $db_mail = $row['user_email'];
    
                if ($userPassword == $db_pass &&  $userEmail == $db_mail )
                {
                $user_id = $row['user_id'];
                $Query = "UPDATE register SET login_time = NOW(), attempts = 3 WHERE user_id = '$user_id'";
                $Connection = mysqli_query($db_connection,$Query);
                if(!$Connection){
                   die(mysqli_error($Connection));
               }
else
{

                    
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_email'] = $row['user_email'];
                    unset($_SESSION['login_error']);
                    header("Location: ../dashboard.php");
                }
                }
                else
                {
                 $attempt = $attempts-1;
                $UpdateAttempt = "UPDATE register SET attempts = '$attempt' WHERE user_id = '$user_id'";
                $Connection = mysqli_query($db_connection,$UpdateAttempt);

           $query = "SELECT * FROM register WHERE user_id = '$user_id'";
           $connection = mysqli_query($db_connection,$query);
           $row = mysqli_fetch_assoc($connection);
           // $error = $row['error_time'];
           // $_SESSION['error'] = $error;
           $a = $row['attempts'];
           if($a==0){

                       $Query = "UPDATE register SET error_time = NOW() WHERE user_id = '$user_id'";
                $Cconnection = mysqli_query($db_connection,$Query);

           }
                $_SESSION['attempt'] = "You have only ".$attempt." attempt(s) left";
                    $_SESSION['login_error'] = "Please check your password & email";
                  header("Location: ../login.php");
    
                }
            }
              else
            {
                echo $_SESSION['login_error'] = "Please Register Yourself";
                header("Location: ../login.php");
    
            }
        }
    }
        else
        {
            echo $_SESSION['login_error'] = "Please fill all the below fields";
            header("Location: ../login.php");
        }
    

          
      }
?>