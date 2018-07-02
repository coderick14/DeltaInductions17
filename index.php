<?php
require 'config.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #c2c4c6">

	<div id="main-wrapper">
        <center>
         <h1>LOGIN FORM</h1>
		 <img src="avtar.png">
		</center>
	

	<form action="index.php" method="post">
		<label>Username:</label><br>
		<input type="text" name="username" placeholder="Type Your User Name" id="my_form">
		<br>
		<label>Password:</label><br>
		<input type="Password" name="password" placeholder="Type Your Password" id="my_form">
        <br>
		<input type="submit" id="login_btn" value="Login" name="login"><br>
		<a href="register.php"><input type="button" id="register_btn" value="Register"></a>
		
	</form>

	<?php

         function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          }
	
	 if(isset($_POST['login'])){
	 	$username = test_input($_POST['username']);
	 	$password = test_input($_POST['password']);
	 	$encrypted_pass = md5($password);
	 	if(!empty($username)&&!empty($password)){
	 		$query = "SELECT * FROM `login_credentials` WHERE username = '$username' AND password='$password'";
	 		$query_run = mysqli_query($con,$query);

	 		if(mysqli_num_rows($query_run)>0)
	 		{
	 			$_SESSION['username'] = $username;
	 			header('location:home_page.php');

	 		}
	 		else
	 		{
	 			echo'<script type"text/javascript"> alert("INVALID CREDENTIALS!!")</script>';
	 		}

	 	}
	 	else{
	 		echo '<script type"text/javascript"> alert("Enter All The Details!!")</script>';
	 	}
	 }


	?>
</div>
</body>
</html>
