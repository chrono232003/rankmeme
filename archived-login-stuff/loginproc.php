<?php
require 'connect.php';

$user = $_POST['loginuser'];
$pass = $_POST['loginpass'];

//check captcha
$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
  'secret' => '6LdVepAUAAAAAE_T9BJef9xU1Cx8_kOjRY-3k9O1',
  'response' => $_POST["g-recaptcha-response"]
);
$options = array(
  'http' => array (
    'method' => 'POST',
    'content' => http_build_query($data)
  )
);

$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);

$captcha_success=json_decode($verify);
	if ($captcha_success->success==false) {
		echo "<p>You are not verified as a human!</p>";
    return;
	}

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
