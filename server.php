<?php
session_start();

// initializing variables
$fullname = "";
$email    = "";
$password = "";
$confirmPassword = "";
$mobile = "";
$errors = array(); 

// connect to the database
define('DB_SERVER', "us-cdbr-iron-east-02.cleardb.net");
define('DB_USER',"b0ae198915bb2d");
define('DB_PASS' ,"16a1a0d0");
define('DB_NAME', "heroku_6639abf7d3c0725");

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }


// REGISTER USER
if (isset($_POST['regBtn'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['mobile'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $captcha = $_POST['g-recaptcha-response'];

  if (empty($fullname)) { array_push($errors, "First Name cannot be blank"); return false; }
    if (empty($email)) { array_push($errors, "Email cannot be blank"); return false;}
    if (empty($phone)) { array_push($errors, "Phone Number cannot be blank"); return false;}
    if (empty($password)) { array_push($errors, "Password cannot be blank"); return false; }
    if ($password != $confirmPassword) {
  array_push($errors, "The two passwords do not match"); return false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
    array_push($errors, "Invalid Email"); return false;
  }
  if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
      array_push($errors, "Only letters and white space allowed for firstname"); 
      return false;
    }

    if(!preg_match("/^[0-9]*$/", $phone) || strlen($phone) != 11){
      array_push($errors, "Nigeria Number Only e.g 09012345678");
      return false;
    }

    if(strlen($fullname) < 5){
      array_push($errors, "Fullname cannot be less than 5 characters");
      return false;
    }
    if(strlen($password) < 6){
      array_push($errors, "Password cannot be less than 6 characters");
      return false;
    }

    if(!$captcha){
      array_push($errors, "Please check the captcha if you are not a bot");
      return false;
    }


  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
      if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO users (fullname, email, phone, password) 
          VALUES('$fullname', '$email', '$phone', '$password')";
    mysqli_query($con, $query);
    $_SESSION['fullname'] = $fullname;
    $_SESSION['success'] = "Registeration successful, please login";
    header('Location: signin.php');
  }

}