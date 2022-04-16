<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','root','lesson31');
	$query = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$_POST['email']}' AND password='{$_POST['password']}'");
	if (mysqli_num_rows($query)>0) {
		$stroca = mysqli_fetch_assoc($query);	
		$_SESSION['id'] = $stroca['id'];
		header("Location: index.php");
    }else{
        header("Location: login.php");
    }
?>