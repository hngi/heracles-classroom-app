<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="settings.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <main class="container">
            <header class="nav-header">                <span><a href="#"><img src="https://res.cloudinary.com/ottyhaq/image/upload/v1569400432/Heracles_Logo_1_m0sxzt.png" alt="Heracles"></a></span>
                <span><a href="#"><img class="icon" src="https://res.cloudinary.com/ottyhaq/image/upload/v1569400431/Vector_6_fjie50.png" alt="username" width="30" height="30"></a>Username</span>
            </header>
            <div class="settings-contain">
                <section class="nav-left">
                    <div class="nav-links">
                         <a href="index.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" width="30" height="30"></span>Home</a>
                        <a href="currencyconverter.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" width="30" height="30"></span>Currency-Converter</a>
                        <a href="settings.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/settings_ffgo0r.svg" width="30" height="30"></span>Settings</a>
                        <a href="includes/logout.inc.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" width="30" height="30"></span>Log out</a>
                    </div>
                </section>
                <section class="settings-header">
                    <div class="header">
                        <span>
                            <p>
                            <img src="https://res.cloudinary.com/benjee/image/upload/v1569337224/home-icon-silhouette_vzxxtu.svg" alt="home" width="30" height="30">
                            Settings
                            </p>
                        </span>
                        <p>Profile Settings</p>
<p class="">Change password</p>
                    </div>
                    <div class="settings-content">
                    <form method="POST" action="includes/changePassword.php">
                        <div class="form-group">
                            <label for="InputEmail1">Email address</label>
                            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Password</label>
                            <input type="password" class="form-control" id="InputPassword1"name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="InputPassword2">New Password</label>
                            <input type="password"name="newPassword" class="form-control" id="InputPassword2" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="InputPassword3">confirm new password</label>
                            <input type="password" name="confirmNewPassword" class="form-control" id="InputPassword3" placeholder="Password">
                        </div>
                        <button type="submit"name="changePwd" class="btn btn-primary">Submit</button>
                        </form>
                    
                        <!-- <img src="https://res.cloudinary.com/ottyhaq/image/upload/v1569403826/Rectangle_5_t4rgzw.png">   -->
                    </div>
                    <div class="logout">
                        <a href="#"><img src="https://res.cloudinary.com/benjee/image/upload/v1569349789/Group_18.1_mddzax.svg" alt="Heracles"></a>
                    </div>
                </section>  
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="" async defer></script>
    </body>
</html>