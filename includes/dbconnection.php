<?php
// $servername = "us-cdbr-iron-east-02.cleardb.net";
// $dbUsername="b0ae198915bb2d";
// $dbPassword ="16a1a0d0";
//$dbName ="heroku_6639abf7d3c0725";
define('DB_SERVER', "us-cdbr-iron-east-02.cleardb.net");
define('DB_USER',"b0ae198915bb2d");
define('DB_PASS' ,"16a1a0d0");
define('DB_NAME', "heroku_6639abf7d3c0725");

// define('DB_SERVER', "localhost");
// define('DB_USER', "root");
// define('DB_PASS', "khawab");
// define('DB_NAME', "networth-calc");


$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>
