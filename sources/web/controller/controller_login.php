<?php
require_once '../modele/api.php';
session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$response = Connect($username, $password);
	$reponse = json_decode($response); 
	$user = User::create($reponse);
	if ($user != null && $user->getEmail() == $username && $user->getPassword() == $password){
		$_SESSION['userId'] = $user->getId();
		$_SESSION['userEmail'] = $user->getEmail();
		$_SESSION['photoPath'] = $user->getPhoto();
		echo 'Success';
		//header ("Location: $_SERVER[HTTP_REFERER]" );
	}
	else{
		echo 'Failed';
		echo $username.$password.$response;
		//header ("Location: $_SERVER[HTTP_REFERER]" );
	}
?>

	