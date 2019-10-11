<?php
require_once('dbconnection.php');
ob_start();
session_start();
if (isset($_POST['regBtn']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['mobile'];
    $Cpassword = $_POST['confirmPassword'];
    $enc_password=md5($password);
    $a=date('Y-m-d');

    if( empty($Cpassword)|| empty($email) || empty($password) || empty($fullname) || empty($contact)){
      header("Location: ../signup.php?error=emptyfields");
      exit();
    }elseif($password !== $Cpassword){
      header("Location: ../signup.php?error=pwd");
      exit();
    }elseif(!preg_match("/^[0-9]+$/", $contact)|| strlen( $contact) > 17 || strlen($contact) < 6){
      header("Location: ../signup.php?error=num");
      exit();
    }

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email)<6){
      header("Location: ../signup.php?error=emails");
      exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $fullname || strlen($fullname)<5)){
      header("Location: ../signup.php?error=name");
      exit();
    }
    else {
        
      

    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

  	if ($user) { // if user exists
    	if ($user['email'] === $email) {
        header("Location: ../signup.php?error=userAlreadyExist");
        exit();
    }
  }

    
    $msg=mysqli_query($con,"insert into users(fullname,email,password,contactno,posting_date) values('$fullname','$email','$enc_password','$contact','$a')");
    if($msg)
    {
      header("Location: ../signin.php");
    }
  }
}
