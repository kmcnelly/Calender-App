<?php
        session_start();
        require 'requireDatabase5.php';

        $username = (String) $_POST['user'];
        $password = (String) $_POST['password'];

        $pwhash = password_hash($password, PASSWORD_DEFAULT);

        
        $stmt = $mysqli->prepare("insert into users (username, password) values (?, ?);");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->bind_param('ss', $username, $pwhash);
        
        $stmt->execute();
        
        $stmt->close();

        $stmt = $mysqli->prepare("select id from users");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->execute();
        $stmt->bind_result($id);
        
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id; #stores the username until the user logs out
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        
        header('location: calendar.php')
    ?>