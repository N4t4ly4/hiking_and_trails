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
    <form action="hikes/adding_hike.php" method="post">
        <label for="hikeName">Hike Name:</label>
        <input type="text" id="hikeName" name="hikeName" maxlength="250"><br><br>

        <label for="difficultyLevel">Difficulty Level:</label>
        <select id="difficultyLevel" name="difficultyLevel">
            <option value="E">Easy</option>
            <option value="M">Medium</option>
            <option value="H">Hard</option>
        </select><br>

        <p>Features:</p>
        <input type="checkbox" id="pavedTrail" name="pavedTrail" value="1">
        <label for="pavedTrail">Paved Trail</label><br>
        
        <input type="checkbox" id="waterfall" name="waterfall" value="1">
        <label for="waterfall">Waterfall</label><br>

        <input type="checkbox" id="scenicLookout" name="scenicLookout" value="1">
        <label for="scenicLookout">Scenic Lookout</label><br>

        <input type="checkbox" id="cave" name="cave" value="1">
        <label for="cave">Cave</label><br>

        <input type="checkbox" id="lake" name="lake" value="1">
        <label for="lake">Lake</label><br>

        <input type="checkbox" id="river" name="river" value="1">
        <label for="river">River</label><br><br>


        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" maxlength="2"><br><br>

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" maxlength="25"><br><br>

        <label for="zipCode">Zip Code:</label><br>
        <input type="text" id="zipCode" name="zipCode" maxlength="5"><br><br>

        <input type="submit" value="Submit Hike" /> 
        <div class="errors"> <br> <?=$errors?></div>
    </form>
</div>