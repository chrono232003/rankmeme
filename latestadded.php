<?php
session_start();
$name = $_SESSION['name'] ?: "";
$user = $_SESSION['userID'] ?: "";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Latest Added Memes">
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

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script>

    //$("#comment-form").submit(function(event) {
    function submitComment(index, memeid) {
      var request2;
      var comment = $("#commentText" + index).val();
      // Fire off the request to /form.php
      request2 = $.ajax({
          url: "phpUtils/submitcomment.php",
          type: "post",
          data: {comment: comment, memeID: memeid, userID: "<?php echo $user; ?>"},
      });

    };

    function commentExpand(index, memeid) {

      var request
      // Fire off the request to /form.php
      request = $.ajax({
          url: "phpUtils/getmemecomments.php",
          type: "post",
          data: {memeID: memeid}
      });

      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          var html = "";
          var json = JSON.parse(response);
          if(json.length != 0) {
            for(var i = 0; i <  json["object_name"].length; i++) {
              var user = json["object_name"][i].User;
              var comment = json["object_name"][i].Comment;
              var commentDate = json["object_name"][i].CommentDate;
              var avatar = json["object_name"][i].ImageLink;
              if (avatar) {
              html += "<img width='30px' src = '"+avatar+"'/> " + user + " at " + commentDate + "<br /><br />" + comment + "<hr />";
            } else {
              html += user + " at " + commentDate + "<br /><br />" + comment + "<hr />";
            }
          }
        } else {
          html += "No comments yet.<hr />";
          }
          //add the comment form if the user is logged in.
          var session = "<?php echo $name; ?>";
          if (session) {
          html += "<br /><div class='userinput rounded shadow' id = 'commentDiv'>";
          html += "<form id='comment-form' method='post' enctype='multipart/form-data'>";
          html += "<img src='//graph.facebook.com/<?php echo $user; ?>/picture'>"
          html += "<p style = 'color:black;'><?php echo $name; ?></p>"
          html += "<div class='form-group'>";
          html += "<label for='commentTextLabel' style = 'color:black;'>Comment:</label>";
          html += "<textarea class='form-control rounded-0' name='commentText"+index+"' id='commentText"+index+"' rows='5'></textarea>";
          html += "</div>";
          html += "<button class='btn btn-sm btn-primary' id='submitComment"+index+"' type='submit'>Submit</button>";
          html += "<p id='commentError' style='display:none; color:red;'></p>";
          html += "</form>";
          html += "</div>";

          //attach the event to the dynamically created button
          var comID = "submitComment" + index;
          $(document).on("click","#"+comID,function(){
            submitComment(index, memeid);
          });

          } else {
            html += "<br />Please login to comment.";
          }

          $('#commentSection' + index).html(html);
      });

      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
          console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
      });
    }

    $(document).ready(function() {

            //get votes
            var request2;

              // Fire off the request to /form.php
              request2 = $.ajax({
                  url: "phpUtils/getlatestmemes.php",
                  type: "get",
              });

              // Callback handler that will be called on success
              request2.done(function (response, textStatus, jqXHR){
                  var html = "";
                  var json = JSON.parse(response);
                  for(var i = 0; i <  json["object_name"].length; i++) {
                      var memeID = json["object_name"][i].ID;
                      var imagePath = "images/" + json["object_name"][i].emailID + "-" + json["object_name"][i].memepath;
                      var user = json["object_name"][i].User;
                      var votecount = json["object_name"][i].votecount;
                      var commentcount = json["object_name"][i].commentcount;
                      html += "<div class='col-lg-12 portfolio-item'>";
                      html += "<p style='color:white;'>"+user+"</p>";
                      html += "<a href = 'meme.php?memeid="+memeID+"'><img class='img-thumbnail img-fluid' style='max-height:300px;' src='"+ imagePath +"'></a>";
                      html += "<div class='row'>";
                      html += "<div class='col-lg-2'>";
                      html += "<p style='color:white;'><i class='fas fa-vote-yea'></i> " +votecount+"</p>";
                      html += "</div>";
                      html += "<div class='col-lg-2'>";
                      html += "<button class='comment-link' data-toggle='collapse' data-target='#commentSection"+i+"' onclick='commentExpand("+i+","+memeID+")'><p style='color:white;'><i class='fas fa-comments'></i> " +commentcount+"</p></button>";
                      html += "</div>";
                      html += "</div>";
                      html += "<div id='commentSection"+i+"' class='collapse'></div>";
                      html += "</div>";
                      $("#latestmemes").html(html);
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

        });

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
            <h1 style="color:white;" class="my-4">Latest Added</h1>
          </center>

          <div id="latestmemes" class="row"></div>

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
