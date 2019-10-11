<?php
require_once '../includes/dbconnection.php';

header("Content-Type: application/json");

$user_id = (int) $_GET['user_id'];

// get the latest networth calculated
$sql = "SELECT * FROM networth WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 12";
if ($result = mysqli_query($con, $sql)) {
    // $rows = [];
    // $net = [];
    // $asset = [];
    // $liability = [];
    // $date = [];
    $data = [];
    $data1 = [];
    $data2 = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // array_push($rows, $row);
        // array_push($net, $row["value"]);
        // array_push($asset, $row["asset"]);
        // array_push($liability, $row["liability"]);
        // array_push($date, $row["date"]);
        $value = (int) $row["value"];
        if ($value < 0) {
            $value = 0;
        }
        array_push($data, [
            "label" => $row["date"],
            "y" => $value,
        ]);
        array_push($data1, [
            "label" => $row["date"],
            "y" => (int) $row["asset"],
        ]);
        array_push($data2, [
            "label" => $row["date"],
            "y" => (int) $row["liability"],
        ]);

    }
    echo json_encode([
        "status" => "success",
        // "networth" => $rows,
        // "net" => array_reverse($net),
        // "asset" => array_reverse($asset),
        // "liability" => array_reverse($liability),
        // "date" => array_reverse($date),
        "data" => array_reverse($data),
        "asset" => array_reverse($data1),
        "liability" => array_reverse($data2),
    ]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
}
