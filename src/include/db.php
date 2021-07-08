<?php
$db_name= "bankrr";
$db_host= "localhost";
$db_user= "root";
$db_password= "";

$db_connection= mysqli_connect($db_host,$db_user,$db_password,$db_name);


if(!$db_connection)
{
 die(mysqli_error($db_connection));

}

?>