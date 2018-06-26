
<html>
<head>
    <title>Create a new event</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div style="text-align:left;font-size:250% ;background-color:rgba(0, 212, 28, 0.822);color:#202013" >    
<p>Events</p>
</div>
<h1 style="text-align:center;font-size:200% ;background-color:rgba(0, 212, 28, 0.822);color:#202013">Create a new event</h1>
<p style="text-align:center;font-size:150% ;color:#202013">New event</p>
<form method="post" action="create.php"  style="text-align:center">
    
    <p>Event title: </p>
    <input name="eventTitle" type="text" placeholder="title">
    <p>Event description: </p>
    <input name="eventDescription" type="text" placeholder="description">
    <p>Start time: </p>
    <input name="eventStartTime" type="time" placeholder="start time">
    <p>End Time: </p>
    <input name="eventEndTime" type="time" placeholder="end time">
    <p>Date: </p>
    <input name="eventDate" type="date" placeholder="date">
    <br>
    <input type="submit" name="submit" value="Add">
</form>
<?php
require_once 'database.php';
if(isset($_POST['submit'])) {
    $title = $_POST['eventTitle'];
    $description = $_POST['eventDescription'];
    $startTime=$_POST['eventStartTime'];
    $endTime=$_POST['eventEndTime'];
    $date=$_POST['eventDate'];
    // check strings
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }
    $query = "INSERT INTO calendar_event(title, description, start_time, end_time,date) VALUES ('$title', '$description','$startTime', '$endTime','$date' )";
    $insertEvent = mysqli_query($conn, $query);
    if($insertEvent){
        echo "Event was added.Click 'View Calendar' to view calendar";
    }else{
        echo mysqli_error($conn);
    }
}
?>
<p><a href="calendar.php" style="color:#202013; font-size:150%; text-align:center;">View calendar</a><p>
</body>
</html>
