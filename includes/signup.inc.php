<?php

/*
 *  ATTEMTION
 * Let's try to stick to one variable naming convention
 * If you want to use under_score as seperators, do
 * if it is camelCase, fine
 * if it is PascalCase, fine
 */

require_once 'dbconnection.php';
ob_start();
session_start();
if (isset($_POST['regBtn'])) {
    $fullname = $_POST['fullname'];
    /*
     *  NOTE:
     *  Were are storing the 'firtname' and the 'lastname' seperately
     */
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['mobile'];
    $enc_password = md5($password);
    /*
     * How will we do validation if the second password field is not retrieved
     */
    $a = date('Y-m-d');
    /*
     * Let us maintain and user proper naming of our variables
     */

    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        /*
         * If the user already exists
         * why do you need to check if the email from the db and the request is the same
         * Not needed
         */
        if ($user['email'] === $email) {
            header("Location: ../signup.php?error=userAlreadyExist");
            /*
             * The message can be on better form like this
             * "User Already Exist"
             */
            exit();
        }
    }

    $msg = mysqli_query($con, "insert into users(fullname,email,password,contactno,posting_date) values('$fullname','$email','$enc_password','$contact','$a')");
    if ($msg) {
        header("Location: ../signin.php");
    }
}
