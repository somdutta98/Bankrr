<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_POST['create']))
    {
      $UserName = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['name']));
      $UserEmail = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['email']));
       $UserPhone = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['phone']));
        $Pan = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pan']));
         $Address = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['address']));
           $gender = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['gender']));
           $doc = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['doc']));
           $docNo = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['doc_no']));
           $UserImage = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['user_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['user_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../../assets/$UserImage");
  
  $DocImage = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['doc_image']['name']));
    $tmp_image = htmlspecialchars(mysqli_real_escape_string($db_connection,$_FILES['doc_image']['tmp_name']));
    move_uploaded_file($tmp_image, "../../assets/$DocImage");
    
      $branch = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['branch']));
      $AccType = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['type']));
      $UserPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['password']));
      $confirm_userPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['ConfirmPassword']));
      
   if(strlen($UserPassword) >= 6){
   if($UserPassword == $confirm_userPassword)
   {
      $query = "SELECT * FROM register WHERE user_email = '$UserEmail'";
      $connection = mysqli_query($db_connection,$query);
      $count = mysqli_num_rows($connection);
      if($count == 0)
      {
        $_SESSION['UserName'] = $UserName;
        $_SESSION['UserEmail'] = $UserEmail;
        $_SESSION['user_phone'] = $UserPhone;
         $_SESSION['Pan'] = $Pan;
        $_SESSION['Address'] = $Address;
          $_SESSION['gender'] = $gender;
           $_SESSION['doc'] = $doc;
           $_SESSION['docNo'] = $docNo;
            $_SESSION['UserImage'] = $UserImage;
             $_SESSION['DocImage'] = $DocImage;
              $_SESSION['branch'] = $branch;
               $_SESSION['AccType'] = $AccType;
           $_SESSION['confirm_userPassword'] = $confirm_userPassword;
        $_SESSION['MCode'] = 1234;
        $_SESSION['ECode'] = 5678;

        unset($_SESSION['Register_error']);
       header("Location: ../verification.php");
      }
    else
    {
echo $_SESSION['Register_error'] = "You are already registered";
//header("Location: ../register.php");
    }
    }

else 
{
  echo $_SESSION['Register_error'] = "Confirm password not matching";
  //header("Location: ../register.php");
}
}
else{
    $_SESSION['Register_error'] = "Password should be greater than 6";
    //header("Location: ../sign-in.php");
}
    }
 elseif(isset($_POST['ver_submit']))
    {
      $MCode = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['MCode']));
      $ECode = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['ECode']));
     $UserName = $_SESSION['UserName'];
         $UserEmail = $_SESSION['UserEmail'];
       $UserPhone =   $_SESSION['user_phone'];
        $Pan =  $_SESSION['Pan'];
         $Address = $_SESSION['Address'];
        $gender = $_SESSION['gender'];
            $doc = $_SESSION['doc'] ;
           $docNo =  $_SESSION['docNo'];
            $UserImage = $_SESSION['UserImage'];
             $DocImage = $_SESSION['DocImage'];
              $branch = $_SESSION['branch'];
               $AccType = $_SESSION['AccType'];
               $confirm_userPassword = $_SESSION['confirm_userPassword'];
      if(($MCode == $_SESSION['MCode']) && ($ECode == $_SESSION['ECode']))
      {
        unset($_SESSION['code_error']);
       
        $query = "INSERT INTO register(user_name,user_email,user_phone,user_address,user_pass,user_gender,attempts,login_time,logout_time)";
        $query .= "VALUES ('$UserName','$UserEmail', '$UserPhone', '$Address','$confirm_userPassword',  '$gender',3,0,0)";
        $connection = mysqli_query($db_connection,$query);

       if(!$connection){
    die(mysqli_error($db_connection));
 }
  else{
     
       $query = "SELECT * FROM register WHERE user_email = '$UserEmail'";
       $Connection = mysqli_query($db_connection,$query);
       $row = mysqli_fetch_assoc($Connection);
       $user_id = $row['user_id'];
         $Iquery = "INSERT INTO user_detail(user_id,user_pan,user_doc,user_doc_no,user_doc_image,user_image)";
         $Iquery .= "VALUES('$user_id','$Pan','$doc','$docNo','$DocImage','$UserImage')";
            $connection = mysqli_query($db_connection,$Iquery);

       if(!$connection){
    die(mysqli_error($db_connection));
 }
 else{

       $query = "SELECT * FROM user_detail WHERE user_id = '$user_id'";
       $connection = mysqli_query($db_connection,$query);
       $Row = mysqli_fetch_assoc($connection);        
   $detail_id = $Row['user_detail_id'];
       $account_number = $detail_id.rand(1000,10000);
       $mpin = rand(100,1000);
        $squery = "INSERT INTO account_detail(user_id, branch_id, account_no, account_type, mpin)";
         $squery .= "VALUES('$user_id','$branch','$account_number','$AccType','$mpin')";
            $Iconnection = mysqli_query($db_connection,$squery);

            header("Location: ../successful.php");
                if(!$connection){
    die(mysqli_error($db_connection));
 }
 else{
  echo "not okay";
 }


 }


                
      }
    }
  }



      elseif(isset($_POST['signup']))
    {
      $UserName = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['name']));
      $UserEmail = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['email']));
      $UserPhone = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['phone']));
      $UserNum = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['num']));
      $UserPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['user_pass']));
      $confirm_userPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['confirm_userPassword']));
      $UserPhone = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['user_phone']));
     // $gender = $_POST['gender'];
   if($UserPassword == $confirm_userPassword)
   {
      $query = "SELECT * FROM user_detail";
      $connection = mysqli_query($db_connection,$query);
      $row = mysqli_num_rows($connection);
      $phone = $row['$user_phone'];
      $num = $row['$user_num'];



     }
   }

    ?>