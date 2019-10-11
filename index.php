<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  $msg = "You are already logged in";
  header("location: dashboard.php?message=$msg");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hercules | Home</title>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.2.95/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- NOTE: IF YOU WANT TO ADD ANY CONTRIBUTION PLEASE MAKE SURE IT IS WITHIN THE COMMENTS SO THAT WE CAN KEEP TRACK OF THE CHANGES MADE -->
    
    <main class="container">
        <section class="jumbotron">
            <header>
                <h2>Know your worth<br>with Heracles App!</h2>
            </header>
            <article class="article">
                <p>If you sold all your assets and paid all your debts,</p>
                <p>What would be left?</p>
                <p>That's your net worth, Calculate it here.</p>
            </article>
            <div class="action">
                <a href="signup.php" id="get-started">Get started</a>
                <a href="signin.php" id="login">Log In</a>
            </div>
        </section>
    </main>
    <footer style="z-index:-1;"></footer>

</body>


</html>
