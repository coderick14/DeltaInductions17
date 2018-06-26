<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div style="text-align:left;font-size:250% ;background-color: rgba(0, 212, 28, 0.822);color:#202013" >    
<p>Events</p>
</div>

<p style="font-size:200%;color:#202013;background-color: rgba(0, 212, 28, 0.822);text-align:left">Dashboard</p>
<div class="form">
<p style="font-size:150%"><a href="calendar.php" style="color:#202013">View Calendar</a></p>
<a href="logout.php" style="color:#202013;font-size:150%">Logout</a>
</div>
</body>