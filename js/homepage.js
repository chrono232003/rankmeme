// This function gets fired right away to populate the page. It also gets fired after every vote click to regenerate the memes to be
// voted on.
function grabmemes() {
  //show spinner and hide votebox
  $('#spinner').css("display", "block");
  $('#votebox').css("display", "none");

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
              var memePath = json["object_name"][i].memepath;
              var imagePath = "images/" + json["object_name"][i].ID + "-" + json["object_name"][i].memepath;
              var imageID = json["object_name"][i].memeID;
              html += "<div class='col-lg-6 portfolio-item memeblk' onclick='updateVote("+imageID+")'><img class='img-thumbnail meme-images' src='"+ imagePath +"' alt='"+ memePath.replace('images/','').replace('.jpg','').replace('.png','') +"'></div>";
              $("#votebox").html(html);

              //hide spinner and show votebox
              $('#spinner').css("display", "none");
              $('#votebox').css("display", "inline-flex");
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



  //update the votes as users click on images. This function will be triggered from the click of an image on the home page.
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

      $('html, body').animate({ scrollTop: 0 }, 'fast');
      grabmemes();
  }



function getWeeklyTop() {
      //get votes
      var request;

        // Fire off the request to /form.php
        request = $.ajax({
            url: "phpUtils/getweeklytop.php",
            type: "get",
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            var html = "";
            var json = JSON.parse(response);
            for(var i = 0; i <  json["object_name"].length; i++) {
                var imagePath = "images/" + json["object_name"][i].emailID + "-" + json["object_name"][i].memepath;
                var imageID = json["object_name"][i].ID;
                var user = json["object_name"][i].User;
                var votecount = json["object_name"][i].votecount;
                var avatarLink = json["object_name"][i].avatarLink;
                if (avatarLink) {
                  html += "<div class='col-lg-12'><img src = '"+avatarLink+"' /><p style='font-size:small;'>"+user+"</p><a href='meme.php?memeid="+ imageID +"'><img class='img-thumbnail side-bar-img' src='"+ imagePath +"' alt='"+ imagePath.replace('images/','').replace('.jpg','').replace('.png','') +"'><p style='color:white;'><i class='fas fa-thumbs-up'></i></i> " +votecount+"</p><a/></div>";
                } else {
                  html += "<div class='col-lg-12'><p style='font-size:small;'>"+user+"</p><a href='meme.php?memeid="+ imageID +"'><img class='img-thumbnail side-bar-img' src='"+ imagePath +"' alt='"+ imagePath.replace('images/','').replace('.jpg','').replace('.png','') +"'><p style='color:white;'><i class='fas fa-thumbs-up'></i> " +votecount+"</p></a></div>";
                }
                $("#topfive").html(html);
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


function getWinner() {
        var request;

          // Fire off the request to /form.php
          request = $.ajax({
              url: "phpUtils/getwinner.php",
              type: "get",
          });

          // Callback handler that will be called on success
          request.done(function (response, textStatus, jqXHR){
              var html = "";
              var json = JSON.parse(response);
              for(var i = 0; i <  json["object_name"].length; i++) {
                  var imagePath = json["object_name"][i].MemePath;
                  var user = json["object_name"][i].User;
                  html += "<div class='col-lg-12 portfolio-item'><p style='color:black;'>Submitted By: <b>"+user+"</b></p><img class='img-thumbnail side-bar-img' src='"+ imagePath +"' alt='"+ imagePath.replace('images/','').replace('.jpg','').replace('.png','') +"'></div>";
                  $("#winnerinfo").html(html);
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

  function loadPageData() {
    $(document).ready(function() {
      grabmemes();
      getWeeklyTop();
      getWinner();
    });
  }
