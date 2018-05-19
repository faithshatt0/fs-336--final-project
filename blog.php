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
        
        <?php
        	$posts = getSingleBlogPost(getUserByBlogTitle($_GET['postName']), $_GET['postName']);
        ?>
    		<div name=<?php echo $_GET['postName']; ?> id='postTitle'><?php echo $_GET['postName']; ?></div>
    		<h3> <?php echo " by " . $_SESSION['username']; ?></h3></br>
    		<img src=<?php echo $posts['image_url']; ?> class='postImage'/></br></br>
    		<div id='postContent'><?php echo $posts['content'];?></div></br></br>
    		<div id='postDate'><?php echo $posts['date'];?></div>
        
	    <input id="editBlogBtn" name=<?php echo "'" . $_GET['postName'] . "'";?>type="submit" value="Edit Blog">
        
	</body>
	<!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
</html>