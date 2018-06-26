
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    
</head>
<body>
<div style="text-align:left;font-size:200% ;background-color:rgba(0, 212, 28, 0.822);color:white;margin:auto" >    
<p>Events</p>
</div>
<?php
require_once 'database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "SELECT title, description,start_time,end_time FROM calendar_event WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $title = $row['title'];
            $description = $row['description'];
            $start_time=$row['start_time'];
            $end_time=$row['end_time'];
            echo "
                <h2>Edit Event</h2>
                
            <form action='edit.php?id=$id' method='post'>
            <p>Title</p>
             <input type='text' name='title' value='$title'>
             <p>Description</p>
             <input type='text' name='description' value='$description'>
             <br>
             <p>Start time</p>
             <input type='time' name='start_time' value='$start_time'>
             <p>End time</p>
             <input type='time' name='end_time' value='$end_time'>
             <br>
             <input type='submit' name='submit' value='edit'>
             <br>
            </form>
            <br>
            ";
            ?>
            <a href="detail.php?id=<?php echo $id?>" style="color:#202013">Go back to event detail page</a>
            <?php
        }
    }
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $start_time=$_POST['start_time'];
        $end_time=$_POST['end_time'];
        $query = "UPDATE calendar_event SET title = '$title', description = '$description',start_time='$start_time',end_time='$end_time'  WHERE id = '$id'";
        $insertEdited = mysqli_query($conn, $query);
        
        if($insertEdited){
            echo "";
 }
        else{
            echo mysqli_error($conn);
        }
    }
}
?>
</div>
</body>    
</html>