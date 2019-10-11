<?php
require_once '../includes/dbconnection.php';

header("Content-Type: application/json");

$user_id = $_GET['user_id'];

// get current date
date_default_timezone_set('Africa/Lagos');
$current_date = date("Y-m-d", time());

// get all inputs form present date
$sql = "SELECT * FROM items WHERE user_id='$user_id' AND date_added='$current_date'";
if ($result = mysqli_query($con, $sql)) {
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($rows, $row);
    }
    echo json_encode(["status" => "success", "items" => $rows]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
}
