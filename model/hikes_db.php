<?php
require('database.php');

function get_hikes() {
   global $db;
   $query = "SELECT HikeID, DescriptiveName, DifficultyLevel, CONCAT(l.City, ', ', l.State) AS 'Location', CASE WHEN PavedTrail = 1 THEN 'Yes' ELSE 'No' END AS 'Paved_Trail', CASE WHEN Waterfall = 1 THEN 'Yes' ELSE 'No' END AS 'Waterfall', CASE WHEN ScenicLookout = 1 THEN 'Yes' ELSE 'No' END AS 'ScenicLookout', CASE WHEN Cave = 1 THEN 'Yes' ELSE 'No' END AS 'Cave', CASE WHEN Lake = 1 THEN 'Yes' ELSE 'No' END AS 'Lake', CASE WHEN River = 1 THEN 'Yes' ELSE 'No' END AS River FROM hikes h JOIN Location l ON h.locationid = l.locationid JOIN features f ON h.featureid = f.featureid WHERE HikeApprovalStatus = 'approved'";
   $statement = $db->prepare($query);
   $statement->execute();
   $users = $statement->fetchAll();
   $statement->closeCursor();
   return $users;
}

// function login($email, $password){
//    global $db;
//    $query = 'SELECT Userid, email FROM users WHERE email = :email 
//    AND password = :password';
//    #AND password = md5(:password)'; -change to this later
//    $statement = $db->prepare($query);
  
//    $statement->bindParam(':email', $email);
//    $statement->bindParam(':password', $password);   
          
//    $statement->execute();
//    $user = $statement->fetch(PDO::FETCH_BOTH);
//    $statement->closeCursor();
//    //var_dump($user);
//    return $user;   
// }