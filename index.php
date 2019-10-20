<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Vote on memes and submit your own for voting. Weekly winners!">
    <meta name="author" content="">

    <title>Submit and Vote on Memes - Rank Meme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- font awesome for the spinner -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133843632-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133843632-1');
</script>


    <!-- get jquery to use for the ajax call -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- grab the js file for the page -->
    <script src="js/homepage.js"></script>

    <script>
      loadPageData();
    </script>
 </head>

  <body>

<?php
require_once('page-components/menu.php');
?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class='col-lg-9'>
          <!-- Page Heading -->
          <center>
          <div class = "row title-wrapper my-4">
            <div class="col-xl-4">
                <?php
                if ($_SESSION["userID"]) {
                          echo "<button onclick=\"window.location.href='/submitameme.php'\" type='button' class='btn btn-primary btn-lg submit-button'>Submit A Meme</button>";
                } else {
                        echo "<p>Post your own!</p>";
                        echo "<div class='fb-login-button' style='margin-top:8px;' data-size='medium' data-button-type='login_with' data-auto-logout-link='false' data-use-continue-as='false' onlogin='checkLoginState();'></div>";
                      }
                ?>
            </div>
              <div class="col-xl-8">
                <h1 style="color:white;">Vote
                  <small>Which of these do you like the best?</small>
                </h1>
              </div>
          </div>
              <!-- loading spinner -->
              <div id = "spinner" style="display:none; margin-top: 50px; margin-bottom: 50px;">
              <i class="fa fa-circle-o-notch fa-spin" style="font-size:48px"></i>
            </div>
          </center>

          <div id="votebox" class="row"></div>

        </div>
        <div class='col-lg-3 sidebar rounded shadow'>
          <br />
          <p>Weekly Contest: Win a $20 Amazon gift card for most weekly votes on your meme! Login to post one now!<p>
          <a href="contestrules.php" class="weekly-contest-link">Weekly Contest Rules<a>
          <div class="rounded shadow" id="weeklywinner">
            <center>
            <h2 class="my-4">
              <small>Last Week's Winner!</small>
            </h2>
            <div id="winnerinfo" class="row"></div>
            <center>
          </div>
            <h1 class="my-4">

<div id="amzn-assoc-ad-3b51d882-5934-4a45-8a88-3547326ee7ad"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=3b51d882-5934-4a45-8a88-3547326ee7ad"></script>

              <small style="color:white;">Week Leaders</small>
            </h1>
            <div id="topfive" class="row"></div>
        </div>
    </div>
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
    require_once('page-components/footer.php');
    ?>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
