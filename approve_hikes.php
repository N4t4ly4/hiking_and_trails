<?php

session_start();
require('C:\xampp\htdocs\hiking-and-trails\model\hikes_db.php');

$hikes = getAdminHikes();


if ( !(isset($_SESSION['admin']) && $_SESSION['admin'] == 'isAdmin') ) {
    header("Location: /hiking-and-trails/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hiking and Trails Website</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <?php include 'C:\xampp\htdocs\hiking-and-trails\views\header.php'; ?>



    <h1>Statuses For Submitted Hikes:</h1>
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
        <td>User</td>
        <td>Status</td>
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
           <td><?=$hike[10]?></td>
           <td>
           <?php if ( $hike[11] == 'approved' ): ?>
            <p>Hike Approved<a href='hike_status_changed.php?hikeid=<?php echo $hike[0]?>&currentStatus=approved'>(Unapprove)</a></p>
            <?php elseif ( $hike[11] == 'pending' ): ?>
            <p>Hike Pending<a href='hike_status_changed.php?hikeid=<?php echo $hike[0]?>&currentStatus=pending'>(Approve)</a></p>
            <?php endif ?>
           </td>
         </tr>
       <?php endforeach; ?>
       </table>
   </section>


</body>
</html>