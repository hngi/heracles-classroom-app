<?php
require_once('dbconnection.php');
session_start();
if(isset($_POST['changePwd'])){
  $newPassword = $_POST['newPassword'];
  $confirmNewPassword = $_POST['confirmNewPassword'];
  $password=$_POST['password'];
  $dec_password=md5($password);
  $useremail=$_POST['email'];
    if(empty($password) || empty($newPassword)||empty($confirmNewPassword)|| empty($useremail) ){
      header("Location: ../settings.php?error=emptyfields");
      exit();     
       
    } elseif($password !== $confirmNewPassword){
      header("Location: ../settings.php?error=passwordmatch");
      exit();
    } else{
      $ret= mysqli_query($con,"SELECT password FROM users WHERE email='$useremail' and password='$dec_password'");
      $num=mysqli_fetch_array($ret);
      if($num>0){
        $update_query= "UPDATE users set password='$newPassword' where email='$useremail'";
        $updated = mysqli_query($con,$update_query);
        if($updated){
          header("Location: ../settings.php?error=pwdChanged");
          exit();
        }else{
          header("Location: ../settings.php?error=pwdnotchanged");
        exit();
        }
      }else{
        header("Location: ../settings.php?error=wrongoldpwd");
        exit();
      }
    }
  }