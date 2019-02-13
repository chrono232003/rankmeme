<?php
include 'connect.php';
$query = "SELECT m.emailID, m.memepath, e.User, e.avatarLink FROM memes as m INNER JOIN emails as e ON e.ID = m.emailID ORDER BY votecount DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['object_name'][] = $r;
}

echo json_encode($rows);
?>
