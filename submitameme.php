<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Submit a meme to Rank Meme! ">
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
          $("#upload-meme-form").submit(function(event) {

            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();
            $('.alert').remove();

            var form = document.getElementById('upload-meme-form');
            var formData = new FormData(form);
            <?php
            echo "formData.append('userID','".  $_SESSION["userID"] . "');";
            echo "formData.append('userName','".  $_SESSION["name"] . "');";
            ?>
            // Fire off the request to /form.php
            request = $.ajax({
                url: "phpUtils/memesubmit.php",
                type: "post",
                data: formData,
                processData: false,
                contentType: false
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                //urlResponseHandler(response);
                if (response.trim() != "Success") {
                  document.getElementById("imageError").style.display = "block";
                  document.getElementById("imageError").innerHTML = response;
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

    <?php
    require_once('page-components/menu.php');
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 style = "color:white;" class="my-4">Meme Upload
        <small>Register and Upload a Meme!</small>
      </h1>
<div id = "uploadSection">
      <form id="upload-meme-form"  method="post" enctype="multipart/form-data">
        <div id="image-preview-div" style="display: none">
          <label for="exampleInputFile">Selected image:</label>
          <br>
          <img id="preview-img" src="noimage">
        </div>
        <div class="form-group">
          <input type="file" name="memeimage" id="file" accept="image/x-png,image/gif,image/jpeg" required>
        </div>
        <button class="btn btn-lg btn-primary" id="upload-button" type="submit" disabled>Upload image (1MB max)</button>
        <p id="imageError" style="display:none; color:red;"></p>
      </form>
</div>
<div id = "uploadSuccess" style="display:none">
  <h1 class="my-4">
      <small style="color:green">Meme Upload Successful!</small>
      <small style="color:green">Go <a href="index.php">Vote!</a></small>
    </h1>
</div>


    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
    require_once('page-components/footer.php');
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="upload-image.js"></script>
  </body>

</html>
