<?php

/*
 *  ATTEMTION
 * Let's try to stick to one variable naming convention
 * If you want to use under_score as seperators, do
 * if it is camelCase, fine
 * if it is PascalCase, fine
 */

require_once 'dbconnection.php';
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $msg = "You are already logged in";
    header("location:../dashboard.php?error=You are already Loggedin");
    /*Why can't the name be called success
 *
 * A URL that reads error while reporting a positive message?
 * Why can't the name be called success
 * Or more genric like message or status
 */

}
if (isset($_POST['loginBtn'])) {
    $password = $_POST['password'];
    $dec_password = md5($password);
    $useremail = $_POST['email'];
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        //we are going to use this part for when we want to implement "remember me"
        //   if (isset($_POST["remember"])) {
        //     setcookie("heraclesuser", $_POST["fullname"], time() + (30 * 24 * 60 * 60));
        // } else {
        //     if (isset($_COOKIE["heraclesuser"])) {
        //         setcookie("heraclesuser", "");
        //     }

        /*
         * Even if we are going to implemet this, it should not prevent your code from working
         * Why have it commented out?
         * it wointbreak your code ot prevent the user from logging in if it's there
         */

        $extra = "welcome.php";
        /*
         * An this was never user in this file, jsyu declared
         */
        $_SESSION['loggedin'] = true;
        $_SESSION['login'] = $_POST['email'];
        /*
         * A varialbel login set to an email address, Hmmmn?
         */
        $_SESSION['id'] = $num['id'];
        $_SESSION['name'] = $num['fullname'];
        $host = $_SERVER['HTTP_HOST'];
        /*
         * And why are we fetch the host,
         * What is it being used for?
         */

        $msg = "Logged in successfully";
        /*
         *  Why was $msg declared if if is not going to be used
         * I guess you wanted to use it in the redirect below
         */
        header("location:../dashboard.php?error=Logged_In_successfully");

        exit();
    } else {
        header("location:../signin.php?error=Invalid_Username_and_Password");
        exit();
    }
}
