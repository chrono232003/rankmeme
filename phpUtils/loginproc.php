<?php
require 'connect.php';

$user = $_POST['loginuser'];
$pass = $_POST['loginpass'];

/* login form validation */

//check to make sure that the required fields have values.
if ($user == "" or $pass == "") {
  echo "Please fill out all required fields.";
  return;
}

//check to see if the email and password combination exist. If so, good, if not display error message.
$queryEmailCheck = "SELECT * FROM emails WHERE User = '".$user."' AND password = '".$pass."' AND active = 1";
$emailCheckResult = mysqli_query($conn, $queryEmailCheck);
$row = mysqli_fetch_assoc($emailCheckResult);
$emailId = $row['ID'];
if (!$emailId) {
  echo "Invalid username or password";
  return;
} else {
  session_start();
  $_SESSION["user"] = $user;
  echo "Success";
}

?>
