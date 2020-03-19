<?php
session_start();
require('../model/users_db.php');
$action = filter_input(INPUT_POST, 'action');

if($action == 'login'){  
   $email = filter_input(INPUT_POST,'email');
   $password = filter_input(INPUT_POST,'password');
   $user = login($email, $password);
   var_dump($user);
   if($user == NULL){
       header("Location: /hiking-and-trails/login.php?errors=Incorrect Login Credentials.");
   } else{
       $_SESSION['email'] = $user['email'];
       $_SESSION['userid'] = $user['userid'];
       if ($user['Admin'] == '1') {
            $_SESSION['admin'] = 'isAdmin';
       }
       header('Location: /Hiking-and-Trails/index.php');
   }
}
?>