<?php
require_once '../includes/dbconnection.php';

header("Content-Type: application/json");

$user_id = (int) $_GET['user_id'];

// get the latest networth calculated
$sql = "SELECT * FROM networth WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 1";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $row["status"] = "success";
    echo json_encode($row);
} else {
    echo json_encode(["status" => "error"]);
}
