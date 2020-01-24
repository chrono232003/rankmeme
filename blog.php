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

    <title>Blog About Memes - Rank Meme</title>

    <meta name="verifyownership"
 content="a51eeecc02296dbf909143c2350f4a4b"/>

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

 </head>

  <body>

<?php
require_once('page-components/menu.php');
?>

    <!-- Page Content -->

    <div class = "container">
      <h2>Some of the most popular memes in 2019</h2>
      <div class = "div-bottom-margin">
        <b>1. The Baby Yoda</b><br /><br />
        <img src = "images/2348259505184442-baby-yoda-memes.jpg" class="blog-page-meme-images" alt="baby-yoda">
        <br />
        <p>He appeared onscreen in the premiere episode of the new Disney+ series The Mandalorian on November 12, the creature referred to as Baby Yoda has become an internet sensation.
        Of course there had to be a meme around this seemingly innocent creature. The one above gives him a hilarious devious side and there are many more just like this one.</p>
      </div>
      <div class = "div-bottom-margin">
        <b>2. The Angry Woman and Cat</b><br /><br />
        <img src = "images/2348259505184442-angry-woman-and-cat.jpg" class="blog-page-meme-images" alt="angry-woman-and-cat">
        <br />
        <p>This is my personal favorite. It works in so many jokes and situations and the history behind the meme is interesting as well.
        The first half of the meme comes from a 2011 episode of The Real Housewives of Beverly Hills, where then-cast member Taylor Armstrong found herself in an emotional confrontation with Camille Grammer, as fellow housewife Kyle Richards attempts to calm her down.
        As for the other half of the meme starring the angry white cat, its origins began on Tumblr, when user deadbefordeath posted a photograph of a white cat with a bewildered expression sitting in a chair in front of a plate of vegetables.</p>
      </div>
      <div class = "div-bottom-margin">
        <b>3. Momo</b><br /><br />
        <img src = "images/2348259505184442-momo.jpeg" class="blog-page-meme-images" alt="momo">
        <br />
        <p>This is a funny one as something relatively creepy got made into a popular meme. Momo was an internet hoax on YouTube
        where a creature called Momo would try an convince kids to kill themselves. Momo would allegidly interupt vidoes that young viewers were
      watching and talk them into doing bad things. There is no actual evidence of this happening but become well known enough to be a popular meme.</p>
      <br />
      <p>It is exciting to see what new meme sensations that 2020 will bring.
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
