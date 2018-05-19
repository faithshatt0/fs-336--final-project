<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    </head>
    
	<a href="index.php">
		<h1>Social Space<img id="welcomePlanet" src="pics/planet.png" width="100px"></h1>
	</a>

	<a href="javascript:history.go(-1)"><img id='backBtn' width="50px" src="http://pluspng.com/img-png/left-arrow-png-png-small-medium-large-378.png"></a>

    <body>
        <h1>Sign Up</h1>
        
        <!--Form to enter credentials-->
        <!-- method=post to hide password -->
        <form method="post" action="signUp.php"> 
            <input id="enterText" type="text" name="username" placeholder="Pick a username"/><br/>
            <input id="enterText" type="password" name="password" placeholder="Enter Password"/><br/>
            <input id="enterText" type="password" name="password2" placeholder="Re-Enter Password"/><br/>
            <input id="loginButton" type="submit" name="submitBtn" value="Go"/><br/>
        </form>
        
        <?php
        if(isset($_POST['submitBtn'])) {
            if(isset($_POST['username']) && !empty($_POST['username'])) {
                $users = findUser($_POST['username']);
                if(empty($users)) {
                    if(isset($_POST['password']) && !empty($_POST['password'])) {
                        if(isset($_POST['password2']) && !empty($_POST['password2'])) {
                            setUser($_POST['username'], $_POST['password']);
                            echo "<script>";
                            echo "alert('Account created successfully!');";
                            echo "</script>";
                            header("Location: login.php");
                        } else {
                            echo "<script>";
                            echo "alert('Please re-enter password.');";
                            echo "</script>";
                        }
                    } else {
                        echo "<script>";
                        echo "alert('Please enter a password.');";
                        echo "</script>";
                    }
                } else {
                    echo "<script>";
                    echo "alert('That username is already taken.');";
                    echo "</script>";
                }
            } else {
                echo "<script>";
                echo "alert('Please enter a username.');";
                echo "</script>";
            }
        }
        ?>
    </body>
</html>