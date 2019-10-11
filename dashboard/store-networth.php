<?php
require_once '../includes/dbconnection.php';

header("Content-Type: application/json");

// die(json_encode([$_POST,$_GET,$_REQUEST]));
$user_id = (int) $_GET['user_id'];
$networth = (int) $_GET['networth'];
$asset = (int) $_GET['asset'];
$liability = (int) $_GET['liability'];

// get current date
date_default_timezone_set('Africa/Lagos');
$current_date = date("Y-m-d", time());

// search for any calculations today
$sql = "SELECT * FROM networth WHERE user_id = '$user_id' AND date = '$current_date'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // if there is, update the surrent entry
    $sql = "UPDATE networth SET value='$networth', asset='$asset', liability='$liability' WHERE user_id='$user_id' AND date = '$current_date'";
    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success", "message" => "Sync Successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
} else {
    // if there is none, insert a new entry
    $sql = "INSERT INTO networth (user_id, value, asset, liability, date)
                            VALUES ('$user_id', '$networth', '$asset', '$liability', '$current_date')";
    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success", "message" => "Sync Successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
}
