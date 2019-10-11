<?php
session_start();
// include("includes/checklogin.php");
// check_login();

	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="Networth calculator by Team Heracles">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="dashboard.css">
        <!-- Font Awesome Added by @Aphatheology -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    </head>
    <body onload = "callName();get_networth();get_items();get_chart_data();">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>&& $_SESSION["loggedin"] == true
        <![endif]-->
<?php if (isset($_SESSION["loggedin"])): ?>
        <main class="container-fluid" style = 'padding-left:0;padding-right:0;'>
        <header class="nav-header" style = 'left:0px;'>
        <!-- This is used to store the user_id DO NOT REMOVE -->
        <input type="hidden" id="userid" name="userid" value="<?=$_SESSION['id']?>">
            <!-- <span><a href="#">Heracles</a></span> -->
            <!-- <span  id = 'user'><a href="#"> <?php echo $_SESSION['name']?></a></span> -->
            <div class="summary" >
                <div class="networth"  >
                    <p class ='box'>Your Net worth</p>
                    <span id="_networth">00.00</span>
                </div>
                <div class="assets">
                    <p class = 'box'>Your Assets</p>
                    <span id="assetSum">00.00</span>
                </div>
                <div class="liability">
                    <p class='box'>Your Liability</p>
                    <span id="liabilitySum">-00.00</span>
                </div>
            </div>
        </header>

        <div class='small_device'>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </button>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-item " onclick="_reset()"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337224/turn-on_yb5bkw.svg" alt="home" width="30" height="30"></span>reset</div>
                    <a style="color: black" href="profile.html">
                            Profile
                        </a>
                        <br>
                        <a style="color: black" href="settings.php" onclick="get_chart_data()" data-toggle="modal" data-target="#networthchart" role="button">
                            View Chart
                        </a>
                    <a class="dropdown-item" href="includes/logout.inc.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Log out</a>
                </div>
            </div>
            </div>

            <div class="dashboard-contain">
                <section class="nav-left">
                    <div class="nav-links">
                    <a href="index.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Home</a>
                        <a href="currencyconverter.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Currency-Converter</a>
                        <a href="profile.html"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>
                            Profile
                        </a>
                        <a href="settings.php" onclick="get_chart_data()" data-toggle="modal" data-target="#networthchart" role="button">
                            View Chart
                        </a>
                        <div class="reset" onclick="_reset()"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337224/turn-on_yb5bkw.svg" alt="home" width="30" height="30"></span>reset</div>
                        <a href="settings.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/settings_ffgo0r.svg" alt="home" width="30" height="30"></span>Settings</a>
                        <a href="includes/logout.inc.php"><span><img class="icon" src="https://res.cloudinary.com/benjee/image/upload/v1569337223/logout_jimglg.svg" alt="home" width="30" height="30"></span>Log out</a>
                        
                    </div>
                    </div>
                </section>
                <section class="dashboard-header clear_bg">
                    <div class="header">
                    <?php
                 if (isset($_GET["error"])) {
                    if ($_GET['error']=='Logged_In_successfully') {
                        //  echo '<center><h1> Successfully LoggedIn</h1><center>';
                        }else{
                        //  echo '<center><h1> You are already LoggedIn</h1><center>';

                        }  
                     }
                    ?>
                        <!-- <span>
                            <p>
                            <img src="https://res.cloudinary.com/benjee/image/upload/v1569337224/home-icon-silhouette_vzxxtu.svg" alt="home" width="30" height="30">
                            Home
                            </p>
                        </span> -->
                        <span id = 'animate_name' class=''>Welcome, <?php echo $_SESSION['name']?></span>

                    </div>
                    <!-- <div class="summary">
                            <div class="networth">
                                <p>Your Net worth</p>
                                <span>00.00</span>
                            </div>
                            <div class="assets">
                                <p>Your Assets</p>
                                <span id="assetSum">00.00</span>
                            </div>
                            <div class="liability">
                                <p>Your Liability</p>
                                <span>- 00.00</span>
                            </div>
                        </div> -->
                    </section>
                    <section class='dashboard-header'>
                        <!-- <div class="dashboard-content"> -->
                            <div>
                                <h5 class="assets-header">Assets</h5>
                            </div>
                                <div class="row">
                                        <!-- <div class=""> -->
                                            <div class="col-xs col-sm col-d col-lg sub-heading">
                                                <p>Cash</p>
                                                <label for="checking-account">Checking Account</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'  name="checking-account"  >
                                                <label for="savings-account">Savings Account</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="savings-account"  >
                                                <label for="savings-bonds">Savings Bonds</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="savings-bonds"  >
                                                <label for="cds">CDs</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="cds"  >
                                                <label for="other-cash">Other</label>
                                                 <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="other-cash"  >
                                            </div>

                                        <div class="col-xs col-sm col-d col-lg sub-heading">
                                            <p>Insurance</p>
                                            <label for="insurance">Insurance Value</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="insurance"  >
                                            <p>Market value of Home(s)</p>
                                            <label for="primary-residence">Primary Residence</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="primary-residence"  >
                                            <label for="rental">Rental/Vacation properties</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="rental"  >
                                            <p>Retirement Savings</p>
                                            <label for="pensions">Pensions</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="pensions"  >
                                             
                                        </div>

                                        <div class="col-xs col-sm col-d col-lg sub-heading">
                                            <p>Property</p>
                                            <label for="cars">Automobiles</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="cars"  >
                                            <label for="house-furnishing">House Furnishing</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="house-furnishing"  >
                                            <label for="jewellery">Jewellery</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="jewellery"  >
                                            <label for="other-property">Other</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="other-property"  >
                                             <label for="value-of-business" id="business-value">Value of Business you own</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="value-of-business"  >
                                        </div>
                                        
                                        <div class="col-xs col-sm col-d col-lg sub-heading">
                                            <p>Other Investments</p>
                                            <label for="stocks">Stocks</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="stocks"  >
                                            <label for="mutual-funds">Mutual Funds</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="mutual-funds"  >
                                            <label for="others-investments">Others</label>
                                             <input type = 'number' class = 'asset' onchange="store_networth();store_item(event)" oninput = 'inputValidate();displayNetworth()'   name="others-investments"  >
                                            
                                        </div>
                                    <!-- </div> -->
                            </div>
                </section>  
        

            <section class="dashboard-header">
                <div>
                    <h5 class="assets-header">Liability</h5>
                </div>
                <div class="row">
                    <div class="col-xs col-sm col-md col-lg sub-heading">
                        <div>
                            Balance due on debt
                        </div>
                        <div>
                            <label for="student-loan">Student loan</label><br>
                            <input type = 'number' class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()' name="student-loan"  >
                        </div>
                        <div>
                            <label for="mortage">Mortages</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()' name="mortage"  >
                        </div>
                        <div>
                            <label for="other-loans">Other loans</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()' name="other-loans"  >
                        </div>
                        <div>
                            <label for="home-equity-loan">Home equity loans</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()'  name="home-equity-loan"  >
                        </div>
                        <div>
                            <label for="auto-loans">Auto loans</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()' name="auto-loans"  >
                        </div>
                    </div>
                    <div class="col-xs col-sm col-md col-lg sub-heading">
                        <div>    
                            Bills due
                        </div>
                        <div>
                            <label for="house-hold-utility">House hold utility</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()' name="house-hold-utility"  >
                        </div>
                        <div>
                            <label for="taxes-due">Taxes due</label><br>
                            <input type = 'number'class ='_liability' onchange="store_networth();store_item(event)" oninput = 'liabilityValidate() ; displayNetworth()' name="taxes-due"  >
                        </div>
                    </div>
                </div>
            </section>
            
    </main>

<!-- Share Buttons by @Aphatheology -->
<div class="sharebutton">
    <h3>Inform your Friends to calculate their <b>Net Worth</b></h3>
    <p>You can Copy the text below and Paste for the Twitter and Facebook Share. The Whatsapp share is already prefilled with the same text. <br> Thanks</p>
    <div class="edit" contenteditable>
        Do you know your Net Worth? <br> 
        You can easily calculate it using https://networth-calc.herokuapp.com<br>
        #NetworthCalculator #HNGInternship
    </div>

        <a class="whatsapp"  href="https://wa.me/?text=Do%20you%20know%20your%20Net%20Worth?%20%0AYou%20can%20easily%20calculate%20it%20using%20https://networth-calc.herokuapp.com%0A#NetworthCalculator%20#HNGInternship" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-whatsapp fa-stack-1x"></i>
            </span>
        </a> 

        <a class="twitter" href="https://twitter.com/intent/tweet?button_hashtag=NetworthCalculator&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-text="Do you know your Net Worth? You can easily calculate it using " data-url="https://networ.com" data-show-count="false" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
            </span> 
        </a>

        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://networth-calc.herokuapp.com" target="_blank">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x"></i>
            </span>
        </a>

    </div>
    <!-- Share Button ends here -->

    <!-- footer starts here -->
    <div class="footer"> 
        <div class="footer-content">
            <div class="footer-section about"> 
                <h3 class="logo-text"> Heracles Networth Calculator </h3> 
                <p>Inspired by HNG 6   </p> <br>
            </div>

            <div class="footer-section links"> 
                <h3> Quick Links</h3> 
                <ul>
                    <a href="contactus.html">    
                        <li> Contact US </li>  
                    </a>
                    <a href="#">    
                        <li> FAQ </li>  
                    </a>
                    <!-- <a href="#">   <li>Support </li>     </a> -->
                    <a href="#">    
                        <li> Disclaimer </li>    
                    </a> 
                    <a href="#">   
                        <li> Privacy Policy </li>   
                    </a>
                </ul>
            </div>

            <div class="footer-section">  
                <h3>Follow Us Online</h3>
                <div id="soc-media">
                    <a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                    <a href="https://instagram.com"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div> 
        <div class="footer-bottom">
            <b>&copy; | Designed By Team Heracles For HNG, 2019. </b> <br>
        </div>
    </div>

<?php else:?>
<h1>You are not logged in, Please <a href="signin.php">signin</a> to Access this page</h1>
        
        <?php endif;?>
        <!-- <script src="" async defer></script> -->
        <!-- Modal -->
    <div class="modal fade" id="networthchart" tabindex="-1" role="dialog"
        aria-labelledby="networthchart" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered .modal-dialog-scrollable" role="document">
                <div class="modal-body">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/networth.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" -->
        <!-- integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="dashboard/dashboard.js"></script>
    </body>
</html>
<!-- 
    <a href="https://facebook.com" class=" socials fb" target="_blank"></i></a>
    <a href="https://twitter.com" class="socials twt" target="_blank"></i></a>
    <a href="https://instagram.com" class="socials inst" target="_blank"></i></a>
-->
