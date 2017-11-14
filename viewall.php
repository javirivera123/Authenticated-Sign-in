<?php
session_start();

if($_SESSION['user']['type'] != 1)
{
    echo "<script>alert('Please sign in as an Admin!!')
    window.location.href='signin.php';
    </script>";
}
include("dbcon.php");

    $query  = "SELECT fname, lname, username, toac, lastlogin FROM registeredusers";
    $result=mysqli_query($connection,$query);
    if (!$result) die($connection->error);
    elseif (mysqli_num_rows($result))
    {
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "First name: " . $row['fname']. ", last: " . $row['lname']. ", username: " . $row['username']. ", Created: " . $row['toac']. ", last login: " . $row['lastlogin']. "<br>";
        }
      } else {
        echo "0 results";
      }
        $result->close();


    }
      else die("noconnect");

  $connection->close();

  echo ("<button onclick= location.href='admin.php'>go back</button>");

?>
