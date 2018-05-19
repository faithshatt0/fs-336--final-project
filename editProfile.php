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
        <form method="post" action="editProfile.php"> 
        
        <h3>Select Profile Color</h3>
            <input type="color" name="userColor" id="userColor"></br>
            
        <h3>Change Profile Picture</h3>
            <input id="enterTextP" type="text" name="profilePicLink" placeholder="Put link to picture here"/>
        
        <h3>Change Current Status</h3>
            <input id="enterTextP" type="text" name="newStatus" placeholder="New Status"/>
        
        <h3>Change Your Interests</h3>
            <input id="enterTextP" type="text" name="newInterests" placeholder="What are you interested in?"/>
        
        <h3>Change Where You're From</h3>
            <input id="enterTextP" type="text" name="newLocation" placeholder="New Location"/>
        
        <h3>Change What's Next</h3>
            <input id="enterTextP" type="text" name="newWhatsNext" placeholder="What's next?"/><br/>
            <input id="confirmButton" type="submit" name="submitBtn" value="Update Profile"/><br/>
        </form>
        
        <?php
        
            if(isset($_POST['userColor']) && !empty($_POST['userColor'])) {
                setUserColor($username,$_POST['userColor']);
            }
        
            if(isset($_POST['profilePicLink']) && !empty($_POST['profilePicLink'])) {
                setProfilePic($username,$_POST['profilePicLink']);
            }
            
            if(isset($_POST['newStatus']) && !empty($_POST['newStatus'])) {
                setStatus($username,$_POST['newStatus']);
            }
            
            if(isset($_POST['newInterests']) && !empty($_POST['newInterests'])) {
                setInterests($username,$_POST['newInterests']);
            }
            
            if(isset($_POST['newLocation']) && !empty($_POST['newLocation'])) {
                setLocation($username,$_POST['newLocation']);
            }
            
            if(isset($_POST['newWhatsNext']) && !empty($_POST['newWhatsNext'])) {
                setWhatsNext($username,$_POST['newWhatsNext']);
            }
        ?>
        
    </body>
</html>