<?php

require '../database/connection.php';

//assuming the name of the submit button is signup-submit
if (isset($_POST['loginBtn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        // array_push($errors, "Please fill in your credentials");
        //  header('Location: ../error.php');
        echo "please Fill every input field";
        exit();

    } else {
        $sql = "SELECT * FROM users WHERE   email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            array_push($errors, "database error");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck) {
                    echo "Wrong password";
                    // array_push($errors, "Wrong password");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['fullname'] = $row['fullname'];
                    // array_push($errors, "Login Successful");
                    echo "SUCCESSFULLY LOGGEDIN";

                    header("Location: ../dashboard.php?login=successs");
                    exit();
                }
            } else {
                // array_push($errors, "Email exists");
                echo "something went wrong";
                header("Location: ../signin.php?error=error");
                exit();
            }
        }
    }
} else {
    header("Location: ../signup.php");
    exit();
}
?>

 <html>
   <main>
   <section>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   <input type="text" name="email" placeholder ="E-mail">
   <input type="password" name="password" id="" placeholder='Password...'>
   <button type="submit" name="loginBtn">Submit</button>
 </form>
</section>
</main>
</body>
</html>
