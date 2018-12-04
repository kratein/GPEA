<?php
require_once '../modele/api.php';
session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$response = Connect($_POST['username'], $_POST['password']);
	$_SESSION['response'] = $response;
	$reponse = json_decode($response);
	$_SESSION['reponse'] = $reponse;
	$user = User::create($reponse);
	var_dump($user);

	if ($user != null && $user->getEmail() == $username && $user->getPassword() == $password){
		$_SESSION['userId'] = $user->getId();
		$_SESSION['firstName'] = $user->getFirstName();
		$_SESSION['lastName'] = $user->getLastName();
		$_SESSION['userEmail'] = $user->getEmail();
		$_SESSION['photoPath'] = $user->getPhoto();
		echo 'Success';
		var_dump($_SESSION);
		//header ("Location: $_SERVER[HTTP_REFERER]" );
	}
	else{
		echo 'Failed';
		//header ("Location: $_SERVER[HTTP_REFERER]" );
	}
?>

	