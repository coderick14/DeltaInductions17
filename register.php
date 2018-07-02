<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #c2c4c6">

	<div id="main-wrapper">
        <center>
         <h1>REGISTRATION FORM</h1>
		 <img src="avtar.png">
		</center>
	

	<form action="register.php" method="post">
		<label>Username:</label><br>
		<input type="text" name="username" placeholder="Type Your User Name" id="my_form">
		<br>
		<label>Password:</label><br>
		<input type="Password" name="password" placeholder="Type Your Password" id="my_form"><br>
		<label>Confirm Password:</label><br>
		<input type="password" name="cpassword" placeholder="Type Confirm Password" id="my_form">
		<br>
		<input type="submit" id="signup_btn" value="Sign Up" name="submit_btn"><br>
		<a href="index.php"><input type="button" id="back_btn" value="Back To Login"></a>
	</form>

	<?php


         function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          }
	

	   if (isset($_POST['submit_btn'])) {
	   	$username = test_input($_POST['username']);
	   	$password = test_input($_POST['password']);
	   	$cpassword = test_input($_POST['cpassword']);
	   	$encrypted_pass = md5($password);


           if(!empty($username)&&!empty($password)&&!empty($cpassword)){

	   	    if($password == $cpassword)
	   	    {
	   	    	$query = "SELECT * FROM `login_credentials` WHERE username = '$username'";
	   	    	$query_run = mysqli_query($con,$query);


	   	    	if(mysqli_num_rows($query_run)>0)
	   	    	{
	   	    		
	   	    		echo '<script type="text/javascript"> alert("User Already Exist. Try Another Username.")</script>';
	   	    	}
	   	    	else
	   	    	{

	   	    		
	   	    		$query = "INSERT INTO `login_credentials`(`username`, `password`) VALUES ('$username','$password')";
	   	    		$query_run = mysqli_query($con,$query);

	   	    		if($query_run)
	   	    		{
	   	    			
	   	    			echo '<script type"text/javascript"> alert("User Registered. GO To Login Page");</script>';
	   	    		}
	   	    		else
	   	    		{
	   	    			echo '<script type"text/javascript"> alert("ERROR!!")</script>';
	   	    		

	   	    		}
	   	    	}
	   }

	   else
	   {
	   	echo '<script type"text/javascript"> alert("Both the Passwords Do not Matches")</script>';
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
