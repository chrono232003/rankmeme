<?php
include 'connect.php';
$query = "SELECT User, MemePath FROM weeklywinners ORDER BY Date DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows['object_name'][] = $r;
}

echo json_encode($rows);
?>
