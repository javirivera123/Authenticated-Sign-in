<?php
session_start(); // Starting Session
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Login</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="signin.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="username" name="username" type="username" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="password" name="password" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                  <center><button onclick= location.href='mainpage.php'>Mainpage</button></center>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php
include("dbcon.php");
if(isset($_POST['login']))
{
    $user_name=$_POST['username'];
    $pass_word=$_POST['password'];

    $query  = "SELECT * FROM registeredusers WHERE username='$user_name'";
    $result=mysqli_query($connection,$query);
    if (!$result) die($connection->error);
    elseif (mysqli_num_rows($result))
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pass_word$salt2");

        if ($token == $row[5] && $row[6] == 1){
          echo "Hi $row[0], you are now logged in as '$row[2]' <br>";
          echo "You are also an admin";
        $_SESSION['user']['type']=1;//here session is used and value of $username store in $_SESSION.
        $_SESSION['user']['username']=$user_name;
        updatelogin($user_name);
      }
      elseif ($token == $row[5] && $row[6] == 0){
        echo "Hi $row[0], you are now logged in as '$row[2]' <br>";
        echo "You are a regular user";
      $_SESSION['user']['type']=2;//here session is used and value of $username store in $_SESSION.
      $_SESSION['user']['username']=$user_name;
      updatelogin($user_name);

     }
    }
      else die("Invalid username/password combination");
}else die("Enter username/password combination");
  //$connection->close();

  function updatelogin($user_name){
    include("dbcon.php");
    $sql = "UPDATE registeredusers SET lastlogin=NOW() WHERE username='$user_name' ";
    if (mysqli_query($connection, $sql)) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  }

?>
