<?php
include 'connect.php';

$memeID = $_POST['memeID'];
$query = "SELECT E.User as User, E.avatarLink as ImageLink, C.Comment as Comment, C.commentDate as CommentDate FROM comments as C INNER JOIN emails as E on C.User = E.ID WHERE memeID = '" . $memeID . "'";
$result = mysqli_query($conn, $query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['object_name'][] = $r;
}

echo json_encode($rows);
?>
