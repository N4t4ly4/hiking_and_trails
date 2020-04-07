<?php
require('database.php');

function numAllHikes() {
   global $db;
   $query = "SELECT COUNT(*) FROM Hikes";
   $statement = $db->prepare($query);
   $statement->execute();
   $numHikes = $statement->fetchAll();
   $statement->closeCursor();
   return $numHikes;
}

function numApprovedHikes() {
    global $db;
    $query = "SELECT COUNT(*) FROM Hikes WHERE HikeApprovalStatus = 'approved'";
    $statement = $db->prepare($query);
    $statement->execute();
    $numHikes = $statement->fetchAll();
    $statement->closeCursor();
    return $numHikes;
 }

 function numPendingHikes() {
    global $db;
    $query = "SELECT COUNT(*) FROM Hikes WHERE HikeApprovalStatus = 'pending'";
    $statement = $db->prepare($query);
    $statement->execute();
    $numHikes = $statement->fetchAll();
    $statement->closeCursor();
    return $numHikes;
 }

?>