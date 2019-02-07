<?php
include 'connect.php';
$email = $_POST['email'];

if($email) {

  $query = "SELECT email, memekey FROM emails WHERE email='".$email."'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $emailId = $row['email'];

  function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
  }

  function emailContent($urlBase, $randString) {
    $link = $urlBase . "" . $randString;
    $content = "Click here to reset your password: $link";
    return $content;
  }

  $user_meme_key = $row['memekey'];

  $to_email = $email;
  $subject = 'Rank Memes password reset';
  $message = emailContent("http://rankmeme.com/resetpassword.html?key=", $user_meme_key);
  $headers = 'From: noreply@rankmeme.com';
  //check if the email address is invalid $secure_check
  $secure_check = sanitize_my_email($to_email);
  if ($secure_check == false) {
      echo "Invalid email input";
      return;
  } else { //send email
      mail($to_email, $subject, $message, $headers);
  }

  if($emailId) {
    echo "Success";
    return;
  } else {
    echo "Email address not found.";
    return;
  }
}
?>
