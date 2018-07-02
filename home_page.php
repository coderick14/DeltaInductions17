<?php
require 'config.php';
session_start();
ob_start();
 
         function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          }
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #c2c4c6">

	<div id="main-wrapper">
        <center>
         <h1>HOME PAGE</h1><br>
         <h2>WELCOME <?php echo $_SESSION['username']; ?></h2>

		 <img src="avtar.png">
		</center>

		<form action="home_page.php" method="post" >
			<input type="submit" name="signout" id="signout" value="Sign Out" title="Click Me to SIGN OUT">
		</form>
		<?php

		if(isset($_POST['signout']))
		{
			session_destroy();
			header('location:index.php');
			ob_end_flush();
		}

		?>
		<br><hr><hr><hr>

		<div style="text-align: center;"><button title="Click To Display Form And Double Click To Hide Form" ondblclick="document.getElementById('form').style.display = 'none';" onclick="document.getElementById('form').style.display = 'block';" style="background-color: #0f0f0e; color: #ffff00; font: italic bold 40px georgia , serif;">ADD</button></div>

		<div id="form" style="display: none;">
			<form action="home_page.php" method="post">
				<input type="date" name="date"><br>
				<input type="text" name="title" placeholder="Title Of Appoinment"><br>
				<textarea rows ="3" cols = "60" name="discription" placeholder="discription"></textarea><br>
				<input type="time" name="start_time"><br>
				<input type="time" name="end_time"><br>
				<input type="submit" title="Click To Submit Form" name="submit" onclick="document.getElementsById('form').style.display = 'none';">

			</form>
		</div>

		<?php
		$username = test_input($_SESSION['username']);
		if(isset($_POST['submit']))
		{
			$date = test_input($_POST['date']);
			$title = test_input($_POST['title']);
			$discription = test_input($_POST['discription']);
			$start_time = test_input($_POST['start_time']);
			$end_time = test_input($_POST['end_time']);
			if(!empty($date)&&!empty($title)&&!empty($discription)&&!empty($start_time)&&!empty($end_time))
			{
				$query = "SELECT `username`, `title` , `date` FROM `details` WHERE (`title` = '$title' AND username = '$username' AND `date` = '$date')";
			     	$query_run = mysqli_query($con,$query);
			     	if(mysqli_num_rows($query_run)>0)
			     	{
			     		echo '<script type"text/javascript"> alert("This title already exists for this date.  !! ")</script>';

			        }
			        else
			        {
			        	$query = "INSERT INTO `details` (`username`, `date`,`title`, `discription`,`start_time`,`end_time`) VALUES ('$username','$date','$title','$discription','$start_time','$end_time')";
			     	    $query_run = mysqli_query($con,$query);
			     	
			        }
			}
			else
			{
				echo '<script type"text/javascript"> alert("Enter All The Details!!")</script>';
			}
		}
?>

    <br><hr><hr><hr>
    <div>
    		
    		<center style="font-size: 40px; color: #0f0f0e; font: italic bold 40px georgia , serif;">DATE:</center>
    	    <?php
    	       $sql = "SELECT DISTINCT `date` FROM `details` WHERE `username` = '$username'";
    	       $records = mysqli_query($con,$sql);
                while ($result = mysqli_fetch_assoc($records))
                {
                	
                	echo '<div style="text-align:center;"><button title = "Click To Display Details And Double Click To Hide Details"style ="background-color: #0911ed; border: 2px solid #bed4d6; text-align:center; color: #e9ed00; font-size: 30px" onclick="  document.getElementById(\''.$result['date'].'\').style.display = \'block\';   "  ondblclick = "  document.getElementById(\''.$result['date'].'\').style.display = \'none\';   " >'.$result['date'].'</button></div><br><hr><hr>';
                	$sql1 = "SELECT `title`,`discription`,`start_time`,`end_time` FROM `details` WHERE `username` = '$username' AND `date` = '".$result['date']."'";
                	$records1 = mysqli_query($con,$sql1); 
                	$count = 1;
                    echo '<div style = "display:none;background-color: #bce0df; color: #cc183c; font: 20px arial, sans-serif;" id = "'.$result['date'].'">';

                	while ($result1 = mysqli_fetch_assoc($records1))
                	{
                	
                		echo '<div>S.NO:'.$count.'</div>';
                		echo '<div>TITLE:'.$result1['title'].'</div>';
                		echo '<div>DISCRIPTION:'.$result1['discription'].'</div>';
                		echo '<div>START TIME:'.$result1['start_time'].'</div>';
                		echo '<div>END TIME:'.$result1['end_time'].'</div><hr>';
                		$count++;
                	}
                	 
                	 echo '</div>';

                	

                } 

    	    ?>

    	













	
    </div>
</div>

</body>
</html>
