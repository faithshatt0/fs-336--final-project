<?php
    session_start();
    include 'connect.php';
    
    if (!isset($_SESSION['username'])) {
       header("Location: login.php");
    } else {
    	$username = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
	    <link href="css/styles.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    </head>
    
    <a href="index.php">
		<h1>Social Space<img id="welcomePlanet" src="pics/planet.png" width="100px"></h1>
	</a>
	
	<a href="javascript:history.go(-1)"><img id='backBtn' width="50px" src="http://pluspng.com/img-png/left-arrow-png-png-small-medium-large-378.png"></a>

    <body>
        
        <h3>Share a Link...</h3>
        
        <form method="post" action="addExplore.php">
            <input type="text" name="link" id="enterTextP"></br></br>
            <input type="submit" id="addLink" name="addExplore" value="Add link!"/>
        </form>
        
        <?php
            if(isset($_POST['link']) && !empty($_POST['link'])) {
                echo "Hi";
                addLink($_POST['link']);
                header("Location: index.php");
            }
        ?>
        
        <!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
    </body>
</html>