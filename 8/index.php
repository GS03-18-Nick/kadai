<!--
TODO
Results page retrieving data
results page deleting data

survey page validating data
Survey page using modal to confirm
survey page submitting to results
-->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Nick Smith | Questionnaire</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="js/MODALONLYbootstrap.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/MODALONLYbootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<?php session_start(); ?>

  <body>
    <!-- Main nav section-->
    <nav id="nav-sec">
      <h1 class="text-xl text-thin text-white text-center">Welcome to Sexy Questionnaire</h1>

      <!-- Success or Error message from account creation -->
      <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="text-center text-lg text-thick text-white">'.$_SESSION['message'].'</p>';
        unset($_SESSION['message']);
      }
      ?>

        <div class="container vertical-center">
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
    <section class="hidden-div" id="login-sec">
      <h2 class="text-lg text-white text-center">Login Below</h2>
      <div class="container">
        <form action="login.php" method="post">
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
        </form>
      </div>
    </section>

    <!--    Create an Account hidden Section-->
    <section class="hidden-div" id="create-sec">
      <h2 class="text-lg text-white text-center">Create an Account for Fun!</h2>
      <div class="container">
        <form action="account.php" method="post">
          <div class="row">
            <div class="col col-1-2">
              <input type="text" placeholder="First Name" name="firstname" required>
            </div>
            <div class="col col-1-2">
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
            <div class="col col-1-2">
              <button type="submit" id="btn-create-account">Create Account</button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <script src="js/script.js"></script>

  </body>

</html>