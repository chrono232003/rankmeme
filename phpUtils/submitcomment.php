<?php
include 'connect.php';

$memeID = $_POST['memeID'];
$user = $_POST['userID'];
$comment = $_POST['comment'];

echo $memeID;

$query = "INSERT INTO comments (memeID, User, comment) VALUES ('".$memeID."', '".$user."', '".$comment."')";
$result = mysqli_query($conn, $query);

//update comment count
$query2 = "UPDATE memes SET commentcount = commentcount + 1 WHERE ID = '".$memeID."'";
$result2 = mysqli_query($conn, $query2);

echo "Success";
?>
