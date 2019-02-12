<?php
include 'connect.php';
$code = $_POST['verifyCode'];
if ($code) {
  $query = "UPDATE emails SET active = '1' WHERE memekey = '".$code."'";
  $result = mysqli_query($conn, $query);
  echo "You have successfully verified your email. Login to submit memes!";
} else {
  echo "Failed to verify your email address.";
}
?>
