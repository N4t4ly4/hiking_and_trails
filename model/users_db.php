<?php
require('database.php');


function login($email, $password){
   global $db;
   $query = 'SELECT Userid, email, Admin FROM users WHERE email = :email 
   AND password = :password';
   #AND password = md5(:password)'; -change to this later
   $statement = $db->prepare($query);
  
   $statement->bindParam(':email', $email);
   $statement->bindParam(':password', $password);   
          
   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
   //var_dump($user);
   return $user;   
}

function signUp($email, $password){
   global $db;


   $query = 'INSERT INTO Users (Username, Password, Email, Admin, Suspended, UserNotes)
   VALUES (:email, :password, :email, 0, 0, NULL)';
   
   $statement = $db->prepare($query);
   $statement->bindParam(':email', $email);
   $statement->bindParam(':password', $password);         
   $statement->execute();
   $user = $statement->fetch(PDO::FETCH_BOTH);
   $statement->closeCursor();
}