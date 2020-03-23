<?php
session_start();
$action = filter_input(INPUT_POST, 'action');



//get form values:
$state = filter_input(INPUT_POST,'state');
$city = filter_input(INPUT_POST,'city');
$zipCode = filter_input(INPUT_POST,'zipCode');

$pavedTrail = filter_input(INPUT_POST,'pavedTrail');
$waterfall = filter_input(INPUT_POST,'waterfall');
$scenicLookout = filter_input(INPUT_POST,'scenicLookout');
$cave = filter_input(INPUT_POST,'cave');
$lake = filter_input(INPUT_POST,'lake');
$river = filter_input(INPUT_POST,'river');

$hikeName = filter_input(INPUT_POST,'hikeName');
$difficultyLevel = filter_input(INPUT_POST,'difficultyLevel');


//check for errors
if (
    $state == NULL ||
    $city == NULL ||
    $zipCode == NULL ||
    $hikeName == NULL) {
    header("Location: /hiking-and-trails/add_hike.php?errors=Please Complete All Fields.");
} else {




    //require insert logic
    require('../model/hikes_db.php');



    $nextLocationId = getNextLocationId();
    $nextFeatureId = getNextFeatureId();

    //add the location data to database
    addLocation($nextLocationId, $state, $city, $zipCode);


    //add the feature data to database
    addFeature($nextFeatureId, $pavedTrail, $waterfall, $scenicLookout, $cave, $lake, $river);

    //add the hike data to database
    addHike($nextLocationId, $nextFeatureId, $hikeName, $difficultyLevel);
}
?>



<p> Hike has been submitted successfully! The Admin will review your hike and it will appear on the home page once it is approved.</p>
<a href="/hiking-and-trails/index.php">Return Home</a>



