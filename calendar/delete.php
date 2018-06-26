<!DOCTYPE html>
<html>
<head>
    <title>Deleted Tasks</title>
    <link rel="stylesheet" type="text/css" href="todo.css" />
</head>
<body>
<div style="text-align:left;font-size:200% ;background-color:rgba(0, 212, 28, 0.822);color:white;margin:auto" >    
<p>Events</p>
</div>

</body>
</html>
<?php
require_once "database.php";
//delete event
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM calendar_event WHERE id = '$id'";
    ?>
    <p>The event was deleted</p>
    <a href="detail.php?id=<?php echo $id?>" style="color:#202013">Go back to event detail page</a>
    <?php
    //to identify errors,if any
    if($conn->query($query)== TRUE)
    echo " ";
    else
    echo mysqli_error($conn);   
}
?>