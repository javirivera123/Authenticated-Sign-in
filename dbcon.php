<?php
$host='earth.cs.utep.edu';
$user='cs_jrivera17';
$password='Qum5tanq$';
$database='cs_jrivera17';
$connection = mysqli_connect($host,$user,$password,$database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
