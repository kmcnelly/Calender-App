<?php
session_start();
    require "requireDatabase5.php";
    
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
        $stmt = $mysqli->prepare("delete from events where uid=?");
        if(!$stmt){ #remove all of their comments
            printf("Query Prep Failed8: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('i', $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
    }

?>