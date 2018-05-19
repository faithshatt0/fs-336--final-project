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
        
        <input type='hidden' id='postNameHere' value=<?php echo "'" . $_GET['postNam'] . "'"; ?>>
        <input type='hidden' id='usernameHere' value=<?php echo $_SESSION['username']; ?>>
        
        <?php
            $post = getSingleBlogPost($_SESSION['username'], $_GET['postNam']);
            echo "Edit " . $_GET['postNam'];
        ?>
        </br></br>
        <span contenteditable="true" id="editPost" class="text-box"><?php echo "'" . $post['content'] . "'"; ?></span>
        <!--<input type='text' id='editPost' class='text-box' value=>-->
        <button id='doneBtn'>Done</button>
        
	</body>
	<!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
</html>