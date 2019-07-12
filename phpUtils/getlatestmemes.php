<?php
include 'connect.php';

$query = "SELECT m.ID, m.memepath, m.emailID, m.dateAdded, m.votecount, m.commentcount, e.User, e.avatarLink as ImageLink FROM memes AS m INNER JOIN emails as e on m.emailID = e.id ORDER BY dateAdded DESC LIMIT 100";
$result = mysqli_query($conn, $query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['object_name'][] = $r;
}

echo json_encode($rows);
?>
