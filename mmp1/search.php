<?php
require_once('config.php');
require_once('functions.php');

if (isset($_GET['search'])) {

    $searchQuery = $_GET['search'];

    // case sensetive sql
    $suggestionQuery = "SELECT title FROM songs WHERE LOWER(title) LIKE LOWER(:searchQuery) LIMIT 5";
    $suggestionStmt = $dbh->prepare($suggestionQuery);
    $suggestionStmt->bindValue(':searchQuery', '%' . strtolower($searchQuery) . '%');
    $suggestionStmt->execute();

    $suggestions = $suggestionStmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($suggestions);
    exit(); 
}
?>
