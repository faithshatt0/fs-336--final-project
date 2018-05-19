<?php
include 'connect.php';
$db = getDBConnection();

$username = $_POST['username'];
$newContent = $_POST['newContent'];
$postName = $_POST['postName'];

setBlogPost($username, $postName, $newContent, "");

?>