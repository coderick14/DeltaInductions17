<?php
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "users";
//Create connection
$con = new mysqli($host, $username, $password, $dbname);
//Check connection
if ($con->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);

  }
