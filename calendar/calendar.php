<html>
<head>
    <title>My events</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div style="text-align:left;font-size:250% ;background-color:rgba(0, 212, 28, 0.822);color:#202013" >    
<p>Events</p>
</div>
<h2 style="text-align:left;font-size:200% ;background-color:rgba(0, 212, 28, 0.822);color:#202013">Calendar

</h2>
<p><a href="create.php" style="text-align:left; font-size:100%; color:#202013">Add a new event</a></p>
<p><a href="logout.php" style="text-align:left; font-size:100%; color:#202013">Log out</a></p>

<?php
require_once 'database.php';
$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
"August", "September", "October", "November", "December");
if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
?>


<table width="1300">
<tr align="center">
<td bgcolor="#999999" style="color:#FFFFFF">
<table width="1300" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="1300" height="50" align="left" font-size="150%">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Previous</a></td>
<td width="1300" height="50" align="right" font-size="150%"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Next</a>  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center">
<table width="1300" border="0" cellpadding="10" cellspacing="10">
<tr align="center">
<td colspan="7" bgcolor="#999999" style="color:#FFFFFF" height="50" font-size='150%'><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
</tr>
<tr>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>S</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>M</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>T</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>W</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>T</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>F</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF" height="50"><strong>S</strong></td>
</tr>


<?php  
 $timestamp = mktime(0,0,0,$cMonth,1,$cYear); //mktime(hour,minute,second,month,day,year,is_dst);
 $maxday = date("t",$timestamp);              //t-The number of days in the given month
 $thismonth = getdate ($timestamp);
 $startday = $thismonth['wday'];              //wday-day of the week

 for ($i=0; $i<($maxday+$startday); $i++) {
    if(($i % 7) == 0 ) echo "<tr>";
    if($i < $startday) echo "<td></td>";
    else {
      echo "<td align='right' valign='middle' height='70' font-size='20px' ><a href='create.php' style='color:#202013'>". ($i - $startday + 1)."</a><br>";
      $cDay=($i - $startday + 1);
      
      $date = $cYear . '-' . $cMonth . '-' . $cDay;
      $query  = "SELECT id,title,description,start_time,end_time FROM calendar_event WHERE date='$date'";
      $result = mysqli_query($conn, $query);
      
      while ($row = $result->fetch_assoc()) {
          ?>
          <a href="detail.php?id=<?php echo $row['id']?>" style='color:#202013' ><?php echo $row['title']?></a>
          <br>
          <?php
          }
      echo "</td>";    
    }
    if(($i % 7) == 6 ) echo "</tr>";
}   
?>
</table>
</td>
</tr>
</table>
