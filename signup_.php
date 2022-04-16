<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','root','lesson31');
	$user = "INSERT INTO users (login, password, email) VALUES ('{$_POST['login']}', '{$_POST['password']}','{$_POST['email']}')";
	$query = mysqli_query($conn, $user);
	
	$_SESSION['id']  = mysqli_insert_id($conn);
	header("Location: index.php");
?>