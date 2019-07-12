<?php
require 'connect.php';

$user = $_POST["userID"];
$name = $_POST["userName"];

if (!$user) {
  return "You must login before uploading!";
}

//check file size
if($_FILES['memeimage']['size'] > 1048576){
  return "exceeds file size limit";
}

$file_name = $_FILES['memeimage']['name'];
$file_size =$_FILES['memeimage']['size'];
$file_tmp =$_FILES['memeimage']['tmp_name'];
$file_type=$_FILES['memeimage']['type'];
$uploaddir = '../images/';

$queryforimage = "INSERT INTO memes (emailID, memepath, votecount) VALUES('".$user."', '".$file_name."', '0')";
$imageResult = mysqli_query($conn, $queryforimage);
//store the image file
if (move_uploaded_file($file_tmp, $uploaddir . '' . $_POST["userID"] . '-' . $file_name)) {
  mysqli_close($conn);
  echo "Success";
} else {
  mysqli_close($conn);
   return "Upload failed";
}
?>
