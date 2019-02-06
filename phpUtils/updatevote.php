<?php
include 'connect.php';
if(isset($_POST['memeID'])) {
    $memeID = $_POST['memeID'];
    $query = "UPDATE memes SET votecount = votecount + 1 WHERE ID=$memeID";
    $result = mysqli_query($conn, $query);
}
?>
