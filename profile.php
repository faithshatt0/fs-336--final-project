<?php
    session_start();
	include 'connect.php';
	
	function displayPic() {
		if (!isset($_SESSION['username'])) {
	       header("Location: login.php");
	    } else {
	    	$username = $_SESSION['username'];
	    }
		
	    $allProfPics = getProfilePic($_SESSION['username']);
	    $pic = $allProfPics[0]['image_url'];
	    echo "<img style='border: 10px solid " . getUserColor($username) . "' id='profilePic' src='$pic' width='300px'>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Profile</title>
	    <link href="css/styles.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	</head>
	
	<a href="index.php">
	<h1>Social Space<img id="welcomePlanet" src="pics/planet.png" width="100px"></h1>
	</a>
	
	<a href="javascript:history.go(-1)"><img id='backBtn' width="50px" src="http://pluspng.com/img-png/left-arrow-png-png-small-medium-large-378.png"></a>

	<body>
		<input type="button" id="logoutBtn" value="Logout" />
		<table id="profileTable">
			<tr>
				<td id="leftColumn">
					<?php 
				    	if (!isset($_SESSION['username'])) {
					       header("Location: login.php");
					    } else {
					    	$username = $_SESSION['username'];
					    }
				    
						echo "<div id='profileName'>" . $_SESSION['username'] . "</div>";
						displayPic();
				    ?>
				    
				    </br></br>
				    <span id="statusTitle" style=<?php echo "'color:" . getUserColor($username) . "'" ?>>Currently, </span><span id="currentStatus"> <?php echo getStatus($username); ?></span>
				    </br></br>
				    <form method="post" action="editProfile.php">
				    	<input id="editProfileBtn" type="submit" value="Edit Profile">
				    </form>
				    
				</td>
	
				<td id="rightColumn">
					<span id="locationTitle" style=<?php echo "'color:" . getUserColor($username) . "'" ?>>Location: </span><span id="location"><?php echo getLocation($username); ?></span>
					</br></br>
					</br> <span id="interestsTitle" style=<?php echo "'color:" . getUserColor($username) . "'" ?>>Interests: </span><span id="interests"><?php echo getInterests($username); ?></span>
					</br></br>
					</br> <span id="whatsNextTitle" style=<?php echo "'color:" . getUserColor($username) . "'" ?>>What's Next? </span><span id="whatsNext"><?php echo getWhatsNext($username); ?></span>
				</td>
			</tr>
		</table>
	</body>
	<!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
</html>