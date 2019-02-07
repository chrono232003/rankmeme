<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rank Meme - Vote on Memes!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133843632-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-133843632-1');
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script>

    $(document).ready(function() {
          var request;

          $("#login-form").submit(function(event) {

            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();
            $('.alert').remove();

            var form = document.getElementById('login-form');
            var formData = new FormData(form);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "phpUtils/loginproc.php",
                type: "post",
                data: formData,
                processData: false,
                contentType: false
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                //urlResponseHandler(response);
                if (response != "Success") {
                  document.getElementById("loginError").style.display = "block";
                  document.getElementById("loginError").innerHTML = response;
                } else {
                  window.location.href = "index.php";
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
                $inputs.prop("disabled", false);
            });

          });


          $("#registration-form").submit(function(event) {

            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();
            $('.alert').remove();

            var form = document.getElementById('registration-form');
            var formData = new FormData(form);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "phpUtils/registeruser.php",
                type: "post",
                data: formData,
                processData: false,
                contentType: false
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                //urlResponseHandler(response);
                if (response != "Success") {
                  document.getElementById("registerError").style.display = "block";
                  document.getElementById("registerError").innerHTML = response;
                } else {
                  document.getElementById("uploadSection").style.display = "none";
                  document.getElementById("uploadSuccess").style.display = "block";
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
                $inputs.prop("disabled", false);
            });

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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
<?php
if ($_SESSION["user"]) {
            echo "<li class='nav-item'><a class='nav-link' href='submitameme.php'>Submit a Meme!</a></li>";
            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
          } else {
            echo "<li class='nav-item active'><a class='nav-link' href='registerlogin.php'>Login/Register</a></li>";
          }
?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class='col-lg-6'>
          <div class="userinput rounded shadow" id = "loginSection">
            <h1 class="my-4">
            <small>Login</small>
            </h1>
            <form id="login-form"  method="post" enctype="multipart/form-data">
              <label for="emailfield">Username:</label>
              <br />
            <div class="input-group">
                <input id="logintext" type="text" class="form-control" name="loginuser" placeholder="Enter Username" required>
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            </div>
            <div class="form-group">
            <label for="loginpass">Password:</label>
            <input type="password" class="form-control" name="loginpass" id="loginpass" placeholder="Password" required>
            </div>
            <p>forgot your password? <a href="forgotpassword.php">click here</a></p>
              <button class="btn btn-lg btn-primary" id="login" type="submit">Login</button>
              <p id="loginError" style="display:none; color:red;"></p>
            </form>
          </div>
        </div>
      <div class='col-lg-6'>
<div class="userinput rounded shadow" id = "uploadSection">
  <h1 class="my-4">
    <small>Register</small>
  </h1>
      <form id="registration-form"  method="post" enctype="multipart/form-data">
        <label for="emailfield">Username:</label>
        <br />
      <div class="input-group">
          <input id="text" type="text" class="form-control" name="user" placeholder="Enter Username" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      </div>

        <label for="emailfield">Email:</label>
        <br />
      <div class="input-group">
          <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      </div>
      <div class="form-group">
  <label for="pass">Password:</label>
  <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
</div>
<div class="form-group">
<label for="comparepass">Re-Enter Password:</label>
<input type="password" class="form-control" name="comparepass" id="comparepass" placeholder="Password" required>
</div>
      <br />
        <div id="image-preview-div" style="display: none">
          <label for="exampleInputFile">Selected image:</label>
          <br>
          <img id="preview-img" src="noimage">
        </div>
        <div class="form-group">
          Avatar (Optional):
          <input type="file" name="avatarimage" id="file" accept="image/x-png,image/gif,image/jpeg">
        </div>
        <button class="btn btn-lg btn-primary" id="uploadAvatar" type="submit">Register</button>
        <p id="registerError" style="display:none; color:red;"></p>
      </form>
</div>
<div id = "uploadSuccess" style="display:none">
  <h1 class="my-4">
      <small style="color:green">Thank you for registering, please check your email to confirm registration!</small>
    </h1>
</div>
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
    <script src="upload-image.js"></script>
  </body>

</html>
