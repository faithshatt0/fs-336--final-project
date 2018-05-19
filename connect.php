<?php

function getDBConnection() {
    
    //C9 db info
    $host = "localhost";
    $dbName = "social_space";
    $username = "faith";
    $password = "booyah";
    
    //may need to change username and password 
    //if error connecting to database
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

function getUserColor($username) {
    $db = getDBConnection();
    $sql = "SELECT color FROM profile WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['color'];
}

function findUser($username) {
    $db = getDBConnection();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records;
}

function getProfilePic($username) {
    $db = getDBConnection();
    $sql = "SELECT image_url FROM profile WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records;
}

function getStatus($username) {
    $db = getDBConnection();
    $sql = "SELECT status FROM profile WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['status'];
}

function getInterests($username) {
    $db = getDBConnection();
    $sql = "SELECT interests FROM profile WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['interests'];
}

function getLocation($username) {
    $db = getDBConnection();
    $sql = "SELECT location FROM profile WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['location'];
}

function getWhatsNext($username) {
    $db = getDBConnection();
    $sql = "SELECT whatsNext FROM profile WHERE username = '$username'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['whatsNext'];
}

function setUserColor($username, $color) {
    $db = getDBConnection();
    $sql = "UPDATE `profile` SET `color` = '$color' WHERE `profile`.`username` = '$username';";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['color'];
}

function setProfilePic($username, $pic) {
    $db = getDBConnection();
    $sql = "UPDATE `profile` SET `image_url` = '$pic' WHERE `profile`.`username` = '$username';";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records;
}

function setStatus($username, $status) {
    $db = getDBConnection();
    $sql = "UPDATE `profile` SET `status` = '$status' WHERE `profile`.`username` = '$username';'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['status'];
}

function setInterests($username, $interests) {
    $db = getDBConnection();
    $sql = "UPDATE `profile` SET `interests` = '$interests' WHERE `profile`.`username` = '$username';";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['interests'];
}

function setLocation($username, $location) {
    $db = getDBConnection();
    $sql = "UPDATE `profile` SET `location` = '$location' WHERE `profile`.`username` = '$username';";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['location'];
}

function setWhatsNext($username, $whatsNext) {
    $db = getDBConnection();
    $sql = "UPDATE `profile` SET `whatsNext` = '$whatsNext' WHERE `profile`.`username` = '$username';";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['whatsNext'];
}

function setUser($username, $password) {
    $db = getDBConnection();
    $sql = "INSERT INTO `users` (`userId`, `username`, `password`) VALUES (NULL, '$username', SHA1('$password'));";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $db = getDBConnection();
    $sql = "INSERT INTO `profile` (`profPicId`, `username`, `image_url`, `color`, `status`, `interests`, `location`, `whatsNext`) VALUES (NULL, '$username', '', '', '', '', '', '');";
    
    $statement = $db->prepare($sql);
    $statement->execute();
}

function setBlogPost($username, $title, $content, $image_url) {
    $db = getDBConnection();
    $sql = "SELECT * FROM `blogPost` WHERE username = '$username' AND title = '$title'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll();
    
    $date = date('Y-m-d H:i:s');
    
    if(empty($records)) {
        $sql = "INSERT INTO `blogPost` (`id`, `username`, `title`, `content`, `date`) VALUES (NULL, '$user', '$title', '$content', '$date');";
        $statement = $db->prepare($sql);
        $statement->execute();
    } else {
        if(!empty($content)) {
            $sql = "UPDATE `blogPost` SET `content` = '$content' WHERE `blogPost`.`title` = '$title';";
            $statement = $db->prepare($sql);
            $statement->execute();
        }
        
        if(!empty($image_url)) {
            $sql = "UPDATE `blogPost` SET `image_url` = '$image_url' WHERE `blogPost`.`title` = '$title';";
            $statement = $db->prepare($sql);
            $statement->execute();
        }
    }
}

function getSingleBlogPost($username, $title) {
    $db = getDBConnection();
    $sql = "SELECT * FROM `blogPost` WHERE username = '$username' AND title = '$title'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll();
    
    return $records[0];
}

function getAllBlogPosts($username) {
    $db = getDBConnection();
    $sql = "SELECT * FROM `blogPost` WHERE username = '$username'";
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records;
}

function getNumOfLinks() {
    $db = getDBConnection();
    $sql = "SELECT count(1) FROM `links`";
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['count(1)'];
}

function getLinks() {
    $db = getDBConnection();
    $sql = "SELECT * FROM `links`";
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records;
}

function getMatchingItems($subject, $user, $title) {
    $db = getDBConnection();
    $sql = "SELECT * FROM `blogPost`";
    $hasFirstCond = false;
    
    if(!empty($subject) || !empty($user) || !empty($title)) {
        $sql .= " WHERE";
    }
    
    if(!empty($subject)) {
        if($hasFirstCond) {
            $sql .= " AND";
        } else {
            $hasFirstCond = true;
        }
        $sql .= " subject LIKE '" . $subject . "'";
    }
    
    if(!empty($user)) {
        if($hasFirstCond) {
            $sql .= " AND";
        } else {
            $hasFirstCond = true;
        }
        $sql .= " username LIKE '" . $user . "'";
    }
    
    if(!empty($title)) {
        if($hasFirstCond) {
            $sql .= " AND";
        } else {
            $hasFirstCond = true;
        }
        $sql .= " title LIKE '" . $title . "'";
    }
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records;
}

function getUserByBlogTitle($title) {
    $db = getDBConnection();
    $sql = "SELECT * FROM blogPost WHERE title like '$title'";
    
    $statement = $db->prepare($sql);
    $statement->execute();
    
    $records = $statement->fetchAll();
    return $records[0]['username'];
}

function addLink($link) {
    $db = getDBConnection();
    $sql = "INSERT INTO `links` (`id`, `link`) VALUES (NULL, '$link');";
    
    $statement = $db->prepare($sql);
    $statement->execute();
}
?>