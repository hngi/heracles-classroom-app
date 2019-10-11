<?php require_once ("server.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signin.css">
    <title>Heracle|sign-in</title>
</head>
<body>
       <div class="mobile">
                <div class="bg-white form animated slideInLeft ">
                <?php
                 if (isset($_GET["error"])) {
                    if ($_GET['error']=='Invalid_Username_and_Password') {
                         echo '<p><p style = "text-align:center" class="text-danger"> Invalid username or password</p><p>';
                        }
                        elseif($_GET["error"]=="worked"){
                         echo '<p><p style = "text-align:center" class="text-success"> PLease Check you email for your password</p><p>';

                        }
                        
                        elseif($_GET["error"]=="notworked"){
                            echo '<p><p style = "text-align:center" class="text-danger"> Something went wrong </p><p>';
                              }
                     }
                    ?>
                        <form action="includes/login.inc.php" method="post" class="form-container" onsubmit="return formValidation();" >
                            <div class="form-header">
                                <img class="heracles-logo" src="https://res.cloudinary.com/benjee/image/upload/v1569459183/Heracles_Logo_2_qve8nw.svg" alt="Heracles">
                                <!-- notification message -->
                                <?php if (isset($_SESSION['success'])) : ?>
                                  <div class="error success" >
                                    <h3>
                                      <?php 
                                        echo $_SESSION['success']; 
                                        unset($_SESSION['success']);
                                      ?>
                                    </h3>
                                  </div>
                                <?php endif ?>    
                                <h1>Login to your account</h1>
                            </div>
                            <div class="email-content">
                                <!-- <label for="email" class="pt-2">EMAIL ADDRESS</label> -->
                                <input type="email" id="email" class="form-control fc" name="email" value="<?php echo $_SESSION['old_input']['email'] ?? '' ?>" placeholder = 'Email address'>
                            </div> <br/>
                            <div class="pwrd-content">
                                    <!-- <label for="password">PASSWORD</label> -->
                                    <input type="password" id="password" name="password" class="form-control fc" value="<?php echo $_SESSION['old_input']['password'] ?? '' ?>" placeholder='Password'>                                
                                    </div> <br/>
                            <div class="button">
                                <button class="form-control btn"  name="loginBtn"type="submit">Login</button>
                            </div> <br/>
                        </form>
                            <form method="get" action="password-recovery/enter_email.php" class="button">
                                <button class="form-control btn"  name="reset-password" type="submit">forgot Password?</button>
                            </form> <br/>
                            <div class="register d-flex">
                                <p class="mx-auto"> No account yet?
                                    <a class="nav-item text-dark" href="signup.php">Sign up</a>
                                </p>
                            </div>
                    </div>
           </div>
       <!-- <div class="main-content row">
           <div class="col-12 d-flex">
           <img class="img-fluid my-4 mx-auto" src="https://res.cloudinary.com/benjee/image/upload/v1569253813/undraw_chore_list_iof3_s3yoyc.svg" alt="sign-in-svg-image">
        </div>
        <div class=" bg-white form d-flex">
            <form action="" class="form-group mx-auto">
                <h4 class="font-weight-bolder">Log in to Create Your Heracle Account</h4>
                <div class="email-content">
                    <label for="email" class="pt-2">EMAIL</label>
                    <input type="email" class="form-control fc">
                </div> <br/>
                <div class="pwrd-content">
                        <label for="password">PASSWORD</label>
                        <input type="password" class="form-control fc">
                    </div> <br/>
                <div class="button">
                    <button class="form-control btn" type="submit">Login</button>
                </div> <br/>
                <div class="register">
                    <p>Dont have an account?
                        <a class="nav-item" href="#">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div> -->
   </div>
   
   <script src="js/signin.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
