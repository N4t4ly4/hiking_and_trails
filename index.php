<?php

session_start();
require('C:\xampp\htdocs\hiking-and-trails\model\hikes_db.php');

$hikes = get_hikes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hiking and Trails Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'C:\xampp\htdocs\hiking-and-trails\views\header.php'; ?>



    <h1>Hikes</h1>
       <table style="border: 1px solid black">
       <tr>
        <td>HikeID</td>
        <td>Hike Name</td>
        <td>Difficulty</td>
        <td>Location</td>
        <td>Paved Trail</td>
        <td>Waterfall</td>
        <td>Scenic Lookout</td>
        <td>Cave</td>
        <td>Lake</td>
        <td>River</td>
       </tr>
       <?php foreach ($hikes as $hike) :?>
         <tr>
           <td><?=$hike[0]?></td>
           <td><?=$hike[1]?></td>
           <td><?=$hike[2]?></td>
           <td><?=$hike[3]?></td>
           <td><?=$hike[4]?></td>
           <td><?=$hike[5]?></td>
           <td><?=$hike[6]?></td>
           <td><?=$hike[7]?></td>
           <td><?=$hike[8]?></td>
           <td><?=$hike[9]?></td>
         </tr>
       <?php endforeach; ?>
       </table>
   </section>
</body>
</html>