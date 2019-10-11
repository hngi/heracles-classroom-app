<?php
//this is a simple forgot password script
require_once('dbconnection.php');
ob_start();
session_start();



if(isset($_POST['send']))
{
$Yemail = $_POST['email'];
$row1=mysqli_query($con,"select email,password from users where email='$Yemail'");
$row2=mysql_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}
