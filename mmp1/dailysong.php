<?php
include "functions.php";
session_start();

try {
    $query = "SELECT id FROM SOTD";
    $statement = $dbh->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $songId = $result['id'];
        $_SESSION['songId'] = $songId;

        header("Location: dailyquiz.php");
        exit;
    } else {

    }
} catch (PDOException $e) {
    $errorMessage = "Something went wrong in the database: " . $e->getMessage();
    echo $errorMessage;
}
?>
