<?php

require "twitteroauth/autoload.php";
include 'connect.php';

use Abraham\TwitterOAuth\TwitterOAuth;

function random_pic()
{
  $url = 'https://rankmeme.com/images';
  $base = 'https://rankmeme.com/';

  // Pull in the external HTML contents
  $contents = file_get_contents( $url );
  $doc = new DOMDocument();
  $doc->loadHTML($contents);
  $tags = $doc->getElementsByTagName('a');
  $a = array();
  foreach ($tags as $tag) {
         array_push($a,$tag->getAttribute('href'));
  }
  $url = "https://rankmeme.com/images/" . $a[array_rand($a)];
  echo $url;
  $img = '../tempmeme/img.jpg';
  file_put_contents($img, file_get_contents($url));
  // $ch1 = curl_init($url);
  // $fp1 = fopen('../tempmeme/', 'wb');
  // curl_setopt($ch1, CURLOPT_FILE, $fp1);
  // curl_setopt($ch1, CURLOPT_HEADER, 0);
  // curl_exec($ch1);
  // curl_close($ch1);
  // fclose($fp1);
  return;

}

//add random pic to the tempmeme/img.jpg directory
random_pic();

$memepath = "";
$id = "";

// function grabRandomMeme($connection) {
//     $queryGetMemesForPage = "SELECT m.ID as memeID, m.memepath, e.ID FROM memes AS m INNER JOIN emails AS e ON m.emailID = e.id ORDER BY RAND() LIMIT 1";
//     $result = mysqli_query($connection, $queryGetMemesForPage);
//     $rows = array();
//     while($r = mysqli_fetch_assoc($result)) {
//       $memepath = $r['memepath'];
//       $id = $r['ID'];
//     }
//
//    return "../images/" . $id . "-" . $memepath;
// }

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  $twitterconnection = new TwitterOAuth('c7XbOZSGOVo1MZbEcYahnGisV', 'Y5Dbbl7IWpQHsHpghVDoyWNUQO3yyTqrrySoZyuENIdt5C7RHy', $oauth_token, $oauth_token_secret);
  return $twitterconnection;
}

$imagepath = "../tempmeme/img.jpg";
echo "This is the image: " . $imagepath;
$twitterconnection = getConnectionWithAccessToken("1092917627855335424-wiiXLdt2oCz93nPOQqyhULT5HuP7R1", "zrxC4loWEie980evWfWxIJtGdyyOSo8HuwcYUFdam9ag9");
//echo "test: " . $twitterconnection;
$media = $twitterconnection->upload('media/upload', ['media' => $imagepath]);
$parameters = [
    'status' => 'More @ https://rankmeme.com - Post your own and vote! #MEMES #memesdaily #MEMEKBASAH',
    'media_ids' => implode(',', [$media->media_id_string])
];
$result = $twitterconnection->post('statuses/update', $parameters);

echo json_encode($result);

 ?>
