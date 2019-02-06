<?php
include 'connect.php';
  $queryGetMemesForPage = "SELECT m.ID as memeID, m.memepath, e.User, e.ID FROM memes AS m INNER JOIN emails AS e ON m.emailID = e.id ORDER BY RAND() LIMIT 4";
  $result = mysqli_query($conn, $queryGetMemesForPage);
  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows['object_name'][] = $r;
  }

echo json_encode($rows);
?>
