<?php
require '../database/connection.php';

header("Content-Type: application/json");

$user_id = $_GET['user_id'];
$value = $_GET['networth'];
die($value);

// get current date
date_default_timezone_set('Africa/Lagos');
$current_date = date("Y-m-d", time());

// search for any calculations today
$sql = "SELECT * FROM networth WHERE user_id = '$user_id' AND date = '$current_date'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row) {
    // if there is, update the surrent entry
    $sql = "UPDATE networth SET value='$value' WHERE user_id='$user_id' AND date = '$current_date'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
} else {
    // if there is none, insert a new entry
    $sql = "INSERT INTO networth (user_id, value, date)
                            VALUES ('$user_id', '$value', '$current_date')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
