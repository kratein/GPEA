<?php
//Get values from form
	
	if(isset($_POST['login-form'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);

	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$result = mysql_query("SELECT * FROM user WHERE email = '$username' AND $password = '$password'")
	or die("Failed to query database: " . mysql_error());

	$row = mysql_fetch_array($result);

	if ($row['email'] == $username && $row['password'] == $password){
		echo "Login Successful";
		session_start();
		$_SESSION['userId'] = $row['id'];
		$_SESSION['userEmail'] = $row['email'];
		$_SESSION['photoPath'] = $row['photo'];
		exit();
	}
	else{
		echo "Invalid credentials";
	}
}
?>

	