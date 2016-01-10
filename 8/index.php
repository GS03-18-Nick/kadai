<?php
session_start();

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Nick Smith | </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/MODALONLYbootstrap.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>


<!--    Main nav section-->
    <nav id="nav-sec">
      <div class="container">
        <div class="row">
          <div class="col col-1-2">
            <button type="button" id="btn-login">Sign in</button>
          </div>
          <div class="col col-1-2">
            <button type="button" id="btn-create">Create Account</button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Login Hidden section -->
    <section class="" id="login-sec">
      <div class="container">
        <form action="survey.php" method="post">
          <div class="row">
            <div class="col col-1-2">
              <input type="email" name="login" placeholder="Login with Email" required>
            </div>
            <div class="col col-1-2">
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="col col-1-2">
              <button type="submit" id="btn-login-submit">Login</button>
            </div>
          </div>
      </div>
      </form>
    </section>

<!--    Create and Account hidden Section-->
    <section class="hidden" id="create-sec">
      <div class="container">
        <form action="account.php" method="post">
          <div class="row">
            <div class="col col-1-2">
              <input type="text" placeholder="First Name" name="firstname" required>
            </div>
            <div>
              <input type="text" placeholder="Last Name" name="lastname" required>
            </div>
          </div>
          <div class="row">
            <div class="col col-1-2">
              <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="col col-1-2">
              <input type="password" placeholder="Password" name="newpass" required>
            </div>
          </div>
          <button type="submit" id="btn-create-account">Create Account</button>
        </form>
      </div>
    </section>



    <!--
  <section>
    <div class="container">
      <form action="insert.php" method="post">
        <input type="text" placeholder="name" name="name">
        <input type="email" placeholder="email" name="email">
        <label>age
          <input type="number" name="age">
        </label>
        <textarea placeholder="comments" name="comment"></textarea>
        <div>
          <button type="submit" id="btn-submit">Submit</button>
          <button type="reset" id="btn-reset">Reset</button>
      </form>
    </div>
  </section>
-->

    <script src="js/script.js"></script>

  </body>

  </html>