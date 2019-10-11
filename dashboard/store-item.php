<?php
require_once '../includes/dbconnection.php';

header("Content-Type: application/json");

// get user id
// type of item
// name of item / category of item
// value of the item
// date added
$user_id = $_GET['user_id'];
$type = $_GET['type'];
$name = $_GET['name'];
$value = $_GET['value'];

// get current date
date_default_timezone_set('Africa/Lagos');
$current_date = date("Y-m-d", time());

// check of there is any recent record from the same day
$sql = "SELECT * FROM items WHERE user_id='$user_id' AND type='$type' AND name='$name' AND date_added='$current_date'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    // if there is, update the surrent entry
    $sql = "UPDATE items SET value='$value' WHERE user_id='$user_id' AND type='$type' AND name='$name' AND date_added='$current_date'";
    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success", "message" => "Item Updated"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
} else {
    // if there is none, insert a new entry
    $sql = "INSERT INTO items (user_id, type, name, value, date_added)
                            VALUES ('$user_id', '$type', '$name', '$value', '$current_date')";
    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success", "message" => "Item Stored"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
}

die();
// get the latest networth calculated
// $sql = "SELECT * FROM networth WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 1";
$sql_asset = "SELECT SUM(value) as asset FROM `items`WHERE type='asset' AND user_id='$user_id' AND date_added='$current_date'";
if ($result = mysqli_query($con, $sql_asset)) {
    $row = mysqli_fetch_assoc($result);
    $networth += $row["asset"];
}
$sql_liability = "SELECT SUM(value) as liability FROM `items`WHERE type='liability' AND user_id='$user_id' AND date_added='$current_date'";
if ($result = mysqli_query($con, $sql_liability)) {
    $row = mysqli_fetch_assoc($result);
    $networth -= $row["liability"];
}
echo json_encode($networth);
