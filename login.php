<?php


session_start();

$username = $_POST ['username']; 
$password = $_POST ['password'];
$mysqli=mysqli_connect('127.0.0.1','root','','world'); 

if(isset($_POST['submit']))
{
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$query = "SELECT username FROM users WHERE username='$username' AND password='$password'";
	
	$result = mysqli_query($mysqli,$query)or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	echo '<pre>';
	print_r($row);
	echo '</pre>';
	die();
	
	if( $num_row == 1 )
	{
		echo "Namerih :" . $username;
	}
	else
	{
		echo "Ne namiram :" . $username;
	}
}