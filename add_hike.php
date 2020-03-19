<?php
session_start();
$errors='';
$errors = filter_input(INPUT_GET,'errors');
?>

<!DOCTYPE html>
<html>
<head>
 <title>Utah Hiking and Trails</title>
 <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<br/><br/>
<div class="form-background">
<form action="users/signup.php" method="post">
  State: <input type="text" name="email" placeholder="email" size="10"> <br> <br>
  City: <input type="text" name="email" placeholder="email" size="10"> <br> <br>
  Zip Code: <input type="text" name="email" placeholder="email" size="10"> <br> <br>
  <select id="pavedTrail" name="features">
    <option value="volvo"></option>
    <option value="saab"></option>
    <option value="fiat"></option>
    <option value="audi"></option>
  </select>
  <input type="hidden" name="action" value="signup"/>
  <input type="submit" value="Submit" /> 
  <div class="errors"> <br> <?=$errors?></div>
</form>
</div>