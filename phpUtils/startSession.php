<?php
require 'connect.php';

 $user = $_POST['userId'];
 $name = $_POST['name'];
 //get users picture;
 //$picture = file_get_contents("http://graph.facebook.com/".$user."/picture");
 $picture = "//graph.facebook.com/".$user."/picture";

//add the user to the database
$query = "INSERT INTO emails (ID, User, avatarLink) VALUES ('".$user."','".$name."','".$picture."')";
if (!mysqli_query($conn, $query)) {
  echo("Error description: " . mysqli_error($con));
}

 session_start();
 $_SESSION["userID"] = $user;
 $_SESSION["name"] = $name;
 $_SESSION["userPic"] = $picture;
?>
