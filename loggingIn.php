<?php
    session_start();
    require "requireDatabase5.php";
    $username = (String) $_POST['user'];
    $password = (String) $_POST['pass'];
    $valid = false; #if valid is false at the end of the file, then an incorrect or no username was entered
    
    $stmt = $mysqli->prepare("select username, password, id from users");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    
    $stmt->execute();

    $stmt->bind_result($user_table, $pass_table, $id);
    
    while ($stmt->fetch()){ #does it match and username/pass combo?
        if (($username == $user_table) && (password_verify($password, $pass_table))){
            $valid = true;
            $stmt ->close;
        }
    }
    
    if ($valid){
        $_SESSION['id'] = $id; #stores the username until the user logs out
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        // echo 'success';
        header("location: calendar.php");
        exit;
    }

    else if (!$valid){
        header("location: wrongLogin.php"); 
        exit;
    }
    
    ?>