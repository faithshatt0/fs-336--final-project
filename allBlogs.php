<?php
session_start();

include 'connect.php';

function displayHome(){
    //displays Quiz if session is active
    if (!isset($_SESSION['username'])) {
       header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Social Space</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	</head>
	
	<a href="index.php">
		<h1>Social Space<img id="welcomePlanet" src="pics/planet.png" width="100px"></h1>
	</a>
	
	<a href="javascript:history.go(-1)"><img id='backBtn' width="50px" src="http://pluspng.com/img-png/left-arrow-png-png-small-medium-large-378.png"></a>
	
	<body>
        
        <span id="blogTitle">All Posts</span>
        
        <?php
        	$posts = getAllBlogPosts($_SESSION['username']);
        	
        	echo "</br></br>";
        	for($i = 0; $i < sizeof($posts); $i++) {
        		echo "<div id='postTitlePreview'>" . $posts[$i]['title'] . "</div>";
        		echo "<img class='postImage' name='" . $posts[$i]['title'] . "' src='" . $posts[$i]['image_url'] . "' id='postImage" . $i . "'/></br></br></br>";
        	}
        ?>
        <input type='submit' value='New Post' />
	</body>
	<!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
</html>