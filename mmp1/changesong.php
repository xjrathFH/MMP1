<?php
session_start();
$songId = rand(1, 5);
$_SESSION['songId'] = rand(15, 29);
header("Location: randomquiz.php");
exit;
?>