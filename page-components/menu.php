<!-- Navigation -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '296673567682634',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.2'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function statusChangeCallback(response) {
     console.log("this is the response: " + JSON.stringify(response));
     if(response.status == 'connected') {
       var name = "";
       var userId = response.authResponse.userID;
       FB.api('/me', function(response) {
         name = response.name;
         // Fire off the request to /form.php
         request = $.ajax({
             url: "phpUtils/startSession.php",
             type: "post",
             data: {userId: userId, name: name}
         });

         // Callback handler that will be called on success
         request.done(function (response, textStatus, jqXHR){
              window.location.href = "index.php";
         });

         // Callback handler that will be called on failure
         request.fail(function (jqXHR, textStatus, errorThrown){
             // Log the error to the console
             console.error(
                 "The following error occurred: "+
                 textStatus, errorThrown
             );
         });
      });
    }
   }

   FB.getLoginStatus(function(response) {
       statusChangeCallback(response);
   });

  function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
 }
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Rank Meme</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li> -->
<?php
if ($_SESSION["userID"]) {
          echo "<li class='nav-item' style='padding:.5rem'><img width = '30px' src='//graph.facebook.com/".$_SESSION["userID"]."/picture'></li>";
        echo "<li class='nav-item' style='padding:.5rem 1rem'>" . $_SESSION["name"] . "</li>";
        echo "<li class='nav-item'><a class='nav-link' href='submitameme.php'>Submit a Meme!</a></li>";
        echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
      } else {
        //echo "<li class='nav-item'><a class='nav-link' href='registerlogin.php'>Login/Register</a></li>";
        echo "<li class='nav-item' style='padding:.5rem 1rem'><fb:login-button scope='public_profile,email' onlogin='checkLoginState();'></fb:login-button></li>";
      }
?>
<li class='nav-item'><a class='nav-link' href='latestadded.php'>Latest Memes</a></li>
      </ul>
    </div>
  </div>
</nav>
