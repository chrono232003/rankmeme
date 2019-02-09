<?php
  include 'connect.php';

  $pass = $_POST['pass'];
  $comparePass = $_POST['comparepass'];
  $key = $_POST['verifyCode'];

  //validate password
  if (strlen($pass) < 7) {
    echo "Please make sure that your password is at least 7 characters.";
    return;
  }

  //check to make sure the passwords match
  if ($pass != $comparePass) {
    echo "Passwords do not match. Check values and try again.";
    return;
  } else {
    $query = "UPDATE emails SET password='".$pass."' WHERE memekey='".$key."'";
    $result = mysqli_query($conn, $query);
    echo "Success";
    return;
  }

 ?>
