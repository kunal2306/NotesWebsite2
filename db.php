<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noteswebsite";
$con =mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
  echo"No";
}
 
?>