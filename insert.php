<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','root','lesson31');
	$dir = "img/";
	$destination = $dir . basename($_FILES['image']['name']);
	$name = $_FILES['image']['tmp_name'];

	$upload = move_uploaded_file($name , $destination);
	$text = "INSERT INTO posts (image, text, link, name, time, user_id) VALUES ('{$destination}', '{$_POST['text']}' ,'{$_POST['link']}' ,'{$_POST['name']}' ,'{$_POST['time']}' , '{$_SESSION['id']}')";
	$zapros = mysqli_query($conn, $text);
	header("Location: portfolio-details.php");
	exit();
?>