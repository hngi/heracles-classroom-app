<?php

/*
 *  You really didn't need to do all this as I have created the same file in database/connection.php before
 * This is one of the reasons why we keep getting conflicts
 */

// $servername = "us-cdbr-iron-east-02.cleardb.net";
// $dbUsername="b0ae198915bb2d";
// $dbPassword ="16a1a0d0";
//$dbName ="heroku_6639abf7d3c0725";
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'chukky162');
define('DB_NAME', 'loginsystem2');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>
