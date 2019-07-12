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

    <title>Rank Meme - Vote on Memes!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

 </head>

  <body>

<?php
require_once('page-components/menu.php');
?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class='col-lg-12'>
          <!-- Page Heading -->
          <center>
            <h1 style="color:white;" class="my-4">
              <small>Rank Meme Contest Rules</small>
            </h1>
          </center>
          <p>Rank meme has a weekly contest for a $20 gift card for a user with the most meme likes for the week. The user must be a Facebook user and login the site via Facebook to participate. The winner will be notified and recieve the gift card via email or via Facebook.</p>
          <p>To take part in the contest, the user must abid by the following guidlines and rules. Failure to do so may result in disqualification on the weekly contest.</p>
          <ol type="1">
<li>A user must not submit more than 4 memes per week.</li>
<li>A user must submit only memes or cartoons. Any other type of picture will result in disqualification.</li>
<li>The images submitted must not contain any nudity or material that is considered 18+</li>
<li>The user must not vote excessively on their own memes. That is cheating and will cause disqualification.</li>
</ol>
<p>Thanks and enjoy the contest!</p>

        </div>
    </div>
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Rank Meme 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
