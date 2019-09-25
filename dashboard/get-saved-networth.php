<?php
require '../database/connection.php';

header("Content-Type: application/json");

$user_id = $_GET['user_id'];
$networth = 0;

// get current date
date_default_timezone_set('Africa/Lagos');
$current_date = date("Y-m-d", time());

// get the latest networth calculated
// $sql = "SELECT * FROM networth WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 1";
$sql_asset = "SELECT SUM(value) as asset FROM `items`WHERE type='asset' AND user_id='$user_id' AND date_added='$current_date'";
if ($result = mysqli_query($conn, $sql_asset)) {
    $row = mysqli_fetch_assoc($result);
    $networth += $row["asset"];
}

$sql_liability = "SELECT SUM(value) as liability FROM `items`WHERE type='liability' AND user_id='$user_id' AND date_added='$current_date'";
if ($result = mysqli_query($conn, $sql_liability)) {
    $row = mysqli_fetch_assoc($result);
    $networth -= $row["liability"];
}

echo json_encode($networth);
