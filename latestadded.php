<?php
session_start();
$name = $_SESSION['name'] ?: "";
$user = $_SESSION['userID'] ?: "";

function getLatestMemes() {
  include 'phpUtils/connect.php';

  $query = "SELECT m.ID, m.memepath, m.emailID, m.dateAdded, m.votecount, m.commentcount, e.User, e.avatarLink as ImageLink FROM memes AS m INNER JOIN emails as e on m.emailID = e.id ORDER BY dateAdded DESC LIMIT 100";
  $result = mysqli_query($conn, $query);
  return $result;
}


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Latest Added Memes">
    <meta name="author" content="">

    <title>Latest added memes to browse and comment - Rank Meme!</title>

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

    <!-- font awesome for the spinner -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
              html += "<img width='30px' src = '"+avatar+"'/> " + user.split(" ")[0] + " at " + commentDate + "<br /><br />" + comment + "<hr />";
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
        </script>
 </head>

  <body>

    <?php
    require_once('page-components/menu.php');
    ?>

    <!-- Page Content -->
    <div class="container">
      <!-- <div class="row"> -->
        <!-- <div class='col-lg-12'> -->
          <!-- Page Heading -->
          <center>
            <h1 style="color:white;" class="my-4">Latest Added</h1>

<div id="amzn-assoc-ad-3b51d882-5934-4a45-8a88-3547326ee7ad"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=3b51d882-5934-4a45-8a88-3547326ee7ad"></script>

<!-- loading spinner -->
<div id = "spinner" style="margin-top: 50px;">
<i class="fa fa-circle-o-notch fa-spin" style="font-size:48px"></i>
</div>

</center>

          <div id="latestmemes" class="masonry2">


          <?php
          $result = getLatestMemes();
          if ($result) {
            while ($row=mysqli_fetch_row($result)) {
                  $memeID = $row[0];
                  $memePath = $row[1];
                  $altValue = str_replace('images/','',$memePath);
                  $altValue = str_replace('.jpg','',$altValue);
                  $altValue = str_replace('.png','',$altValue);
                  $imagePath = "images/" .$row[2]. "-" . $memePath;
                  $user = $row[6];
                  $userFirstName = explode(" ", $user)[0];
                  $votecount = $row[4];
                  $commentcount = $row[5];
                  $avatar = $row[7];
                  //echo "<div class='col-lg-4 portfolio-item'>";
                  // echo "<div class='item'>";
                  echo "<div class='masonry2-brick'>";
                  if ($avatar) {
                      echo "<p style='color:white;'><img width='30px;' style='margin-right:5px;' src = '".$avatar."'/>".$userFirstName."</p>";
                      } else {
                      echo "<p style='color:white;'>".$userFirstName."</p>";
                     }
                      echo "<a href = 'meme.php?memeid=".$memeID."'><img class='img-thumbnail img-fluid' style='max-height:250px;' src='". $imagePath ."' alt='".$altValue."'></a>";
                      echo "<div class='row'>";
                      echo "<div class='col-lg-6'>";
                      echo "<p style='color:white;'><i class='fas fa-thumbs-up'></i> " .$votecount."</p>";
                      echo "</div>";
                      echo "<div class='col-lg-6'>";
                      //echo "<button class='comment-link' data-toggle='collapse' data-target='#commentSection"+i+"' onclick='commentExpand("+i+","+memeID+")'><p style='color:white;'><i class='fas fa-comments'></i> " +commentcount+"</p></button>";
                      echo "<a href = 'meme.php?memeid=".$memeID."'><button class='comment-link'><p style='color:white;'><i class='fas fa-comments'></i> " .$commentcount."</p></button></a>";
                      echo "</div>";
                      echo "</div>";
                      //echo "<div id='commentSection"+i+"' class='collapse'></div>";
                      echo "</div>";
            }
          }
           ?>
        <script>
          $('#spinner').css("display", "none");
          </script>
          </div>
        <!-- </div> -->
    <!-- </div> -->
  </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
    require_once('page-components/footer.php');
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
