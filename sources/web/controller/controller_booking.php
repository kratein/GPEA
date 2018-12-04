<?php
require_once '../modele/api.php';

session_start();
var_dump($_SESSION);
if (isset($_SESSION)){
    $Stdclass->user_id = $_SESSION['userId'];
}

$Stdclass->n_people = $_POST['nbPeopleRange'];
$Stdclass->date = $_POST['date'];
$Stdclass->minute = $_POST['minutes'];
$Stdclass->hour = $_POST['hour'];
$Stdclass->activity_id = $_POST['activityId'];
$booking = Booking::create($Stdclass);
var_dump(get_class($booking));
$response = AddBookingObject($booking);
header ("Location: ../" );