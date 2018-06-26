<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="todo.css" />
</head>
<body>
<div style="text-align:left;font-size:200% ;background-color:rgba(0, 212, 28, 0.822);color:white;margin:auto" >    
<p>Events</p>
</div>
</body>
<?php
require_once "database.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT title,description,start_time,end_time FROM calendar_event WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['title'];
            $description = $row['description'];
            $start_Time = $row['start_time'];
            $end_Time =$row['end_time'];
            ?>

            <h1><?php echo $title?></h1>
            <p><?php echo $description?></p>
            <small>From:</small>
            <small><?php echo $start_Time?></small>
            <small>To:</small>
            <small><?php echo $end_Time?></small>
            <br>
            <button type="button"><a href="edit.php?id=<?php echo $id?>" style="color:#202013">Edit</a></button>
            <button type="button"><a href="delete.php?id=<?php echo $id?>" style="color:#202013">Delete</a></button>
            <br>
            <br>
            <a href="calendar.php?id=<?php echo $id?>" style="color:#202013">View Calendar</a>
            <?php
        }
    }
}

?>
</html>





