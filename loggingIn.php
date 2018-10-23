<?php
    session_start();
    require "requireDatabase5.php";
    $username = (String) $_POST['user'];
    $password = (String) $_POST['pass'];
    $valid = false; #if valid is false at the end of the file, then an incorrect or no username was entered
    
    $stmt = $mysqli->prepare("select password, id from users where username = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('s',$username);

    $stmt->execute();

    $stmt->bind_result($pass_table, $id);
    
    while ($stmt->fetch()){ #does it match and username/pass combo?
        if ((password_verify($password, $pass_table))){
            $valid = true;
            $stmt ->close;
        }
    }
    
    if ($valid){
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id; #stores the username until the user logs out
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        header("location: calendar.php");
        exit;
    }

    else if (!$valid){
        header("location: wrongLogin.php"); 
        exit;
    }
    
    ?>