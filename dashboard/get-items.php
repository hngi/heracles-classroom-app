<?php
require '../database/connection.php';

header("Content-Type: application/json");

$user_id = $_GET['user_id'];
$type = $_GET['type'];
if ($type == "assets" || $type == "asset") {
    $type = "asset";
} elseif ($type == "liabilities" || $type == "liability") {
    $type = "liability";
} else {
    $type = "asset";
}

// get current date
date_default_timezone_set('Africa/Lagos');
$current_date = date("Y-m-d", time());

// select the last date of record from database
$sql_date_asset = "SELECT date_added FROM `items` WHERE type='asset' AND user_id='$user_id' ORDER BY date_added DESC LIMIT 1";
$result_asset = mysqli_query($conn, $sql_date_asset);
$date_asset = mysqli_fetch_assoc($result_asset)['date_added'];
$sql_date_liability = "SELECT date_added FROM `items` WHERE type='liability' AND user_id='$user_id' ORDER BY date_added DESC LIMIT 1";
$result_liability = mysqli_query($conn, $sql_date_liability);
$date_liability = mysqli_fetch_assoc($result_liability)['date_added'];

// get the latest networth calculated
// $sql = "SELECT * FROM networth WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 1";
$sql = "SELECT SUM(value) as asset FROM `items`WHERE type='$type' AND user_id='$user_id' AND date_added='$date_asset'";
if ($type == "liability") {
    $sql = "SELECT SUM(value) as liability FROM `items`WHERE type='$type' AND user_id='$user_id' AND date_added='$date_liability'";
}

if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_assoc($result);

    // then store in the networth table 
    
    
    $row["status"] = "success";
    $row["type"] = $type;
    echo json_encode($row);
} else {
    echo json_encode(["status" => "error"]);
}
