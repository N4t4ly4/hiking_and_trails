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


function getNextLocationId() {
   global $db;
   $query = "SELECT MAX(LocationID) FROM Location";
   $statement = $db->prepare($query);
   $statement->execute();
   $maxLocationId = $statement->fetchAll();
   $statement->closeCursor();
   $nextLocationId = (int)$maxLocationId[0][0] + 1;
  
   return $nextLocationId;
}


function getNextFeatureId() {
   global $db;
   $query = "SELECT MAX(FeatureID) FROM Features";
   $statement = $db->prepare($query);
   $statement->execute();
   $maxFeatureId = $statement->fetchAll();
   $statement->closeCursor();
   $nextFeatureId = (int)$maxFeatureId[0][0] + 1;
   return $nextFeatureId;
}

function addLocation($locationId, $state, $city, $zipCode) {
   global $db;

   $zipCode = (int)$zipCode;

   $query = 'INSERT INTO Location (LocationID, State, City, ZipCode)
   VALUES (:locationid, :state, :city, :zipCode)';
   
   $statement = $db->prepare($query);
   
   $statement->bindParam(':locationid', $locationId);
   $statement->bindParam(':state', $state);
   $statement->bindParam(':city', $city);   
   $statement->bindParam(':zipCode', $zipCode);            
   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
}

function addFeature($nextFeatureId, $pavedTrail, $waterfall, $scenicLookout, $cave, $lake, $river){
   if ($pavedTrail == '1'){
      $pavedTrail = 1;
   } else {
      $pavedTrail = 0;
   }

   if ($waterfall == '1'){
      $waterfall = 1;
   } else {
      $waterfall = 0;
   }

   if ($scenicLookout == '1'){
      $scenicLookout = 1;
   } else {
      $scenicLookout = 0;
   }

   if ($cave == '1'){
      $cave = 1;
   } else {
      $cave = 0;
   }

   if ($lake == '1'){
      $lake = 1;
   } else {
      $lake = 0;
   }

   if ($river == '1'){
      $river = 1;
   } else {
      $river = 0;
   }
  

   global $db;
   $query = 'INSERT INTO Features (FeatureID, PavedTrail, Waterfall, ScenicLookout, Cave, Lake, River)
   VALUES (:featureid, :pavedtrail, :waterfall, :sceniclookout, :cave, :lake, :river)';
   
   $statement = $db->prepare($query);
   
   $statement->bindParam(':featureid', $nextFeatureId);
   $statement->bindParam(':pavedtrail', $pavedTrail);
   $statement->bindParam(':waterfall', $waterfall);   
   $statement->bindParam(':sceniclookout', $scenicLookout);
   $statement->bindParam(':cave', $cave);  
   $statement->bindParam(':lake', $lake);  
   $statement->bindParam(':river', $river);              
   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
}


function addHike($lId, $fId, $hikeName, $hikeDifficulty) {
   global $db;

   $currentUser = $_SESSION['email'];
   $status = "pending";

   $query = 'INSERT INTO Hikes (DescriptiveName, DifficultyLevel, LocationID, FeatureID, Username, HikeApprovalStatus)
   VALUES (:name, :difficulty, :location, :feature, :user, :status)';
   
   $statement = $db->prepare($query);
   
   $statement->bindParam(':name', $hikeName);
   $statement->bindParam(':difficulty', $hikeDifficulty);
   $statement->bindParam(':location', $lId);   
   $statement->bindParam(':feature', $fId);
   $statement->bindParam(':user', $currentUser); 
   $statement->bindParam(':status', $status);

   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
}

?>
