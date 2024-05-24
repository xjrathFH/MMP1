<?php
include "functions.php";
session_start();

$songId = $_SESSION['songId'];
$query = "SELECT songs.title, songs.lyrics, songs.release_date, albums.album_name, artists.artist_name 
          FROM songs
          JOIN albums ON songs.album_id = albums.album_id
          JOIN artists ON songs.artist_id = artists.artist_id
          WHERE songs.song_id = :songId";

$statement = $dbh->prepare($query);
$statement->bindParam(':songId', $songId);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);
$title = $result['title'];
$lyrics = $result['lyrics'];
$releaseDate = $result['release_date'];
$albumName = $result['album_name'];
$artistName = $result['artist_name'];

$lyricsArray = explode("\n", $lyrics);

foreach ($lyricsArray as $line) {
    $line = trim($line);
}


$userInput = $_POST["search"]; 

$correctAnswer = $title;

$currentLineIndex = $_POST["cLine"];

$isCorrect = strtolower($userInput) === strtolower($correctAnswer);
$nextLine = $lyricsArray[$currentLineIndex];

// Prepare response
$response = array(
  "search" => $userInput,
  "correct" => $isCorrect,
  "nextLine" => $nextLine,
  "correctAnswer" => $correctAnswer,
  "releaseDate" => $releaseDate,
  "albumName" => $albumName,
  "artistName" => $artistName,
  "songid" => $songId
);

// Send response as JSON
header("Content-type: application/json");
echo json_encode($response);

?>
