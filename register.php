<?php 


session_start();

$username = $_POST ['username']; 
$password = $_POST ['password'];
$mysqli=mysqli_connect('127.0.0.1','root','','world'); 
$pass     = $password;  
$email    = $_POST ['email'];


if(isset($_POST['submit']))
{

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$query = "SELECT username FROM users WHERE username='$username' AND password='$password'";
	
	$result = mysqli_query($mysqli,$query)or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
		if( $num_row == 1 )
	{
		echo "Existing account with this email: ".$email." or username: " . $username;
		Die;
	}
	else
	{
		$insert = mysqli_query($mysqli, "INSERT INTO `users`(`username`, `password`, `email`) VALUES ('$username', '$password', '$email')");
		header("Location: albums.php");
		exit();		
	}
	
	echo '<pre>';
	print_r($row);
	echo '</pre>';
	
	
	if( $num_row == 1 )
	{
		header("Location: albums.php");
		exit();
	}
	else
	{
		echo "Ne namiram :" . $username;
	}
}