<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Events</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div style="text-align:left;font-size:250% ;background-color: rgba(0, 212, 28, 0.822);color:#202013" >    
<p>Events</p>
</div>
<div class="form">
<p style="font-size:200%;color:#202013">Welcome <?php echo $_SESSION['username']; ?>!</p>
<p><a href="dashboard.php" style="font-size:150%;color:#202013">Dashboard</a></p>
<a href="logout.php" style="font-size:150%;color:#202013">Logout</a>
</div>
</body>
</html>