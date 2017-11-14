<?php
session_start();

if($_SESSION['user']['type'] != 1)
{
    echo "<script>alert('Please sign in as an Admin!!')
    window.location.href='signin.php';
    </script>";
}

include("dbcon.php");//make connection here
    //checking if data has been entered
    if( isset( $_POST['firstname'] ) && !empty( $_POST['firstname'] ) &&
        isset( $_POST['lastname'] ) && !empty( $_POST['lastname'] ) &&
        isset( $_POST['uname'] ) && !empty( $_POST['uname'] ) &&
        isset( $_POST['pword'] ) && !empty( $_POST['pword'] )   )
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
    } else {
        echo "<script>alert('One or more of the fields are empty!!')
        window.location.href='admin.php';
        </script>";
    }
    if (isset($_POST['classification']))   // if ANY of the options was checked
      $class = 1;   // admin
    else
      $class = 0;   //user

    $salt1    = "qm&h*";
    $salt2    = "pg!@";

    $token    = hash('ripemd128', "$salt1$pword$salt2");

    add_user($connection, $firstname, $lastname, $uname, $token, $class);

    function add_user($connection, $fn, $ln, $un, $pw, $ad)
    {
      $query  = "INSERT INTO registeredusers (fname, lname, username, toac, password, admin) VALUES('$fn', '$ln', '$un', NOW(), '$pw', '$ad')";
      $result = $connection->query($query);
      if (!$result) die($connection->error);
      //closing mysqli connection
      $mysqli->close;
    }
?>
