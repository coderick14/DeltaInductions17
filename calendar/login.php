<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
    $username = stripslashes($_REQUEST['username']);// removes backslashes
	$username = mysqli_real_escape_string($con,$username);//escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
//Checking if user existing in the database or not    
	$query = "SELECT * FROM `userlist` WHERE username='$username'and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
        header("Location: index.php");// Redirect user to index.php
         }else{
	echo "<div class='form'>
<h3>Username/Password is incorrect.Try again.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div style="text-align:left;font-size:250% ;background-color: rgba(0, 212, 28, 0.822);color:#202013" >    
<p>Events</p>
</div>
<p style="text-align:center;font-size:200%">Welcome to Events!</p>
<div class="form">
 
<h1 style="text-align:center">Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Haven't registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>