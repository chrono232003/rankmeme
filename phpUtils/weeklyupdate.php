<?php
include 'connect.php';

//grab winner for the week
$querygetwinner =  "SELECT * FROM memes as m INNER JOIN emails as e ON m.emailID = e.ID ORDER BY votecount DESC LIMIT 1";
$resultgetwinner = mysqli_query($conn, $querygetwinner);
$row = mysqli_fetch_assoc($resultgetwinner);

//store winner values in variables
$user = $row['User'];
$email = $row['email'];
$memepath = "images/".$row['ID']. "" .$row['memepath'];

//add the winner to the winner db
if ($user && $email && $memepath) {
  $queryaddwinner = "INSERT INTO weeklywinners (User, Email, MemePath) VALUES ('".$user."', '".$email."', '".$memepath."')";
  $resultaddwinner = mysqli_query($conn, $queryaddwinner);
}

//clear the votecount to start over the voting for the week
$queryclearvotes = "UPDATE memes SET votecount = '0'";
$resultclearvotes = mysqli_query($conn, $queryclearvotes);
?>
