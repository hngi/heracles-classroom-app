<?php
require '../database/connection.php';

header("Content-Type: application/json");

$user_id = $_GET['user_id'];

// get the latest networth calculated
$sql = "SELECT * FROM networth WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 1";
if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_assoc($result);
    $row["status"] = "success";
    echo json_encode($row);
} else {
    echo json_encode(["status" => "error"]);
}
