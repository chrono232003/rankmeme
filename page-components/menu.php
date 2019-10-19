<!-- Navigation -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="537294605596-c2cn8i01b2p2v9hkn80frg58ch6tgeag.apps.googleusercontent.com">
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

/*google sign in function */
 function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #1E1E1E !important">
  <div class="container">
    <img src = "site-images/logo.png" width="150px"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>

        <li class='nav-item'><a class='nav-link' href='latestadded.php'>Latest Memes</a></li>
        <li class='nav-item'><a class='nav-link' href='privatepolicy.php'>Privacy Policy</a></li>
<?php
if ($_SESSION["userID"]) {
        echo "<li class='dropdown' style='padding: .5rem 1rem;'><a class='dropdown-toggle' style='color:white;' data-toggle='dropdown' href='#'>";
        echo "<img width = '30px' src='//graph.facebook.com/".$_SESSION["userID"]."/picture'>";
        echo "<span class='caret'></span></a>";
        echo "<ul class='dropdown-menu sidebar'>";
        echo "<li><a class='dropdown-link' href='submitameme.php' style='color:white; text-decoration:none; margin-left:10px;'>Submit a Meme!</a></li>";
        echo "<li><a class='dropdown-link' href='logout.php' style='color:white; text-decoration:none; margin-left:10px;'>Logout</a></li>";
        echo "</ul>";
        echo "</li>";
      } else {
        //echo "<li class='nav-item'><a class='nav-link' href='registerlogin.php'>Login/Register</a></li>";
        echo "<div class='fb-login-button' style='margin-top:8px;' data-size='medium' data-button-type='login_with' data-auto-logout-link='false' data-use-continue-as='false' onlogin='checkLoginState();'></div>";
        //echo "<div class='g-signin2' data-onsuccess='onSignIn'></div>";
        //echo "<li class='nav-item' style='padding:.5rem 1rem'><fb:login-button scope='public_profile,email' onlogin='checkLoginState();'></fb:login-button></li>";
      }
?>
      </ul>
    </div>
  </div>
</nav>
<br />
