<?php

// Modify the following as required
$servername = "us-cdbr-iron-east-02.cleardb.net";
$dbUsername = "b0ae198915bb2d";
$dbPassword = "16a1a0d0";
$dbName = "heroku_6639abf7d3c0725";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {die("Connection failed" . mysqli_connect_error());}
