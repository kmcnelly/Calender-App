<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Delete</title>
</head>
<body>
    <?php
    require "requireDatabase3.php";
    
    $username = (String) $_POST['user'];
    $password = (String) $_POST['pass'];
    $valid = false; #if valid is false at the end of the file, then an incorrect or no username/passowrd combo was entered
    
    $stmt = $mysqli->prepare("select username, password from users");
    if(!$stmt){
    	printf("Query Prep Failed1: %s\n", $mysqli->error);
    	exit;
    } #checking for valid username/pass
    $stmt->execute();
    $stmt->bind_result($user_table, $pass_table);
    
    while ($stmt->fetch()){
        if (($username == $user_table) && (password_verify($password, $pass_table))){ 
            $valid = true;
        }
    }
    
    if ($valid){ #if the user is to be deleted...
        $stmt = $mysqli->prepare("delete comments from comments join users on (comments.author=users.username) where users.username = '$username'");
        if(!$stmt){ #remove all of their comments
            printf("Query Prep Failed8: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $stmt->close();
        
        $stories = array();
        $i = 1;
        $stmt = $mysqli->prepare("select stories.id from stories join users on (stories.author=users.username) where users.username = '$username'");
        if(!$stmt){ #find all their stories so that the stories link and comments may be deleted.
            printf("Query Prep Failed7: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $stmt->bind_result($story_id);
        while($stmt->fetch()){
            $stories[$i] = $story_id;   #store the location of all the stories to be deleted
            $i = $i + 1;
        }
        $k = 1;
        while ($k < $i){
            $stmt = $mysqli->prepare("delete links from links join stories on (stories.id = links.story_id) where stories.id = '$stories[$k]'");
            if(!$stmt){ #delete links from all of users story
                printf("Query Prep Failed5: %s\n", $mysqli->error);
                exit;
            }
            $stmt->execute();
            $stmt->close();
            $k = $k + 1;
        }
        $j = 1;
        while ($j < $i){
            $stmt = $mysqli->prepare("delete comments from comments join stories on (stories.id = comments.story_id) where stories.id = $stories[$j]");
            if(!$stmt){ #delete comments from all of users story
                printf("Query Prep Failed9: %s\n", $mysqli->error);
                exit;
            }
            $stmt->execute();
            $stmt->close();
            $j = $j + 1;
        }
        
        $stmt = $mysqli->prepare("delete from stories where stories.author = '$username'");
        if(!$stmt){ #then, delete all of the users stories
            printf("Query Prep Failed6: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $stmt->close();
        
        $stmt = $mysqli->prepare("delete from users where username='$username'");  #delete user
        if(!$stmt){ # and finally delete the user
            printf("Query Prep Failed4: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $stmt->close();
        header("location: logout.php");
        exit;
    }
    else{
        header("location: wrongLogin.php"); 
        exit;
    }
    
    ?>