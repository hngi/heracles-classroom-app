<?php

require '../database/connection.php';

if (isset($_POST['regBtn'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $mobile = $_POST['mobile'];

    if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
        // array_push($errors, "One or more fields cannot be empty");
        // exit();
        echo "please something is missing";
        // }
        // elseif((!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fullname)){
        // echo "Invalid Email"
        //   header("Location:  ../signup.php?error=invalidemailsandusername");
        // exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "invalid Email";
        //   array_push($errors, "Please input a correct Email");
        exit();
    } elseif (!preg_match("/[a-zA-Z0-9]/", $fullname)) {
        echo "full name should contain only alphanumeric";
        //   array_push($errors, "please input a correct Username ");
        exit();
    } elseif ($password !== $confirmPassword) {
        echo "password and confirmpassword should match";
        //  array_push($errors, "Password Mismatch");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // array_push($errors, "Connection to db error");
            // exit();
            echo "something is wrong with the database connction ";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows();
            if ($resultCheck > 0) {
                // array_push($errors, "User email already taken ");
                // exit();
                echo "Username has already been taken";
            } else {
                $sql = "INSERT INTO users (fullname, email, pwd ,phone) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Sql error";
                    // array_push($errors, "Sql error");
                    // exit();
                } else {
                    //hashing password using bcrypt
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $hashedPwd, $mobile);
                    mysqli_stmt_execute($stmt);
                    echo "Successful signup";
                    // array_push($errors, "Successfully signed in");
                    // exit();
                    header("Location: ../signin.php");
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <main>

  <section>
    <h1>SignUp</h1>
   <?php
// if(isset($_GET['error'])){
//   if($_GET){
//    echo '<p> Fill in all fields';
//   }elseif($_GET['error'] == "invalid..."){
//     echo "...";
//   }
// }elseif(){

// }
?>
   <html>
   <main>
   <section>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" placeholder ="Username">
        <input type="text" name="email" placeholder ="E-mail">
        <input type="password" name="password" id="" placeholder='Password...'>
        <input type="password" name="confirmpassword" id="" placeholder='Repeat Password...'>
        <button type="submit" name="regBtn">Submit</button>
      </form>
  </section>
</main>
</body>
</html>
