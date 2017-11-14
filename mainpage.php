<?php
session_start();

if( !$_SESSION['user']['type'] )
{
  echo "you are not logged in";
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>MainPage</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
     }
    .link1 {
    	display: inline-block;
    	position: center;

    }
    .link2 {
        display: inline-block;
    	margin-left: 20px;
    }


</style>
<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">MainPage</h3>
                </div>
                <div class="panel-body">

                        <fieldset>
                                   <!--//sign in button-->
                                   <?php
                                   if( !isset($_SESSION['user']['type']) &&  empty($_SESSION['user']['type']) ){

                                     echo ("<button onclick= \"location.href='signin.php'\">Sign in</button>");
                                    }
                                  ?>
                                   <?php //userpage button
                         					if ( isset($_SESSION['user']['type']) ){

                                      echo ("<button onclick= \"location.href='user.php'\">UserPage</button>");

                       						  }
                     						   ?>
                                   <div class="link1">
                                     <?php

                                     if ($_SESSION['user']['type'] == 1){
                                 		?><button onclick= location.href='admin.php'>Adminpage</button><?php
                                   }
                                   ?>
                                 	</div>

                        </fieldset>

                      <div class="link2">

                  	</div>
                    <?php
                    if( isset($_SESSION['user']['type']) ) {
                      echo ("<button onclick= \"location.href='logout.php'\">Log out</button>");
                     }
                   ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
