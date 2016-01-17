<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Survey</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="js/MODALONLYbootstrap.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/MODALONLYbootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<?php 
  session_start(); 
  $username = $_SESSION['name'];
  ?>

  <body>

    <!--    Greeting Section-->
    <section id="survey-sec">
      <div class="container">
        <div class="logout">
          <a class="text-thick text-md text-left text-link" href="index.php">Not <?=$username?>? Logout here</a>
          <a href="survey-table.php">See Table</a>
        </div>
        <h1 class="text-xl text-center text-thin"><?=$username?></h1>
        <h2 class="text-lg text-center">Welcome to the Survey!</h2>

        <h2><?php if (isset($_SESSION['fail'])) {
  echo $_SESSION['fail'];
} ?></h2>
      </div>

      <!--      The Survey-->
      <div class="container">
        <form action="results.php" method="post">
          <div class="row">
            <div class="col col-1-2">
              <label class="center-block text-lg text-thick">Whats your favorite fish?
                <input type="text" placeholder="Fish name" name="fish">
              </label>
            </div>
            <div class="col col-1-2">
              <label class="center-block text-lg text-thick">What kind of pet do you prefer?
                <input type="text" placeholder="Enter Animal" name="pet" list="boners">
                <datalist id="boners">
                  <option value="Cats"></option>
                  <option value="Dogs"></option>
                  <option value="Trouser Snakes"></option>
                  <option value="Pussy Cats"></option>
                </datalist>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="col col-1-2">
              <label class="center-block text-lg text-thick">Birthplace
                <select name="hometown">
                  <option value="" selected>都道府県</option>
                  <option value="北海道">北海道</option>
                  <option value="青森県">青森県</option>
                  <option value="岩手県">岩手県</option>
                  <option value="宮城県">宮城県</option>
                  <option value="秋田県">秋田県</option>
                  <option value="山形県">山形県</option>
                  <option value="福島県">福島県</option>
                  <option value="茨城県">茨城県</option>
                  <option value="栃木県">栃木県</option>
                  <option value="群馬県">群馬県</option>
                  <option value="埼玉県">埼玉県</option>
                  <option value="千葉県">千葉県</option>
                  <option value="東京都">東京都</option>
                  <option value="神奈川県">神奈川県</option>
                  <option value="新潟県">新潟県</option>
                  <option value="富山県">富山県</option>
                  <option value="石川県">石川県</option>
                  <option value="福井県">福井県</option>
                  <option value="山梨県">山梨県</option>
                  <option value="長野県">長野県</option>
                  <option value="岐阜県">岐阜県</option>
                  <option value="静岡県">静岡県</option>
                  <option value="愛知県">愛知県</option>
                  <option value="三重県">三重県</option>
                  <option value="滋賀県">滋賀県</option>
                  <option value="京都府">京都府</option>
                  <option value="大阪府">大阪府</option>
                  <option value="兵庫県">兵庫県</option>
                  <option value="奈良県">奈良県</option>
                  <option value="和歌山県">和歌山県</option>
                  <option value="鳥取県">鳥取県</option>
                  <option value="島根県">島根県</option>
                  <option value="岡山県">岡山県</option>
                  <option value="広島県">広島県</option>
                  <option value="山口県">山口県</option>
                  <option value="徳島県">徳島県</option>
                  <option value="香川県">香川県</option>
                  <option value="愛媛県">愛媛県</option>
                  <option value="高知県">高知県</option>
                  <option value="福岡県">福岡県</option>
                  <option value="佐賀県">佐賀県</option>
                  <option value="長崎県">長崎県</option>
                  <option value="熊本県">熊本県</option>
                  <option value="大分県">大分県</option>
                  <option value="宮崎県">宮崎県</option>
                  <option value="鹿児島県">鹿児島県</option>
                  <option value="沖縄県">沖縄県</option>
                </select>
              </label>
            </div>
            <div class="col col-1-2">
              <label class="center-block text-lg text-thick">Fav starwars?
                <input type="text" name="starwars">
              </label>

              <!--
                <p>Favorite Star Wars Set?</p>
                <label>Episode 1-3
                  <input type="checkbox" value="1-3" name="starwars">
                </label>
                <label>Episode 4-6
                  <input type="checkbox" value="4-6" name="starwars">
                </label>
-->
            </div>
            <div class="col col-1-2">
              <button type="submit" id="btn-survey">Reply to survey</button>
            </div>
          </div>
        </form>
      </div>


      <div class="container">
        <?php 
  if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    $button = '<a href="survey-table.php" class="btn-results">Go to results</a>';
  }
      ?>

          <h1 class="text-xl text-thin text-center"><?php if(isset($success)) {echo $success;} ?></h1>
          <div>
            <?php if(isset($button)) {echo $button;} ?>
          </div>
      </div>
    </section>
    <?php unset($_SESSION['success']); unset($_SESSION['fail']); ?>
  </body>

</html>