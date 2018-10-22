<?php
    session_start();

        // require 'requireDatabase5.php';

    echo $_SESSION['token'];
        
        // $stmt = $mysqli->prepare("insert into events (username, password) values (?, ?);");
        // if(!$stmt){
        //     printf("Query Prep Failed: %s\n", $mysqli->error);
        //     exit;
        // }
        
        // $stmt->bind_param('ss', $username, $pwhash);
        
        // $stmt->execute();
        
        // $stmt->close();
        
        // header('calendar.html')
?>