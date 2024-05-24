<?php
include "functions.php";


$api_key = "at5abbfZ54KVzFicB7CwYDPYMRNEqlnIbAav7QxgRiVvPxLTpavP_m6z-lQG07He"; // Genius.com API token
$songTitleSearch = "losing my religion";
$artistNameSearch = "rem";


$encoded_query = urlencode("$songTitleSearch $artistNameSearch");


$url = "https://api.genius.com/search?q=$encoded_query";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: Bearer $api_key"]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if ($response === false) {
    echo "Failed to fetch data from the Genius.com API.";
} else {
    $data = json_decode($response, true);

 
    $songInfo = $data['response']['hits'][0]['result'];
    $songId = $songInfo['id'];
    $songTitle = $songInfo['title'];


    $url = "https://api.genius.com/songs/$songId";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: Bearer $api_key"]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    if ($response === false) {
        echo "Failed to fetch data from the Genius.com API.";
    } else {
        $data = json_decode($response, true);

       
        $albumTitle = $data['response']['song']['album']['name'];
        $artistName = $data['response']['song']['primary_artist']['name'];
        $releaseDate = $data['response']['song']['release_date'];

        try {
            // Save the artist to the database
            $insertArtistQuery = "INSERT INTO artists (artist_name) VALUES (:artistName)";
            $artistStatement = $dbh->prepare($insertArtistQuery);
            $artistStatement->bindParam(':artistName', $artistName);
            $artistStatement->execute();
            $artistId = $dbh->lastInsertId();

            // Save the album to the database
            $insertAlbumQuery = "INSERT INTO albums (album_name, artist_id) VALUES (:albumTitle, :artistId)";
            $albumStatement = $dbh->prepare($insertAlbumQuery);
            $albumStatement->bindParam(':albumTitle', $albumTitle);
            $albumStatement->bindParam(':artistId', $artistId);
            $albumStatement->execute();
            $albumId = $dbh->lastInsertId();

            // Save the song to the database
            $insertSongQuery = "INSERT INTO songs (title, release_date, album_id, artist_id) VALUES (:songTitle, :releaseDate, :albumId, :artistId)";
            $songStatement = $dbh->prepare($insertSongQuery);
            $songStatement->bindParam(':songTitle', $songTitle);
            $songStatement->bindParam(':releaseDate', $releaseDate);
            $songStatement->bindParam(':albumId', $albumId);
            $songStatement->bindParam(':artistId', $artistId);
            $songStatement->execute();
            $songId = $dbh->lastInsertId();

            // Display the info
            echo "<h2>Song: $songTitle</h2>";
            echo "<p>Album: $albumTitle</p>";
            echo "<p>Artist: $artistName</p>";
            echo "<p>Release Date: $releaseDate</p>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
