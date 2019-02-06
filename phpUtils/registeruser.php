<?php
require 'connect.php';

$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$comparePass = $_POST['comparepass'];
$file_name = $_FILES['avatarimage']['name'];

/* registration form validation */

//check file size
if($_FILES['avatarimage']['size'] > 1048576){
  return "exceeds file size limit";
}

//check to make sure that the required fields have values.
if ($email == "" or $user == "" or $pass == "" or $comparePass =="") {
  echo "Please fill out all required fields.";
  return;
}

//check to make sure the passwords match
if ($pass != $comparePass) {
  echo "Passwords do not match. Check values and try again.";
  return;
}

//send the user an email to confirm them
//validate the user by sending them an Email
function randStrGen($len){
    $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789$11";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
      $randItem = array_rand($charArray);
      $result .= "".$charArray[$randItem];
    }
    return $result;
}

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
  $content = "Thank you for registering to Rank Memes! Once you verify your email, you can submit your own memes! Click here to verify your email: $link";
  return $content;
}

$user_meme_key = randStrGen(20);

$to_email = $email;
$subject = 'Rank Memes email verification';
$message = emailContent("http://rankmeme.com/verifyEmail.html?verify=", $user_meme_key);
$headers = 'From: noreply@rankmeme.com';
//check if the email address is invalid $secure_check
$secure_check = sanitize_my_email($to_email);
if ($secure_check == false) {
    echo "Invalid email input";
    return;
} else { //send email
  //  mail($to_email, $subject, $message, $headers);
}

//check to see if the email is already in the database. If so, grab the id and use that to store the image.
//otherwise, create new email record.
$queryEmailCheck = "SELECT * FROM emails WHERE email = '".$email."'";
$emailCheckResult = mysqli_query($conn, $queryEmailCheck);
$row = mysqli_fetch_assoc($emailCheckResult);
$emailId = $row['ID'];
if (!$emailId) {
  $queryforemail = "INSERT INTO emails (User, password, email, avatarPath, active, memekey) VALUES('".$user."','".$pass."','".$email."','".$file_name."','0','".$user_meme_key."')";
  $emailResult = mysqli_query($conn, $queryforemail);
  $emailId = mysqli_insert_id($conn);
} else {
  echo "Email is already registered, please login.";
  return;
}

if ($_FILES['avatarimage']['name']) {
$file_size =$_FILES['avatarimage']['size'];
$file_tmp =$_FILES['avatarimage']['tmp_name'];
$file_type=$_FILES['avatarimage']['type'];
$uploaddir = '../avatars/';

  if (move_uploaded_file($file_tmp, $uploaddir . '' . $emailId . '-' . $file_name)) {
    mysqli_close($conn);
    echo "Success";
  } else {
    mysqli_close($conn);
     echo "Upload failed";
  }
} else {
  echo "Success";
}
?>
