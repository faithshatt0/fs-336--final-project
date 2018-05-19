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
	
	<body>
        <span id="welcomeUser"><?php echo "Welcome ".$_SESSION['username']."! ";?></span></br></br>
        <input type="button" id="logoutBtn" value="Logout" />
		<?=displayHome()?>
	    <div id="welcome"><h3>Show what you love, love what you do, explore everything new!</h3></div>
	    
	    <?php 
	    
	    	$index = rand(0,getNumOfLinks()-1); 
	    	$link = getLinks()[$index]['link'];
	    ?>
	    
	    <table>
	        <tr>
	            <td><div id="profile"><h3>Profile</h3></div><a href="profile.php"><img src="pics/astronaut-helmet.png" width="300px"></a></td>
    	        <td><div id="blog"><h3>Blog</h3></div><a href="allBlogs.php"><img src="pics/earth.png" width="300px" ></a></td>
    	        <td><div id="explore"><h3>Explore</h3></div><a href=<?php echo $link; ?>><img src="pics/rocket.png" width="300px" ></a></td>
    	    </tr>
	    </table>
	</body>
	<!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
</html>