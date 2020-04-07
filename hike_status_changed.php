<?php

session_start();
require('C:\xampp\htdocs\hiking-and-trails\model\hikes_db.php');

$hikeId = $_GET['hikeid'];
$hikeStatus = $_GET['currentStatus'];

$hikes = changeHikeApprovalStatus($hikeId, $hikeStatus);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hiking and Trails Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div style="background:gray">
        <h2> Hike Status Successfully Changed!</h2><br>
        <p><a href="/hiking-and-trails/approve_hikes.php">Return To Hike Status Page</a></p><br>
        <p><a href="/hiking-and-trails/index.php">Return Home</a></p>
    </div>
</body>
</html>