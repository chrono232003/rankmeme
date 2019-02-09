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


    <!-- get jquery to use for the ajax call -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <script>

    function updateVote(id) {
      var request;
        request = $.ajax({
            url: "phpUtils/updatevote.php",
            type: "post",
            data: { memeID : id }
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
              console.log(response);
        });

        grabmemes();
    }

    function grabmemes() {
        var request;

          // Fire off the request to /form.php
          request = $.ajax({
              url: "phpUtils/grabmemes.php",
              type: "get",
          });

          // Callback handler that will be called on success
          request.done(function (response, textStatus, jqXHR){
              var html = "";
              var json = JSON.parse(response);
              for(var i = 0; i <  json["object_name"].length; i++) {
                  var imagePath = "images/" + json["object_name"][i].ID + "-" + json["object_name"][i].memepath;
                  var imageID = json["object_name"][i].memeID;
                  html += "<div class='col-lg-6 portfolio-item memeblk' onclick='updateVote("+imageID+")'><img class='img-thumbnail meme-images' src='"+ imagePath +"'></div>";
                  $("#votebox").html(html);
              }
          });

          // Callback handler that will be called on failure
          request.fail(function (jqXHR, textStatus, errorThrown){
              // Log the error to the console
              console.error(
                  "The following error occurred: "+
                  textStatus, errorThrown
              );
          });

          // Callback handler that will be called regardless
          // if the request failed or succeeded
          request.always(function () {
              // Reenable the inputs
              //$inputs.prop("disabled", false);
          });
        }


    $(document).ready(function() {

      //ajax call so that we do not need to refresh the while page each time someone votes.
      grabmemes();

            //get votes
            var request2;

              // Fire off the request to /form.php
              request2 = $.ajax({
                  url: "phpUtils/getweeklytop.php",
                  type: "get",
              });

              // Callback handler that will be called on success
              request2.done(function (response, textStatus, jqXHR){
                  var html = "";
                  var json = JSON.parse(response);
                  for(var i = 0; i <  json["object_name"].length; i++) {
                      var imagePath = "images/" + json["object_name"][i].emailID + "-" + json["object_name"][i].memepath;
                      var imageID = json["object_name"][i].memeID;
                      var user = json["object_name"][i].User;
                      html += "<div class='col-lg-12 portfolio-item'><p style='color:white;'>"+user+"</p><img class='img-thumbnail side-bar-img' src='"+ imagePath +"'></div>";
                      $("#topfive").html(html);
                  }
              });

              // Callback handler that will be called on failure
              request2.fail(function (jqXHR, textStatus, errorThrown){
                  // Log the error to the console
                  console.error(
                      "The following error occurred: "+
                      textStatus, errorThrown
                  );
              });

              // Callback handler that will be called regardless
              // if the request failed or succeeded
              request2.always(function () {
                  // Reenable the inputs
                  //$inputs.prop("disabled", false);
              });

              var request3;

                // Fire off the request to /form.php
                request3 = $.ajax({
                    url: "phpUtils/getwinner.php",
                    type: "get",
                });

                // Callback handler that will be called on success
                request3.done(function (response, textStatus, jqXHR){
                    var html = "";
                    var json = JSON.parse(response);
                    for(var i = 0; i <  json["object_name"].length; i++) {
                        var imagePath = json["object_name"][i].MemePath;
                        var user = json["object_name"][i].User;
                        html += "<div class='col-lg-12 portfolio-item'><p>Submitted By: <b>"+user+"</b></p><img class='img-thumbnail side-bar-img' src='"+ imagePath +"'></div>";
                        $("#winnerinfo").html(html);
                    }
                });

                // Callback handler that will be called on failure
                request3.fail(function (jqXHR, textStatus, errorThrown){
                    // Log the error to the console
                    console.error(
                        "The following error occurred: "+
                        textStatus, errorThrown
                    );
                });

                // Callback handler that will be called regardless
                // if the request failed or succeeded
                request.always(function () {
                    // Reenable the inputs
                    //$inputs.prop("disabled", false);
                });
        });

        </script>
 </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Rank Meme</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
<?php
if ($_SESSION["user"]) {
            echo "<li class='nav-item'><a class='nav-link' href='submitameme.php'>Submit a Meme!</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='registerlogin.php'>Login/Register</a></li>";
          }
?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class='col-lg-9'>
          <!-- Page Heading -->
          <center>
            <h1 style="color:white;" class="my-4">Vote
              <small>Which of these do you like the best?</small>
            </h1>
          </center>

          <div id="votebox" class="row"></div>

        </div>
        <div class='col-lg-3 sidebar rounded shadow'>
          <div class="rounded shadow" id="weeklywinner">
            <center>
            <h2 class="my-4">
              <small>Last Week's Winner!</small>
            </h2>
            <div id="winnerinfo" class="row"></div>
            <center>
          </div>
            <h1 class="my-4">
              <small style="color:white;">Week Leaders</small>
            </h1>
            <div id="topfive" class="row"></div>
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
