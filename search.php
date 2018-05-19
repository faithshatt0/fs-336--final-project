<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
		
    </head>
    
	<a href="index.php">
		<h1>Social Space<img id="welcomePlanet" src="pics/planet.png" width="100px"></h1>
	</a>
    
    <body>
        <h1 id="login">Search blog posts</h1>
        
            Subject:
            <select name='bySubject'>
                <option value='inspiring'>inspiring</option>
                <option value='story'>story</option>
                <option value='sliceOfLife'>sliceOfLife</option>
            </select>

            User:
            <input type='text' name='byUser' placeholder="Try 'faith'"/>
            
            Title:
            <input type='text' name='byTitle' placeholder="Try 'Leaves'"/>
            <input type='submit' value='Search'/>
        
        <?php
            include 'connect.php';
        
            if(isset($_POST['bySubject']) && !empty($_POST['bySubject'])) {
                $subject = $_POST['bySubject'];
            }

            if(isset($_POST['byUser']) && !empty($_POST['byUser'])) {
                $user = $_POST['byUser'];
            }
            
            if(isset($_POST['byTitle']) && !empty($_POST['byTitle'])) {
                $title = $_POST['byTitle'];
            }
            
            $items = getMatchingItems($subject, $user, $title);
            
            for($i = 0; $i < sizeof($items); $i++) {
        		echo "<div id='postTitlePreview'>" . $items[$i]['title'] . "</div>";
        		echo "<img class='postImage' name=" . $items[$i]['title'] . " src=" . $items[$i]['image_url'] . " id='postImage" . $i . "'/></br></br></br>";
        	}
        ?>
        
        <!--Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/stuff.js"></script>
        
    </body>
</html>