<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php
require('db.php');//add database here


// If form submitted, insert values into the database.
if (isset($_REQUEST['username']))
{
	$username = stripslashes($_REQUEST['username']);// removes backslashes
    $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    //add new entry to the database    
	$query = "INSERT into `userlist` (username, password, email)VALUES ('$username', '".md5($password)."', '$email')"; //encryted password
    $result = mysqli_query($con,$query);
    if($result)
    {
            echo "<div class='form'>
                  <h3>You have registered successfully.</h3>
                  <br/>Click here to <a href='login.php'>Login</a></div>";
    }
}

else{
?>
<div style="text-align:left;font-size:200% ;background-color: rgba(0, 212, 28, 0.822);color:white;margin:auto" >    
<p>Events</p>
</div>
<p style="text-align:center;font-size:150%">Welcome to Events!</p>
<p style="text-align:center;font-size:150%">Events is a web app that helps you to plan your day well.Register to plan your meetings well</p>


<div class="form">
<h1>Register</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
  
<input type="email" name="email" placeholder="Email" required />

<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>