<?php
  session_start();

  if( !isset($_SESSION['user']['type']) )
  {
      echo "<script>alert('Please sign in as an User!!')
      window.location.href='signin.php';
      </script>";
  }

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
                      <h3 class="panel-title">UserPage</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form" method="post" action="signin.php">
                          <fieldset>
                          <?php
                          include ("dbcon.php");

                            $uname = $_SESSION['user']['username'];

                          $query  = "SELECT fname, lname, username, toac, lastlogin FROM registeredusers where username = '$uname'";
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

                          ?>

                          </fieldset>
                      </form>
                    <center><button onclick= location.href='mainpage.php'>Mainpage</button>
                    <button onclick= location.href='logout.php'>Log out</button>

                    </center>
                  </div>
              </div>
          </div>
      </div>
  </div>

  </body>

  </html>
