<?php

session_start();
require('C:\xampp\htdocs\hiking-and-trails\model\admin_db.php');

$allHikes = numAllHikes();
$approvedHikes = numApprovedHikes();
$pendingHikes = numPendingHikes();



if ( !(isset($_SESSION['admin']) && $_SESSION['admin'] == 'isAdmin') ) {
    header("Location: /hiking-and-trails/index.php");
    exit;
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hiking and Trails</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'C:\xampp\htdocs\hiking-and-trails\views\header.php'; ?>
    <br><br><br>
    <div class="tiles">
        <div class="allhikestile">
            <h2>Total Hikes:</h2><br>
            <h2><?php foreach ($allHikes as $hike) :?><?php echo $hike[0]?><?php endforeach;?></h2>
        </div>
        <div class="approvedhikestile">
            <h2>Approved Hikes:</h2><br>
            <h2><?php foreach ($approvedHikes as $hike) :?><?php echo $hike[0]?><?php endforeach;?></h2>
        </div>
        <div class="pendinghikestile">
            <h2>Pending Hikes:</h2><br>
            <h2><?php foreach ($pendingHikes as $hike) :?><?php echo $hike[0]?><?php endforeach;?></h2>
        </div>   
    </div>
</body>
</html>

<style>
.tiles {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 55%;
    margin-left: 20%;
}

.allhikestile, .approvedhikestile, .pendinghikestile {
    background-color: gray;
    border: solid 1px black;
    padding: 25px;
}
</style>