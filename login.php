<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
		
    </head>
    
	<a href="index.php">
		<h1>Social Space<img id="welcomePlanet" src="pics/planet.png" width="100px"></h1>
	</a>
    
    <body>
        <h1 id="login">Login</h1>
        
        <a href="search.php"><div id="search">Or Search for Blogs</div></a></br></br>
        
        <!--Form to enter credentials-->
        <!-- method=post to hide password -->
        <form method="post" action="verifyUser.php"> 
            <input id="enterText" type="text" name="username" placeholder="Username"/><br/>
            <input id="enterText" type="password" name="password" placeholder="Password"/><br/></br>
            Try entering 'faith' for the user and 'booyah' for the password </br></br>
            <input id="loginButton" type="submit" value="Go"/><br/></br>
        </form>
        
        <p id="newHere">New here?</p> <form method="get" id="signUpForm" action="signUp.php"><input id="signUp" type="submit" value="Sign Up"/></form>
    </body>
</html>