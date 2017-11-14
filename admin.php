<?php
session_start();

if($_SESSION['user']['type'] != 1)
{
    echo "<script>alert('Please sign in as an Admin!!')
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
                      <h3 class="panel-title">AdminPage</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form" method="post" action="insert.php">
                          <fieldset>
                          <legend>Enter User info</legend>
                              <div class="form-group"  >
                                  <h2>Add-a-user?</h2>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="firstname" name="firstname" type="text">
                              </div>
                              <div class="form-group"  >
                                  <input class="form-control" placeholder="lastname" name="lastname" type="text">
                              </div>
                              <div class="form-group"  >
                                  <input class="form-control" placeholder="username" name="uname" type="text">
                              </div>
                              <div class="form-group"  >
                                  <input class="form-control" placeholder="password" name="pword" type="password">
                              </div>
                              <div class="form-group"  >
                                  <input type="radio" name="classification" id="radioBtn" value="1"  onclick="test(this)"> admin<br>
                                   <script type = 'text/javascript'>
                                      var radioState = false;
                                      function test(element){
                                    if(radioState == false) {
                                      check();
                                      radioState = true;
                                      }else{
                                        uncheck();
                                        radioState = false;
                                      }
                                    }
                                    function check() {
                                      document.getElementById("radioBtn").checked = true;
                                    }
                                    function uncheck() {
                                      document.getElementById("radioBtn").checked = false;
                                    }
                                    </script>
                              </div>


                                  <input type="submit" value="register">
                          </fieldset>
                      </form>
                    <center><button onclick= location.href='mainpage.php'>Mainpage</button>
                    <?php

                      echo ("<button onclick= \"location.href='logout.php'\">Log out</button>");

                   ?>

                   <button onclick= location.href='viewall.php'>View all users</button>
                   </center>
                  </div>
              </div>
          </div>
      </div>
  </div>

  </body>

  </html>
