<?php
require_once '../modele/api.php';

session_start();
var_dump($_SESSION);
if (isset($_SESSION)){
    $Stdclass->user_id = $_SESSION['userId'];
}

$Stdclass->firstName = $_POST['firstName'];
$Stdclass->lastName = $_POST['lastName'];
$Stdclass->email = $_POST['email'];
$Stdclass->password = $_POST['password'];
$stdclass->confirmPassword = $_POST['confirmPassword'];
$Stdclass->dob = $_POST['dob'];

$user = User::create($Stdclass);
var_dump(get_class($user));
$response = AddBookingObject($user);
header ("Location: ../" );