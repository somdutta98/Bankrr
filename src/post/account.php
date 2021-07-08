<?php
session_start();
ob_start();
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
        $_SESSION['Code'] = 1234;

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
      $Code = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['Code']));
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
      if($Code == $_SESSION['Code'])
      {
        unset($_SESSION['code_error']);
       
        $query = "INSERT INTO register(user_name,user_email,user_phone,user_address,user_pass,user_gender)";
        $query .= "VALUES ('$UserName','$UserEmail', '$UserPhone', '$Address','$confirm_userPassword',  '$gender')";
        $connection = mysqli_query($db_connection,$query);

       if(!$connection){
    die(mysqli_error($db_connection));
 }
  else{
     
       $query = "SELECT * FROM register WHERE user_email = $UserEmail";
       $connection = mysqli_query($db_connection,$query);
       $row = mysqli_fetch_assoc($connection);
       $user_id = $row['user_id'];
         $Iquery = "INSERT INTO user_detail(user_id,user_pan,user_doc,user_doc_no,user_doc_image,user_image)";
         $Iquery .= "VALUES('$user_id','$Pan','$doc','$docNo','$DocImage','$UserImage')"
            $Iconnection = mysqli_query($db_connection,$Iquery);

       if(!$Iconnection){
    die(mysqli_error($db_connection));
 }
 else{

       $query = "SELECT * FROM register WHERE user_email = $UserEmail";
       $connection = mysqli_query($db_connection,$query);
       $row = mysqli_fetch_assoc($connection);
       $user_id = $row['user_id'];
        $squery = "INSERT INTO account_detail(user_id branch_id account_no  account_type  mpin)";
         $Iquery .= "VALUES('$user_id','$Pan','$doc','$docNo','$DocImage','$UserImage')"
            $Iconnection = mysqli_query($db_connection,$squery);


 }


                
      }
    }
    ?>