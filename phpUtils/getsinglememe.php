<?php
include 'connect.php';

$memeid = $_POST['memeid'];

$query = "SELECT m.ID, m.memepath, m.emailID, m.dateAdded, m.votecount, m.commentcount, e.User, e.avatarLink FROM memes AS m INNER JOIN emails as e on m.emailID = e.id WHERE m.ID = " . $memeid;
$result = mysqli_query($conn, $query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['object_name'][] = $r;
}

echo json_encode($rows);
?>
