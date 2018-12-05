<?php
require_once '../modele/api.php';

session_start();
if (!isset($Stdclass)) $Stdclass = new stdClass();
if (isset($_SESSION)){
    $Stdclass->user_id = $_SESSION['userId'];
}

$Stdclass->n_people = $_POST['nbPeopleRange'];
$Stdclass->date = $_POST['date'];
$Stdclass->minute = $_POST['minutes'];
$Stdclass->hour = $_POST['hours'];
$Stdclass->activity_id = $_POST['activity_id'];

$booking = Booking::create($Stdclass);

var_dump($booking);
$response = AddBookingObject($booking);
header("Location:../activite/" . $booking->getActivity_Id());